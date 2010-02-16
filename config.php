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
 * @file		config.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */
// some database-configurations
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbPrefix = '';

// some admin-config
$adminMail = 'root@localhost';

// don't change these settings
// root path of your aoxPages installation
define('AOX_PATH', __DIR__);
define('AOX_MODULE_PATH', AOX_PATH . '/modules');
define('DB_PREFIX', $dbPrefix);
unset($dbPrefix);
?>