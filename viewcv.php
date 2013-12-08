<!DOCTYPE html>

<?php

session_start();
require_once "functions/authorization.php";
require_once "functions/dbconnect.php";

$con = connectDB();


$result = queryDB("SELECT * FROM dbga.cv WHERE id={$_GET['cv']}");
$data = fetchResult($result);
$result = queryDB("SELECT * FROM dbga.award WHERE cv_id={$_GET['cv']}");
$awd = array();
while ($line = fetchResult($result)) {
	$awd[] = $line['award'];
}
$awd = implode(", ", $awd);
$result = queryDB("SELECT * FROM dbga.activity WHERE cv_id={$_GET['cv']}");
$act = array();
while ($line = fetchResult($result)) {
	$act[] = $line['activity'];
}
$act = implode(", ", $act);
$data['name'] = $_GET['fname'] . " " . $_GET['lname'];

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
					<h1>Curriculum Vitae</h1>
				</div><!--/page-header-->
			</div>
			
			<div class="row">
				<!-- Page header -->
				<div class="page-header">
					<h1><small>Personal Information</small></h1>
				</div><!--/page-header-->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Name:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['name']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Applicant ID:</strong>
				</div>
				<div class="col-md-2">
					#<?php echo $_GET['id']; ?>
				</div>
			</div>
			
			<div class="row">
				<!-- Page header -->
				<div class="page-header">
					<h1><small>Job Experience</small></h1>
				</div><!--/page-header-->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Company Name:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['company']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Position:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['position']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Location:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['location']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Start Date:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['start_date']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>End Date:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['end_date']; ?>
				</div>
			</div>
			
			<div class="row">
				<!-- Page header -->
				<div class="page-header">
					<h1><small>Honor</small></h1>
				</div><!--/page-header-->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Honor:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['honor']; ?>
				</div>
			</div>
			
			<div class="row">
				<!-- Page header -->
				<div class="page-header">
					<h1><small>Award</small></h1>
				</div><!--/page-header-->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Award:</strong>
				</div>
				<div class="col-md-10">
					<?php echo $awd; ?>
				</div>
			</div>
			
			<div class="row">
				<!-- Page header -->
				<div class="page-header">
					<h1><small>Education Background</small></h1>
				</div><!--/page-header-->
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Field of Study:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['study_field']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Starting Year:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['start_year']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Ending Year:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['end_year']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>GPA:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['gpa']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Activity:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $act; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>Degree:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['degree']; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<strong>School:</strong>
				</div>
				<div class="col-md-2">
					<?php echo $data['school']; ?>
				</div>
			</div>
			
		</div> <!--/.container-->
		
		<script src="js/bootstrap.min.js"></script>
	<body>
	
</html>

















