<?php 

require_once 'includes/header.php'; 

$user_data = get_user_data();

?>			

<header>
	<h1>Hello , <?php echo $user_data['username']; ?></h1>
</header>


	<table border="1" width="100%">
		<tr>
			<th width="20%" height="50px">First Name</th>
			<td><p><center><?php echo $user_data['fname']; ?></center></p></td>
		</tr>

		<tr>
			<th height="50px">Last Name</th>
			<td><p><center><?php echo $user_data['lname']; ?></center></p></td>
		</tr>

		<tr>
			<th height="50px">Email</th>
			<td><p><center><?php echo $user_data['email'] ?></center></p></td>
		</tr>
	</table>


<?php require_once 'includes/footer.php'; ?>
		