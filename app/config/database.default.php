<?php

// Container for database variable
class Database {

	public function __construct() {

		// Development Settings
		if (DEVMODE) {
			$this->host		= '';
			$this->user		= '';
			$this->pass		= '';
			$this->name		= '';

		// Production Settings
		} else {
			$this->host		= '';
			$this->user		= '';
			$this->pass		= '';
			$this->name		= '';
		}


	}

}

?>