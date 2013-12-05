<!DOCTYPE html>

<?php

session_start();

require_once "functions/authorization.php";

?>

<html>
	<head>
		<?php include "includes/head.php"; ?>
	</head>
	
	<body>
		
		<?php include "includes/navbar.php"; ?>
		
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
					
					<!-- Page header -->
					<div class="page-header">
						<h1>
							<?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?> 
						</h1>
					</div> <!--/.page-header-->
					
					<!-- Content -->
					<div class="row clearfix">
					
						<!-- Profile picture -->
						<div class="col-md-2 column">
							<img alt="140x140" src="http://lorempixel.com/140/140/">
						</div> <!--/profpict-->
						
						<!-- Personal info -->
						<div class="col-md-5 column">
							<table class="table">
								<?php include "includes/profile.php"; ?>
							</table>
						</div> <!--/personal-info-->
						
					</div> <!--/content-->
					
				</div>
			</div>
		</div> <!--/.container-->
		
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>