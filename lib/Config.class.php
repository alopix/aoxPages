<?php
/**
 * aoxPages
 * 
 * a free as in beer homepage management system
 * 
 * @license		Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Austria License
 * @author		Dustin Steiner
 * @link		http://www.alopix.net
 * @email		dustin.steiner@gmail.com
 * 
 * @file		Config.class.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */

/**
 * ConfigException class.
 * 
 * @extends AOXException
 */
class ConfigException extends AOXException { }

/**
 * Config class.
 * 
 */
class Config {
	/**
	 * configID
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $configID;
	
	/**
	 * config
	 * 
	 * (default value: array())
	 * 
	 * @var array
	 * @access protected
	 */
	protected $config = array();
	
	/**
	 * __construct function.
	 * creates a config from MySQL
	 * 
	 * @access public
	 * @param int $configID. (default: 0)
	 * @return void
	 */
	public function __construct($configID = 0) {
		$this->resetConfig($configID);
	}
	
	/**
	 * resetConfig function.
	 * creates a config from MySQL
	 * 
	 * @access public
	 * @param mixed $configID
	 * @return void
	 */
	public function resetConfig($configID) {
		$this->unsetConfig();
		
		if (isValidConfigID($configID)) {
			$this->configID = $configID;
			$db = new MySQL();
			$query = $db->query("SELECT field, value
													 FROM " . DB_PREFIX . "config
													 WHERE configID = %s
													 AND enabled = 1
													 AND inTemplates = 1",
													 $configID);
			while ($row = $db->fetchAssoc($query)) {
				$this->config[$row['field']] = $row['value'];
			}
			$db->free($query);
		} else {
			throw new ConfigException('The given configID ' . $configID . ' does not exist.', 1010, true);
		}
	}
	
	/**
	 * unsetConfig function.
	 * deletes all config from the instance
	 * 
	 * @access public
	 * @return void
	 */
	public function unsetConfig() {
		unset($this->config);
		unset($this->configID);
	}
	
	/**
	 * __unset function.
	 * 
	 * @access public
	 * @param mixed $config
	 * @return void
	 */
	public function __unset($config) {
		$config->unsetConfig();
	}
	
	/**
	 * getOption function.
	 * returns the value of an option, is not exists NULL
	 * 
	 * @access public
	 * @param mixed $key
	 * @return mixed
	 */
	public function getOption($key) {
		if (is_array($this->config) && array_key_exists($key, $this->config)) {
			return $this->config[$key];
		} else {
			return NULL;
		}
	}
	
	/**
	 * setOption function.
	 * sets a value for an option. if already set, the old value will be returned, else NULL
	 * 
	 * @access public
	 * @param mixed $key
	 * @param mixed $value
	 * @return mixed
	 */
	public function setOption($key, $value) {
		$result = NULL;
		if (is_array($this->config) && array_key_exists($key, $this->config)) {
			$result = $this->config[$key];
		}
		
		$this->config[$key] = $value;
		return $result;
	}
}
?>