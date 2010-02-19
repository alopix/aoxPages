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
	$db = aoxPages::getDB();
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
 * writeException function.
 * 
 * @access public
 * @param mixed $exception
 * @param mixed $exit. (default: NULL)
 * @return void
 */
function writeException($exception, $exit = NULL) {
	require AOX_MODULE_PATH . "/ErrorModule.class.php";
	$module = new ErrorModule();
	$module->setTitle(get_class($exception));
	$module->setMessage($exception);
	$module->setRedirect(false);
	$module->display();
	
	if ($exit !== NULL) {
		$exception->setExit($exit);
	}
	
	$exception->doExit();
}
?>