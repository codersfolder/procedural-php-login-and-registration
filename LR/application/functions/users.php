<?php 

// registe users into database
function register_user($register_data = null) {
	if($register_data) {
		array_walk($register_data, 'array_escape_html');
		array_walk($register_data, 'array_sanitize_string');		
		
		$register_data['password'] = shaPassword($register_data['password']);

		$field = implode(',', array_keys($register_data));
		$value = "'" . implode("','", $register_data) . "'";
		
		$query = "INSERT INTO users ($field) VALUES ($value)";

		try {
			mysqli_query($GLOBALS['connection'], $query);			
		} catch (Exception $e) {
			die($e->mysqli_error($GLOBALS['connection']));
		}
		
		mysqli_close($_GLOBALS['connection']);
	}
}

function logged_in() {
	return (existSession('user_id')) ? true : false;
}

function logout() {
	session_destroy();
}

function current_password_match($password = null) {
	if($password) {
		$user_data = get_user_data();
		$password = shaPassword($password);
		if($password === $user_data['password']) {
			return true;
		} else {
			return false;
		}
	}
}

// update password
function change_password() {
	$password = shaPassword(post('password'));
	$user_data = get_user_data();
	$user_id = $user_data['users_id'];

	try {
		$query = "UPDATE users SET password = '$password' WHERE users_id = '$user_id'";
		$result = mysqli_query($GLOBALS['connection'], $query);
	} catch (Exception $e) {
		die($e->mysqli_error($GLOBALS['connection']));
	}
	
	mysqli_close($GLOBALS['connection']);
}

// update profile
function update_profile() {
	$user_data = get_user_data();
	$user_id = $user_data['users_id'];

	$update_data = array(
		'username' => post('username'),
		'email'    => post('email'),
		'fname'	   => post('fname'),
		'lname'	   => post('lname')
	);

	$update = array();
	foreach ($update_data as $key => $value) {
		$update[] = $key . "=" . "'".$value."'";
	}

	$query = "UPDATE users SET " . implode(', ', $update) . "WHERE users_id = " . $user_id;
	$result = mysqli_query($GLOBALS['connection'], $query);
	
	
}

function get_user_data() {
	$user_id = getSession('user_id');

	$query = "SELECT * FROM users WHERE users_id = '$user_id'";
	$result = mysqli_query($GLOBALS['connection'], $query);

	if(mysqli_num_rows($result) == 1) {
		while($row = mysqli_fetch_assoc($result)) {
			return $row;
		}
		
	} else {
		return false;
	}

	mysqli_close($GLOBALS['connection']);
}

// check if email exists in database
function email_exists($email = null) {
	if($email) {
		$query = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($GLOBALS['connection'], $query);

		if(mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}

		mysqli_close($_GLOBALS['connection']);
	}
}

// check if username exists in database
function username_exists($username = null) {
	if($username) {
		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($GLOBALS['connection'], $query);

		if(mysqli_num_rows($result) > 0) {
			return true;
		} else {
			return false;
		}

		mysqli_close($_GLOBALS['connection']);
	}
}

// check if users is active
function user_active($username = null) {
	if($username) {

		$exists = username_exists($username);

		if($exists === true) {
			$query = "SELECT * FROM users WHERE username = '$username' AND users_active = 1";
			$result = mysqli_query($GLOBALS['connection'], $query);

			if(mysqli_num_rows($result) > 0) {
				return true;
			} else {
				return false;
			}
			mysqli_close($_GLOBALS['connection']);
		} 
	}
}

function login($username = null, $password = null) {
	if($username && $password) {

		$username = htmlentities($username);
		$password = shaPassword($password);

		$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($GLOBALS['connection'], $query);

		if(mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)) {
				return $row['users_id'];
			}
		} else {
			return false;
		}
		mysqli_close($GLOBALS['connection']);
	}
}

?>