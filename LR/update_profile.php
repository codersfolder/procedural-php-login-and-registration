<?php 


require_once 'includes/header.php'; 
require_once 'application/process/updateprofileProcess.php';

$user_data = get_user_data();

?>			

<fieldset>
	<legend><h3>Update Profile</h3></legend>

	<?php 
	if(errors()) {
		foreach(errors() as $error) {
			echo "<p class='errors'> * ".$error."</p>";
		}
	}

	if(get('success')) {
		echo "<p class='success'>Successfully updated!!</p>";
	}
	?>

	<form action="" method="POST">	
		<table width="100%">
			<tr>
				<td>Username </td>
				<td><input type="text" name="username" id="username" autocomplete="off" value="<?php echo $user_data['username'] ?>" placeholder="Username"></td>
			</tr>
			<tr>
				<td>Email </td>
				<td><input type="email" name="email" id="email" autocomplete="off" value="<?php echo $user_data['email'] ?>" placeholder="john@example.com"></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="fname" id="fname" autocomplete="off" value="<?php echo $user_data['fname'] ?>" placeholder="John"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lname" id="lname" autocomplete="off" value="<?php echo $user_data['lname'] ?>" placeholder="Doe"></td>
			</tr>
			<tr>
				<td><button type="submit">Update</button></td>
			</tr>
		</table>
	</form>
</fieldset>


<?php require_once 'includes/footer.php'; ?>
		