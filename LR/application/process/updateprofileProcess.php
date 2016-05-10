<?php 

if(empty($_POST) === false) {
	required_field('username', "Username", true);
	required_field('email', "Email", true);
	required_field('fname', "First Name", true);
	required_field('lname', "Last Name", true);

	if(pass()) {
		if(invalid_email(post('email')) === true) {
			$GLOBALS['errors'][] = "Invalid Email Address";
		}

		$user_data = get_user_data();
		if(email_exists(post('email')) && post('email') !== $user_data['email']) {
			$GLOBALS['errors'][] = "Email address already exists!!";
		}

		if(username_exists(post('username')) && post('username') !== $user_data['username']) {
			$GLOBALS['errors'][] = "Username already exists!!";
		}

		if(empty($GLOBALS['errros']) === true) {
			update_profile();
			redirect('update_profile.php?success=true');
		}

	}

}

?>