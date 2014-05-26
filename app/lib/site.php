<?php

/************************************************************
 *	Include configuration									*
 ************************************************************/

// Include the site configuration
require_once(APP_PATH . 'config/config.php');
// Include the database configuration
require_once(APP_PATH . 'config/database.php');


/************************************************************
 *	Site Components											*
 ************************************************************/

// Global Helper Functions
require_once(APP_PATH . 'lib/globals.php');

// Controller Class
require_once( APP_PATH . 'lib/controller.php');


/************************************************************
 *	Core Site Class											*
 ************************************************************/

class Site {

	public $config;
	public $database;

	// Apply injected config files
	public function __construct(Config $config, Database $database) {
		$this->config		= $config;
		$this->database		= $database;

		// If no controller is specified, use the default.
		if ( empty($_GET['controller']) ) {
			$_GET['controller'] = $this->config->defaultController;
		}

		// Load the requested controller
		$this->loadController( $_GET['controller'] );
	}

	// Loads a controller with the given name
	public function loadController( $controller ) {

		// Make sure the file exists...
		if ( file_exists( APP_PATH . 'controller/' . $controller . '.php' )) {

			// Load the controller class's file
			include( APP_PATH . 'controller/' . $controller . '.php');

			// Format the controller class name to match conventions
			$controllerClassName = ucfirst($controller) . 'Controller';

			// Load the requestted controller class
			$controllerClass = new $controllerClassName;

		// File does not exist. Throw an error message.
		} else {
			error('The requested controller does not exist.');
		}

	}

}

?>