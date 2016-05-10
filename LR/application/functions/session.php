<?php 

function setSession($name, $value) {
	return $_SESSION[$name] = $value;
}

function existSession($name) {
	if(isset($_SESSION[$name])) {
		return true;
	} else {
		return false;
	}
}

function getSession($name) {
	return $_SESSION[$name];
}

?>