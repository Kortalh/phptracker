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

// BaseController Class
require_once( APP_PATH . 'lib/controller.php');

// BaseModel Class
require_once( APP_PATH . 'lib/model.php');


/************************************************************
 *	Core Site Class											*
 ************************************************************/

class Site {

	// Apply injected config files
	public function __construct() {
		$this->config		= new Config;

		// If no controller is specified, use the default.
		if ( empty($_GET['controller']) ) {
			$_GET['controller'] = $this->config->defaultController;
		}

		// Load the requested controller
		$this->loadController( $_GET['controller'] );
	}

	// Loads a controller with the given name
	public function loadController( $controller ) {

		// Determine the expected path for the controller file
		$path = APP_PATH . 'controller/' . $controller . '.php';

		// Make sure the file exists...
		if ( file_exists( $path )) {

			// Load the controller class's file
			include( $path );

			// Format the controller class name to match conventions
			$controllerClass = ucfirst($controller) . 'Controller';

			// Load the requestted controller class
			$this->controller = new $controllerClass($this->config, $this->database);

		// File does not exist. Throw an error message.
		} else {
			error('The requested controller file, "' . $path . '", does not exist.');
		}

	}

}

?>