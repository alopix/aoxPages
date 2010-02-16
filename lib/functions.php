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
 * @file		functions.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */

/**
 * AOXException class.
 * 
 * @extends Exception
 */
class AOXException extends Exception {
	protected $exit;
	
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @param mixed $message
	 * @param int $code. (default: 0)
	 * @param bool $exit. (default: false)
	 * @return void
	 */
	public function __construct($message, $code = 0, $exit = false) {
		parent::__construct($message, $code);
		$this->exit = $exit;
	}
	
	/**
	 * __toString function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __toString() {
		return "Exception: " . get_class($this) . "<br />\n" .
		"Message: " . $this->message . "<br />\n" .
		"File: " . $this->file . "<br />\n" .
		"Line: " . $this->line;
	}
	
	/**
	 * shouldExit function.
	 * 
	 * @access public
	 * @return void
	 */
	public function shouldExit() {
		return $this->exit;
	}
	
	/**
	 * doExit function.
	 * 
	 * @access public
	 * @return void
	 */
	public function doExit() {
		if ($this->exit) {
			exit;
		}
	}
}

/**
 * isValidModule function.
 * checks if a given module is installed
 * 
 * @access public
 * @param mixed $moduleID
 * @param bool $enabled. (default: false)
 * @return void
 */
function isValidModule($moduleID, $enabled = false) {
	$sql = "SELECT moduleID
					FROM " . DB_PREFIX . "module
					WHERE moduleID = '%s'";
	if ($enabled) {
		$sql .= "AND enabled = 1";
	}
	$db = new MySQL();
	$query = $db->query($sql,
											$moduleID);
	return ($db->numRows($query) == 1) ? true : false;
}

/**
 * makeValidUrl function.
 * checks if a given url is a valid absolute url
 * 
 * @access public
 * @param mixed $url
 * @return void
 */
function makeValidUrl($url) {
	return $url;
}

/**
 * isValidConfigID function.
 * checks if a configID is valid
 * 
 * @access public
 * @param mixed $configID
 * @return void
 */
function isValidConfigID($configID) {
	$db = new MySQL();
	$query = $db->query("SELECT configID
											FROM " . DB_PREFIX . "config
											WHERE configID = %s",
											(int)$configID);
	return ($db->numRows($query) == 1) ? true : false;
}

/**
 * writeException function.
 * echo a given Exception
 * 
 * @access public
 * @param mixed $exception
 * @return void
 */
function writeException($exception) {
	require AOX_MODULE_PATH . "/ErrorModule.class.php";
	$module = new ErrorModule();
	$module->setTitle(get_class($exception));
	$module->setMessage($exception);
	$module->setRedirect(false);
	$module->display();
	
	$exception->doExit();
}
?>