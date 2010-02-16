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
 * @file		ErrorModule.class.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */

/**
 * ErrorModule class.
 * 
 * @extends AbstractModule
 */
class ErrorModule extends AbstractModule {
	/**
	 * tpl
	 * 
	 * (default value: NULL)
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $tpl = NULL;
	
	/**
	 * logging
	 * 
	 * (default value: false)
	 * 
	 * @var bool
	 * @access protected
	 */
	protected $logging = false;
	
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @param bool $loggingEnabled. (default: false)
	 * @return void
	 */
	public function __construct($loggingEnabled = false) {
		parent::__construct();
		$this->logging = $loggingEnabled;
		
		$this->tpl = new OutlineTpl('error');
	}
	
	/**
	 * __destruct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __destruct() {
		//TODO: log error if set true
		parent::__destruct();
	}
	
	/**
	 * setTitle function.
	 * 
	 * @access public
	 * @param mixed $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->tpl->assign('curPageTitle', $title);
	}
	
	/**
	 * setMessage function.
	 * 
	 * @access public
	 * @param mixed $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->tpl->assign('errorMessage', $message);
	}
	
	/**
	 * setRedirect function.
	 * 
	 * @access public
	 * @param mixed $enabled
	 * @param string $url. (default: '')
	 * @param int $timeInSeconds. (default: 0)
	 * @return void
	 */
	public function setRedirect($enabled, $url = '', $timeInSeconds = 0) {
		$this->tpl->assign('redirectEnabled', $enabled);
		if ($enabled) {
			$url = makeValidUrl($url);
			$this->tpl->assign('redirectUrl', $url);
			$this->tpl->assign('redirectTime', $timeInSeconds);
		}
	}
	
	/**
	 * setRedirectTime function.
	 * 
	 * @access public
	 * @param mixed $timeInSeconds
	 * @return void
	 */
	public function setRedirectTime($timeInSeconds) {
		$this->tpl->assign('redirectTime', $timeInSeconds);
	}
	
	/**
	 * display function.
	 * 
	 * @access public
	 * @return void
	 */
	public function display() {
		$this->tpl->display();
	}
}
?>