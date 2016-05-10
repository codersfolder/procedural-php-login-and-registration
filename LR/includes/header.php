<?php 

require_once 'application/init.php';
require_once 'includes/header.php';


if(logged_in() === false) {
	redirect('index.php');
}

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>

<div class="container">
	<header class="pageheader">Login & Registration</header>
		
	<!-- /.section.content -->
	<section class="content">
		<nav>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="update_profile.php">Update Profile</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>		
		</nav>
		
		<!-- content -->
		<section>



