<?php 

function required_field($field = null, $label = null, $statement) {
	foreach ($_POST as $key => $value) {
		if($key === $field && $statement === true && empty($value)) {			
			$GLOBALS["errors"][] = $label . " field is required";										
		}
	}

	if(empty($GLOBALS["errors"])) {
		$GLOBALS['passed'] = true;		
	} else {		
		$GLOBALS['passed'] = false;		
	}
}

// check if form is validate
function pass() {	
	return $GLOBALS['passed'];
}

// returns errors
function errors() {
	return $GLOBALS["errors"];
}

// check is invalid email is provided
function invalid_email($email = null) {
	if($email) {
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			return false;
		} else {
			return true;	
		}		
	}
}

// password matches with conform password
function match_password($fp = null, $sp = null) {
	if($fp && $sp) {
		if($fp === $sp) {
			return true;
		} else {
			return false;
		}
		
	}
}

// check if provided input field has min length
function min_length($value = null, $required = null) {
	if(strlen($value) > $required) {
		return true;
	} else {
		return false;	
	}
	
}

?>