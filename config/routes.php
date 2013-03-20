<?php
$routes = array(
	'login'					=> 'cms/users:login',
	'logout'				=> 'cms/users:logout',
	'forgot_password'		=> 'cms/users:forgot_password',
	'reset_password'		=> 'cms/users:reset_password',
	'cms/profile'			=> 'cms/users:profile',
	'cms'					=> 'cms/compose:index',
	'category/*'			=> 'menu:category',
	'product/*'				=> 'menu:product',
	'offers'				=> 'menu:offers',
	'change_language/*'		=> 'menu:change_language',
	'products.json'			=> 'menu:products',
	'contact'				=> 'menu:contact',
	'info'					=> 'menu:info'
);
?>