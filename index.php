<!DOCTYPE html>

<?php

session_start();

function loggedin() {
	return isset($_SESSION['email']);
}

function loggedout() {
	return isset($_GET['logout']);
}

function falselogin() {
	return isset($_GET['false']);
}

$message = "Welcome! Please log in.";
if (loggedin()) {
	$message = "You are now logged in as " . $_SESSION['fname'] . " " . $_SESSION['lname'] . ".";
}

if (loggedout()) {
	$message = "You have been logged out.";
}

if (falselogin()) {
	$message = "You have entered false credentials.";
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>TITLE</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		body {
			background-color: #fffff0;
		}
		
		#header {
			height: 240px;
		}
		</style>
	</head>
	<body>
		<h1>APP NAME</h1>
		<div><?php echo $message; ?></div>
		<?php 
		
		if (!loggedin())
			include "includes/loginform.php";
		else
			echo "<a href='logout.php'>Log out</a>";
		?>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>