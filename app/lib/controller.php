<?php

// Base controller class
class BaseController {

	// On construct, attempt to call the requested action
	public function __construct() {

		// If no action is specified, use the index action
		if ( empty( $_GET['action'] ) ) {
			$_GET['action'] = 'index';
		}

		// Does the requested action exist?
		if ( method_exists( $this, $_GET['action'] ) ) {

			// Call the requested action with any parameter given
			$this->$_GET['action']( $_GET['param'] );


		// Requested action does not exist
		} else {
			error('The requested action does not exist.');
		}

		// Load the appropriate view
		$this->loadView($_GET['action']);

	}


	// Sets a variable to be passed to the view
	public function set($variable, $value) {
		$this->$variable = $value;
	}


	// Loads the appropriate view
	public function loadView($view) {

		// Make sure the file exists...
		if ( file_exists( APP_PATH . 'view/' . $_GET['controller'] . '/' . $view . '.php' )) {

			// Load the view class's file
			include( APP_PATH . 'view/' . $_GET['controller'] . '/' . $view . '.php');

		} else {

			error('The requested view does not exist.');
		}

	}

}

?>