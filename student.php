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
				
					<div class="page-header">
						<h1>Hey, <?php echo $_SESSION['fname']; ?>! <small>Ready for some jobs?</small></h1>
					</div>
					
					<div class="row clearfix">
					
						<!-- Jobs which have been applied -->
						<div class="col-md-2 column">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">My Jobs</h3>
								</div>
								<div class="panel-body">Job 1</div>
								<div class="panel-body">Job 2</div>
								<div class="panel-body">Job n</div>
								<div class="panel-footer"></div>
							</div>
						</div> <!--./column1-->
						
						<!-- List of jobs -->
						<div class="col-md-7 column">
							<table class="table">
								<thead>
									<tr>
										<th>Job ID</th>
										<th>Category</th>
										<th>Title</th>
										<th>Requirement</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<?php include "includes/joblist.php"; ?>
							</table>
						</div>
						
					</div> <!--/.sub-row1-->
					
				</div> <!--/.column1-->
			</div> <!--/.row1 -->
			
		</div> <!--/.container-->
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>