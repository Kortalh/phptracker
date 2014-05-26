<?php

// Outputs the given value in a debug-friendly view
function debug($value) {

	echo '<pre style="outline: 1px solid red; padding: 10px;">';
	print_r($value);
	echo '</pre>';

}

function error($value) {

	echo '<pre style="border-radius: 5px; border: 2px solid #300; padding: 10px; background: linear-gradient(#b00, #600); color: white;">';
	echo '<h2>Error</h2>';
	print_r($value);
	echo '<p></p>';
	echo '</pre>';

}

?>