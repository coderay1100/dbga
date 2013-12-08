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
		<?php include "includes/navbar2.php"; ?>
		
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
					
					<!--Page header-->
					<div class="page-header">
						<h1>We're the boss here! <small>Let's recruit people!</small></h1>
					</div> <!--/page-header-->
					
					<!-- Content -->
					<div class="row clearfix">
					
						<!-- List of my offerings -->
						<div class="col-md-9 column">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Job ID</th>
										<th>Category</th>
										<th>Title</th>
										<th>Requirement</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php include "includes/offers.php"; ?>
								</tbody>
							</table>
						<a href="addjob.php" class="btn btn-link"><span class='glyphicon glyphicon-plus'></span> Add a job</a>
						</div> <!--/column1-->
						
						<!-- Details -->
						<div class="col-md-3 column" id="detail"></div>
						
					</div> <!--/content-->
					
					
				</div>
			</div>
		</div> <!--/.container-->
		
		<script src="js/bootstrap.min.js"></script>
		<script src="js/ajax.js"></script>
	</body>
</html>