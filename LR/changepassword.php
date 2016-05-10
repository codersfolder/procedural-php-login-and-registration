<?php 

require_once 'includes/header.php'; 
require_once 'application/process/changepasswordProcess.php';

?>			

<fieldset>
	<legend><h3>Change password</h3></legend>

	<?php 
	if(errors()) {
		foreach (errors() as $key => $value) {
			echo "<p class='errors'> * ", $value , "</p>";
		}
	}

	if(get('success')) {
		echo "<p class='success'>Successfully Updated</p>";
	}
	?>

	<form action="" method="POST">
		<table border="0" width="100%">
			<tr>
				<td>Current password</td>
				<td><input type="password" name="current_password" id="current_password" autocomplete="off" placeholder="Current Password"></td>
			</tr>

			<tr>
				<td>New password</td>
				<td><input type="password" name="password" id="password" autocomplete="off" placeholder="New Password"></td>
			</tr>

			<tr>
				<td>Conform password</td>
				<td><input type="password" name="conform_password" id="conform_password" autocomplete="off" placeholder="Conform Password"></td>
			</tr>

			<tr>
				<td>
					<button type="submit">Change Password</button>					
				</td>											
			</tr>

		</table>
	</form>
</fieldset>

<?php 

require_once 'includes/footer.php'; 

?>
		