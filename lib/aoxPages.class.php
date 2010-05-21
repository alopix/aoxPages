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
		$options = array(
			PDO::ATTR_PERSISTENT => true
		);
		try {
			self::$db = new PDO($dbSystem . ':host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPassword, $options);
		} catch (PDOException $e) {
			throw new AOXException($e->getMessage(), $e->getCode());
    }
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