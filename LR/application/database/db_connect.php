<?php 
/*
DATABASE CONNECTION
MYSQLI CONNECTION
*/

$localhost   	= '127.0.0.1';
$username 		= 'root';
$password 		= '';
$dbname 		= 'lr';

$GLOBALS['connection'] = null;

try {
	$GLOBALS['connection'] = mysqli_connect($localhost, $username, $password, $dbname);	
	// echo "Connected Successfully";	
} catch (Exception $e) {
	throw new Exception($e->mysqli_connect_error());		
}



?>