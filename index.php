<!DOCTYPE html>

<?php

session_start();

require_once "functions/authorization.php";

$message = "";
if (loggedin()) {
	$message = "You are now logged in as " . $_SESSION['fname'] . " " . $_SESSION['lname'] . ".";
}

if (loggedout()) {
	$message = "You have been logged out.";
}

if (falselogin()) {
	$message = "Umm.. Sorry. We can't log you in..";
}

?>

<html>
	<head>
		<?php include "includes/head.php"; ?>
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
		<div class="container" id="header">
		
		</div>
		
			<?php 
			
			if (!loggedin())
				include "includes/loginform.php";
			else {
				echo "<a href='logout.php'>Log out</a>";
			}
			?>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>