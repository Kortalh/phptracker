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
			error('The requested action, <i><b>' . $_GET['action'] . '()</b></i>, does not exist for the <b><i>' . ucfirst($_GET['controller']) . 'Controller</i></b> class.');
		}

		// Load the appropriate view
		$this->loadView($_GET['action']);

	}


	// Sets a variable to be passed to the view
	public function set($variable, $value) {
		$this->$variable = $value;
	}


	// Loads the requested model
	public function loadModel($model) {

		// Make sure the file exists...
		if ( file_exists( APP_PATH . 'model/' . $model . '.php')) {

			// Load the requested model
			include( APP_PATH . 'model/' . $model . '.php');

			// Format the model class name to match conventions
			$modelClass = ucfirst($model) . 'Model';

			// Assign the model class to the controller
			$this->$model = new $modelClass;

		} else {

			error('The requested model file, "' . $model . '", does not exist.');
		}

	}


	// Loads the appropriate view
	public function loadView($view) {

		// Determine the expected location of the view file
		$path = APP_PATH . 'view/' . $_GET['controller'] . '/' . $view . '.php';

		// Make sure the file exists...
		if ( file_exists( $path )) {

			// Load the view class's file
			include( $path );

		} else {

			error('The requested view file, "' . $path . '", does not exist.');
		}

	}

}

?>