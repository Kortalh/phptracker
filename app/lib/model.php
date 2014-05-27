<?php

// Base model class
class BaseModel {

	// On construct, attempt a connection to the database
	public function __construct() {

		$this->database = new Database();

		// Connect to the database
		$dbConnection = new PDO("mysql:host=" . $this->database->host . ";dbname=" . $this->database->name, $this->database->user, $this->database->pass);

	}


	// Database Functions
	public function query($query) {

	}

	// Query results
	public function results() {

	}

}

?>