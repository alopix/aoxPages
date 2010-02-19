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

/**
 * MySQLException class.
 * 
 * @extends AOXException
 */
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
	
	public function setDatabase($name) {
		if (!mysql_select_db($name, $this->connection)) {
			throw new MySQLException(mysql_error(), mysql_errno());
		}
	}
	
	/**
	 * query function.
	 * 
	 * @access public
	 * @param mixed $query
	 * @return mixed
	 */
	public function query($query) {
		$args = func_get_args();
		array_shift($args);
		$sql = vsprintf($query, $args);
		
		$result = @mysql_query($sql, $this->connection);
		if (!$result) {
			throw new MySQLException(mysql_error(), mysql_errno());
		}
		
		return $result;
	}
	
	/**
	 * numRows function.
	 * 
	 * @access public
	 * @param mixed $result
	 * @return integer
	 */
	public function numRows($result) {
		return @mysql_num_rows($result);
	}
	
	/**
	 * fetchAssoc function.
	 * 
	 * @access public
	 * @param mixed $result
	 * @return mixed
	 */
	public function fetchAssoc($result) {
		return @mysql_fetch_assoc($result);
	}
	
	/**
	 * freeResult function.
	 * 
	 * @access public
	 * @param mixed $result
	 * @return void
	 */
	public function freeResult($result) {
		mysql_free_result($result);
	}
}
?>