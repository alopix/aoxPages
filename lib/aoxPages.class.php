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
 * @file		
 * @version		1.0 Pre-Alpha 1
 * @date		02/19/2010
 * 
 * Copyright (c) 2010
 */

/**
 * aoxPages class.
 * 
 */
class aoxPages {
	/**
	 * db
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected static $db;
	
	/**
	 * setDB function.
	 * 
	 * @access public
	 * @param mixed $dbHost
	 * @param mixed $dbUser
	 * @param mixed $dbPassword
	 * @param mixed $dbName
	 * @param mixed $dbSystem
	 * @return void
	 */
	public static function setDB($dbHost, $dbUser, $dbPassword, $dbName, $dbSystem) {
		if (file_exists(AOX_PATH . "/lib/db/" . $dbSystem . ".class.php")) {
			require AOX_PATH . "/lib/db/" . $dbSystem . ".class.php";
		}
		if (!is_subclass_of($dbSystem, 'AbstractDB')) {
			throw new AOXException("The DBMS you chose (" . $dbSystem . ") is not valid", 3001);
		}
		self::$db = new $dbSystem($dbHost, $dbUser, $dbPassword);
		self::$db->setDatabase($dbName);
	}
	
	/**
	 * getDB function.
	 * 
	 * @access public
	 * @return AbstractDB
	 */
	public static function getDB() {
		return self::$db;
	}
}
?>