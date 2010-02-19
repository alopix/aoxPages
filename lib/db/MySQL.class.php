<?php
/**
 * aoxPages
 * 
 * english is a word game
 * 
 * @license		Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Austria License
 * @author		Dustin Steiner
 * @link		http://www.alopix.net
 * @email		dustin.steiner@gmail.com
 * 
 * @file		MySQL.class.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */
require AOX_PATH . "/lib/db/AbstractDB.class.php";

class MySQLException extends AOXException { }

/**
 * MySQL class.
 * 
 */
class MySQL extends AbstractDB {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @param mixed $host
	 * @param mixed $username
	 * @param mixed $password
	 * @param string $database. (default: '')
	 * @return void
	 */
	public function __construct($host, $username, $password) {
		$this->connection = @mysql_connect($host, $username, $password);
		if (!$this->connection) {
			throw new MySQLException(mysql_error(), mysql_errno());
		}
	}
	
	/**
	 * query function.
	 * 
	 * @access public
	 * @param mixed $query
	 * @return void
	 */
	public function query($query) {
		
	}
	
	/**
	 * numRows function.
	 * 
	 * @access public
	 * @param mixed $result
	 * @return void
	 */
	public function numRows($result) {
		
	}
}
?>