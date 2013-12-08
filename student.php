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
						
						<!-- List of jobs -->
						<div class="col-md-9 column">
							<table class="table table-hover">
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
								<tbody>
									<?php include "includes/joblist.php"; ?>
								</tbody>
							</table>
						</div> <!--/.column1-->
						
						<!-- Details box -->
						<div class="col-md-3 column" id="detail"></div>
						
					</div> <!--/.sub-row1-->
					
				</div> <!--/.column1-->
			</div> <!--/.row1 -->
			
			<div class="row clearfix">
				<div class="col-md-9 column">
					<blockquote>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
						</p> <small>Someone famous <cite>Source Title</cite></small>
					</blockquote>
				</div>
			</div>
			
		</div> <!--/.container-->
		
		<script src="js/bootstrap.min.js"></script>
		<script>
		<?php
		if (isset($_GET['cv'])) {
			echo <<<EOS
alert("Please complete your CV!");
EOS;
		}
		
		if (isset($_GET['success'])) {
			echo <<<EOS
$(".infobtn").attr("disabled", true);	
EOS;
		}
		
		if (isset($_GET['saved'])) {
			echo <<<EOS
alert("Your CV has been saved");	
EOS;
		}
		?>
		</script>
		<script src="js/ajax.js"></script>
	</body>
</html>