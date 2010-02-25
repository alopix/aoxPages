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
 * @file		index.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */
require "config.php";
require AOX_PATH . "/config_outline.php";
require OUTLINE_CLASS_PATH . "/tpl.php";
require AOX_PATH . "/lib/AOXException.class.php";
require AOX_PATH . "/lib/functions.php";
require AOX_PATH . "/lib/Config.class.php";
require AOX_PATH . "/lib/aoxPages.class.php";

/**
 * __autoload function.
 * 
 * @access public
 * @param mixed $className
 * @return void
 */
function __autoload($className) {
	if ($className == "AbstractModule") {
		require AOX_MODULE_PATH . "/AbstractModule.class.php";
	}
}

set_exception_handler('writeException');

OutlineTpl::globalAssign('pageTitle', 'aoxPages Devel');

try {
	aoxPages::setDB($dbHost, $dbUser, $dbPassword, $dbName, $dbSystem);
} catch (Exception $e) {
	writeException($e);
}

try {
	$_config = new Config();
	$configID = $_config->getOption('standardConfigID');
	$_config->resetConfig($configID);
} catch (Exception $e) {
	writeException($e);
}

$getModule = $_GET['module'];
if (empty($getModule)) {
	$getModule = $_config->getOption('standardModule');
}

$module = NULL;
if (AbstractModule::isValidModule($getModule, true)) {
	require AOX_MODULE_PATH . "/" . $getModule . ".class.php";
	$module = new $getModule();
} else {
	require AOX_MODULE_PATH . "/ErrorModule.class.php";
	$module = new ErrorModule();
	$module->setTitle("Module-Error");
	$module->setMessage("The module you selected was not found. The administrator was informed about this error.");
	$module->setRedirect(false);
}

$module->display();
?>