<!DOCTYPE html>

<?php

session_start();
require_once "functions/dbconnect.php";
$con = connectDB();

?>

<html>
	<head>
		<?php include "includes/head.php"; ?>
	</head>
	
	<body>
		<?php include "includes/navbar2.php"; ?>
	
		<div class="container">
			<div class="row">
			
				<!-- Page header -->
				<div class="page-header">
					<h1>
						List of Applicants <small></small>
					</h1>
				</div> <!--/page-header-->
				
				<!-- Content -->
				<div class="col-md-8">
					<table class="table">
						<thead>
							<tr>
								<th>Applicant's ID</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Status</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php include "includes/applist.php"; ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div> <!--/.container-->
	
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>