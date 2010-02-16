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
 * @file		config_outline.php
 * @version		1.0 Pre-Alpha 1
 * @date		02/15/2010
 * 
 * Copyright (c) 2010
 */
// some database-configurations

// some Outline (template) configurations
//   root path of your Outline installation
define("OUTLINE_SYSTEM_PATH", AOX_PATH);
//   root path of your application                       
define("OUTLINE_SCRIPT_PATH", AOX_PATH);
//   path to Outline's system classes
define("OUTLINE_CLASS_PATH", OUTLINE_SYSTEM_PATH . "/lib/tpl");

//   if set, displays various debugging messages during load/compile
define("OUTLINE_DEBUG", false);
//   if set, compiles templates unconditionally, on every run
define("OUTLINE_ALWAYS_COMPILE", false);

// default OutlineEngine configuration settings
//   path to folder containing templates
define("OUTLINE_TEMPLATE_PATH", OUTLINE_SCRIPT_PATH . "/templates");
//   folder containing compiled templates (must be writable)
define("OUTLINE_COMPILED_PATH", OUTLINE_SCRIPT_PATH . "/compiled");
//   the folder in which the Cache class stores it's content
define("OUTLINE_CACHE_PATH",    OUTLINE_SCRIPT_PATH . "/cache");

//   file extension or suffix for cache files
define("OUTLINE_CACHE_SUFFIX", ".html");
//   default cache time (in seconds)
define("OUTLINE_CACHE_TIME", 60*60*24);

//   permission flag for created files (cache and compiled templates)
define("OUTLINE_FILE_MODE", 0777);
//   permission flag for created directories
define("OUTLINE_DIR_MODE", 0777);

// Outline Debug function
function OutlineDebug($msg) {
	echo "<div style=\"color:#f00\"><strong>Outline</strong>: $msg</div>";
}

// load the engine and modifiers
require_once OUTLINE_CLASS_PATH . "/engine.php";
require_once OUTLINE_CLASS_PATH . "/modifiers.php";
?>