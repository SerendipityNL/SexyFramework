<?php

// Load the config files that are stored in the config folder
$configs = array('database.php','settings.php');
foreach ($configs as $config) {
	$path = 'config/'.$config;
	if (file_exists($path)) {
		include_once $path;	
	}
	else {
		// If the folder is missing, die
		die('Config file '.$path.' not found!');
	}
}

/*
 * 	
 *	Load the essential parts of the framework. These files also load the rest of the files
 *	
 *	These files are loaded after the config because of the fact that in config some variables are set.
 *	We don't want you to have to change the core of the framework, so that's why
 *
 */

require_once 'core/base_controller.php';
require_once 'core/load.php';
require_once 'core/router.php';

// Start the router
$router = new router();

// Load the helper files
$helpers = glob('core/helpers/*.php');
foreach ($helpers as $helper) {
	include_once $helper;
}

// Load the modules
$modules = glob('core/modules/*.php');
foreach ($modules as $module) {
	include_once $module;
}

// Unset some variables to decrease memory load
unset($helpers, $helper, $configs, $config, $modules, $module, $path);

// Debug mode, for programming purposes
if (DEBUG_MODE == 1) {
	error_reporting(E_ALL);
}
?>