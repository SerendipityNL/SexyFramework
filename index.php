<?php

// Start the session for the user
session_start();

// Include the one file that includes the important parts of the framework
include_once 'core/init.php';

// Start the framework by completing the request the user made with it's URL
$router->init();
?>