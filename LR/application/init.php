<?php 

session_start();

require_once 'database/db_connect.php';
require_once 'functions/users.php';
require_once 'functions/validate.php';
require_once 'functions/security.php';
require_once 'functions/redirect.php';
require_once 'functions/input.php';
require_once 'functions/session.php';



// echo $user_data['username'];


$GLOBALS["errors"] = array();
$GLOBALS['passed'] = false;

?>
