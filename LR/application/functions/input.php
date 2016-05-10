<?php 

// to fetch the post form
function post($field = null) {
	if($field) {
		if(empty($_POST) === false) {
			return $_POST[$field];
		}
	}
}

function get($field = null) {
	if($field) {
		if(empty($_GET) === false) {
			return $_GET[$field];
		}
	}
}

?>