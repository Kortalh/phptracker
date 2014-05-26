<?php

	// Establish the user session
	session_start();

	define('DEVMODE', true);


	// Set the value of the site's working path
	$root = '';

	// define('ROOT_PATH', $root . '/');
	define('APP_PATH', $root . 'app/');


	// Include global site class
	require_once(APP_PATH . 'lib/site.php');

	$site = new Site( new Config(), new Database() );

 ?>