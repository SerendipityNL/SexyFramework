<?php
// Turn on the debug mode to show SQL queries and disable redirects
define('DEBUG_MODE', 0);

// Set the default template, controller and action
define('DEFAULT_TEMPLATE', 'dashboard');

// Set the defaukt controller
define('DEFAULT_CONTROLLER', 'menu');

// Set the default action
define('DEFAULT_ACTION', 'index');

if (DEBUG_MODE == 1) {
	// Sets the error_reporting to show all errors
	//error_reporting(E_ALL);
}
else {
	// Sets the error_reporting to show all errors except notices
	error_reporting(E_ALL ^ E_NOTICE);
}

define('BASE', $_SERVER['HTTP_HOST'].'/menukaarten-0.6/');

define('SUBDOMAIN', '');

define('LOCATION_TEMP', 1);

// Sets the base path without an / (for example: www.mywebsite.com/test)
define('BASE_PATH', 'http://'.SUBDOMAIN.BASE);


// Some global variables for a feature we may want to implement
define('DOCROOT', __DIR__.'/');
define('COREPATH', DOCROOT.'../core');
define('APPDATA', COREPATH.'/application');
?>
