<?php 

// escaping html entities
function array_escape_html($field) {
	$field = htmlentities($field);
}

function array_sanitize_string($field) {
	$field = mysqli_real_escape_string($GLOBALS['connection'], $field);
}

// encrypting the password into sha format
function shaPassword($field = null, $salt = "")  {
	if($field) {
		return hash('sha256', $field.$salt);
	}
}



?>