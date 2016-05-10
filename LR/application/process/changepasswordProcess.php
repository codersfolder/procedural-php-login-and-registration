<?php 

if(empty($_POST) === false) {
	required_field('current_password', 'Current Password', true);
	required_field('password', 'New Password', true);
	required_field('conform_password', 'Conform Password', true);

	if(pass()) {
		if(current_password_match(post('current_password')) === false) {
			$GLOBALS['errors'][] = "Current Password is incorrect";
		}

		if(match_password(post('password'), post('conform_password')) === false) {
			$GLOBALS['errors'][] = "New Password and Conform Password does not match";	
		}

		if(min_length(post('password'), 6) === false) {
			$GLOBALS['errors'][] = "New Password must be alteast 6 characters";		
		}

		if(empty($GLOBALS['errors']) === true) {
			change_password();
			redirect('changepassword.php?success=true');
		}

	}



}

?>