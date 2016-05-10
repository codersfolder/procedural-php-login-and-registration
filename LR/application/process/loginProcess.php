<?php 

if(empty($_POST) === false) {

	required_field('username', "Username", true);
	required_field('password', "Password", true);

	if(pass()) {
		if(username_exists(post('username')) === false) {
			$GLOBALS['errors'][] = "Username doesnot exists!";
		}

		if(user_active(post('username')) === false) {
			$GLOBALS['errors'][] = "Account is deactivated";	
		}

	} 

	if(empty($_POST) === false && empty($GLOBALS['errors']) === true) {
		$login = login(post('username'), post('password'));

		if($login === false) {
			$GLOBALS['errors'][] = "username/password is incorrect";
		} else {
			setSession('user_id', $login);
			redirect('dashboard.php');
		}
	}

}

?>