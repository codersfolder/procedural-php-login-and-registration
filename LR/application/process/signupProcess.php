<?php 

if(empty($_POST) === false) {
	
	required_field('fname', 'First Name', true);
	required_field('username', 'Username', true);
	required_field('email', 'Email', true);
	required_field('password', 'Password', true);
	required_field('cpassword', 'Confirm Password', true);

	if(pass()) {

		// username unique
		if(username_exists($_POST['username']) === true ) {
			$GLOBALS['errors'][] = 'Username already exists';								
		} 

		// email exists already
		if(email_exists($_POST['email']) === true) {
			$GLOBALS['errors'][] = 'Email already exists';									
		}

		// valid email
		if(invalid_email($_POST['email']) === true) {
			$GLOBALS['errors'][] = 'Invalid Email';
		}

		// password match
		if(match_password($_POST['password'], $_POST['cpassword']) === false) {
			$GLOBALS['errors'][] = "Password should match with conform password";
		}

		// min_length
		if(min_length($_POST['password'], 6) === false) {
			$GLOBALS['errors'][] = "Password must be atleast 6 Characters";
		}		

		if(empty($GLOBALS['errors']) === true) {
			$data = array(
				'fname' => htmlspecialchars(post('fname')),
				'lname' => htmlspecialchars(post('lname')),
				'username' => htmlspecialchars(post('username')),
				'email'	=> htmlspecialchars(post('email')),
				'password' => htmlspecialchars(post('password'))				
			);
			// register user
			register_user($data);
			redirect('signup.php?success=true');
		}
	}	
}



?>