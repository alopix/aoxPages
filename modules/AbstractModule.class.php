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
 * @file		AbstractModule.class.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */

/**
 * Abstract AbstractModule class.
 * 
 * @abstract
 */
abstract class AbstractModule {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
	}
	
	/**
	 * __destruct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __destruct() {
		// nothing to do here :D
	}
	
	/**
	 * display function.
	 * 
	 * @access public
	 * @abstract
	 * @return void
	 */
	abstract public function display();
	
	/**
	 * isValidModule function.
	 * checks if a given module is installed
	 * 
	 * @access public
	 * @param mixed $moduleID
	 * @param bool $enabled. (default: false)
	 * @return void
	 */
	public static function isValidModule($moduleID, $enabled = false) {
		$sql = "SELECT moduleID
						FROM " . DB_PREFIX . "module
						WHERE moduleID = '%s'";
		if ($enabled) {
			$sql .= " AND enabled = 1";
		}
		$db = aoxPages::getDB();
		$query = $db->query($sql,
												$moduleID);
		return ($db->numRows($query) == 1) ? true : false;
	}
}
?>