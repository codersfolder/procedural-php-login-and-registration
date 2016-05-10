<?php 

require_once 'application/init.php';
require_once 'application/process/loginProcess.php';


if(logged_in()) {
	redirect('dashboard.php');
}	

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>

<!-- LOGIN PAGE -->
<form action="" method="POST" name="loginForm" id="loginForm">
	<fieldset>
		
		<legend>Login</legend>

		<?php 
		if(errors()) {
			foreach(errors() as $error) {
				echo "<p class='errors'> * ".$error."</p>";
			}
		}
		?>

		<table>
			<tr>
				<td>Username</td>				
				<td><input type="text" name="username" id="username" autocomplete="off" autofocus placeholder="Username" value="<?php echo post('username'); ?>"></td>
			</tr>

			<tr>
				<td>Password</td>
				
				<td><input type="password" name="password" id="password" autocomplete="off" placeholder="Password"></td>
			</tr>
			

			<tr>
				<td><button type="submit" id="loginButton">Login</button></td>
			</tr>
		</table>

		<p>Not Registered ? <a href="signup.php">SignUp</a></p>
	</fieldset>
</form>

</body>
</html>

