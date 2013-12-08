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
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1>
					Curriculum Vitae
				</h1>
				
			</div>
			
			<div class="page-header">
				<h1>
					<small>Personal Information</small>
				</h1>
			</div>
			
			<div class="row clearfix">
				<div class="col-md-9 column">
				<label for="companyname" class="col-sm-2 control-label"> Name: </label>
					<div class="col-sm-3">
						<label for="companyname" class="col-sm-2 control-label">  <?php echo $data['name']; ?></label>
					</div>
				</div>
				
				<div class="col-md-9 column">
				<label for="companyname" class="col-sm-2 control-label"> Applicant's ID: </label>
					<div class="col-sm-3">
						<label for="companyname" class="col-sm-2 control-label">  <?php echo $_GET['id']; ?></label>
					</div>
				</div>
			</div>
			
			<div class="page-header">
				<h1>
					<small>Job Experience</small>
				</h1>
			</div>
			<div class="row clearfix">
				<div class="col-md-9 column">						
					<form class="form-horizontal" role="form">
						<div class="form-group">
							 <label for="companyname" class="col-sm-2 control-label"> Company Name: </label>
							<div class="col-sm-3">
								<label for="companyname" class="col-sm-2 control-label">  <?php echo $data['company']; ?> </label>
							</div>
						</div>	
						<div class="form-group">
							 <label for="position" class="col-sm-2 control-label">Position:</label>
							<div class="col-sm-3">
								<div class="col-sm-3">
								<label for="companyname" class="col-sm-2 control-label"> <?php echo $data['position']; ?> </label>
							</div>
							</div>
						</div>
						<div class="form-group">
							 <label for="location" class="col-sm-2 control-label">Location:</label>
							<div class="col-sm-3">
								<div class="col-sm-3">
								<label for="companyname" class="col-sm-2 control-label"> <?php echo $data['location']; ?></label>
							</div>
							</div>
						</div>
					</form>
					<div class="row clearfix">
						<div class="col-md-6 column">
							<form role="form">
								<div class="form-group">
								<br>
							<p><label for="Startdate" type="date">Start Date (YYYY-MM-DD):</label><div class="col-sm-3"></p>		
								<label for="companyname" class="col-sm-2 control-label"><?php echo $data['start_date']; ?></label>
							</div>
								</div>
							</form>
						</div>
						<div class="col-md-6 column">
							<form role="form-horizontal">
								<div class="form-group">
								<br>
									 <label for="enddate" type="date">End Date (YYYY-MM-DD):</label>
									 <br><br>
									 <label for="companyname" class="col-sm-2 control-label">3000/12/12</label>
								</div>
							</form>
						</div>
						
				<div class="page-header">
				<br>
						<br>
				<h1>
					<small>Honor</small>
				</h1>
			</div>
			<div class="row clearfix">
				<div class="col-md-9 column">						
					<form class="form-horizontal" role="form">
						<div class="form-group">
							 <label for="award" class="col-sm-2 control-label"> Honor: </label>
							<div class="col-sm-7">
								<label for="companyname" class="col-sm-2 control-label">blablabla</label>
							</div>
						</div>	
					</form>
					
				</div>
				</div>
				<div class="page-header">
				<h1>
					<small>Award(s)</small>
				</h1>
			</div>
			
			<div class="row clearfix">
				<div class="col-md-9 column">						
					<p>
						List of all applicant's awards seperated by a comma (,) :
					</p>
					<div id="cid_4" class="form-input">
						
						<p><label for="companyname" class="col-sm-2 control-label">blablablablabla, blabla</label>
					</p>
					</div>					
				</div>
				
				</div>
				<br>
				<div class="page-header">
				<h1>
					<small>Education Background</small>
				</h1>
			</div>
			
			<div class="row clearfix">
						<div class="col-md-6 column">
							<form role="form">
								<div class="form-group">
									 <label>Field of Study:</label>
									 <br>
									 
									 <label for="companyname" class="col-sm-2 control-label">ComputerScience</label>
								</div>
								<br>
								<div class="form-group">
									 <label>GPA:</label>
									 <br>
									 
									 <label for="companyname" class="col-sm-2 control-label">5.0</label>
								</div>
							</form>
						</div>
						<div class="col-md-6 column">
							<form role="form">
								<div class="form-group">
									 <label>Starting Year:</label>
									 <br>
									 <label for="companyname" class="col-sm-2 control-label">3000/12/12</label>
								</div>
								<br>
								<div class="form-group">
									 <label>Ending Year:</label>
									 <br>
									 <label for="companyname" class="col-sm-2 control-label">3000/12/12</label>
								</div>
							</form>
						</div>
						
						<div class="col-md-9 column">
							<br>						
							<label>Activity</label>
							<p>
								List of all applicant's activities and organizational participation seperated by a comma (,) :
							</p>
							<div id="cid_4" class="form-input">
								<label for="companyname" class="col-sm-2 control-label">blablablabla,blablabla,blablabla</label>
							</div>					
						</div>
					<div class="col-md-9 column">
						<div class="row clearfix">					
							<form class="form-horizontal" role="form">
							<div class="form-group"><br>
								 <label for="degree" class="col-sm-3 control-label"> Degree: </label>
								<div class="col-sm-7">
									<label for="companyname" class="col-sm-2 control-label">Doctor</label>
								</div>
							</div>
							
							<form class="form-horizontal" role="form">
							<div class="form-group">
								 <label for="school" class="col-sm-3 control-label"> School: </label>
								<div class="col-sm-7">
								
									<label for="companyname" class="col-sm-2 control-label"><p>University of Indonesia</p></label>
								</div>
							</div>	
						</div>
					
					<br>
				<button type="button" class="btn btn-default"> <a href="viewapp.html"> <-- List of Applicants </a></button>
				
				</div>
				<div class="col-md-3 column">
				</div>
			</div>
		</div>
	</div>
</div>
	<body>
	
</html>

















