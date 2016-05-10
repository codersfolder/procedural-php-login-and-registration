<?php 

require_once 'application/init.php'; 
include_once 'application/process/signupProcess.php';


if(logged_in()) {
	redirect('dashboard.php');
}

?>


<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>

<!-- LOGIN PAGE -->
<form action="" method="POST" id="signUpForm" name="signUpForm">
	<fieldset>
		<legend>Signup</legend>

		<?php 
		if(errors()) {
			foreach(errors() as $error) {
				echo "<p class='errors'> * " , $error , "</p>";
			}
		}

		if(get('success')) {
			echo "<p class='success'>Successfully Registered</p>";
		}

		?>

		<table border="0">
			<tr>
				<td>First Name *</td>				
				<td><input type="text" name="fname" id="fname" autocomplete="off" placeholder="John" value="<?php echo post('fname'); ?>" autofocus></td>
			</tr>

			<tr>
				<td>Last Name</td>						
				<td><input type="text" name="lname" id="lname" autocomplete="off" placeholder="Doe" value="<?php echo post('lname'); ?>"></td>
			</tr>

			<tr>
				<td>Username *</td>							
				<td><input type="text" name="username" id="username" autocomplete="off" placeholder="Username" value="<?php echo post('username'); ?>"></td>
			</tr>

			<tr>
				<td>Email *</td>				
				<td><input type="email" name="email" id="email" autocomplete="off" placeholder="john@example.com" value="<?php echo post('email'); ?>"></td>
			</tr>

			<tr>
				<td>Password *</td>				
				<td><input type="password" name="password" id="password" autocomplete="off" placeholder="Password" ></td>
			</tr>

			<tr>
				<td>Conform Password *</td>				
				<td><input type="password" name="cpassword" id="cpassword" autocomplete="off" placeholder="Conform Password"></td>
			</tr>
			
			<tr>
				<td><button type="submit" id="signUpButton">Sign Up</button></td>
			</tr>
		</table>

		<p>Already Registered ? <a href="index.php">Login</a></p>
	</fieldset>
</form>

</body>
</html>

