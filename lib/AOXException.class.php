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
		"Code: " . $this->code . "<br />\n" .
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
?>