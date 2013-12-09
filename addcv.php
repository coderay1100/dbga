<!DOCTYPE html>

<?php

session_start();
require_once "functions/authorization.php";
require_once "functions/dbconnect.php";

$con = connectDB();

$result = queryDB("SELECT cv_id FROM dbga.faculty_member WHERE id={$_SESSION['id']}");
$cvid = fetchResult($result)['cv_id'];
$link = "submitcv.php";
$data = array();
if ($cvid > 0) {
	$link = "editcv.php?id=$cvid";
	$result = queryDB("SELECT * FROM dbga.cv WHERE id=$cvid");
	$data = fetchResult($result);
	$result = queryDB("SELECT * FROM dbga.award WHERE cv_id=$cvid");
	$awd = array();
	while ($line = fetchResult($result)) {
		$awd[] = $line['award'];
	}
	$awd = implode(", ", $awd);
	$result = queryDB("SELECT * FROM dbga.activity WHERE cv_id=$cvid");
	$act = array();
	while ($line = fetchResult($result)) {
		$act[] = $line['activity'];
	}
	$act = implode(", ", $act);
}


?>

<html>
	<head>
		<?php include "includes/head.php" ?>
	</head>

	<body>
		<?php include "includes/navbar.php" ?>
		
		<div class="container">
		
			<div class="row clearfix">
				<div class="col-md-12 column">
					<div class="page-header">
						<h1>Curriculum Vitae</h1>
						<p> Please fill in all the information required in the spaces provided.</p>
					</div>
					
					
					<form role="form" action="<?php echo $link; ?>" method="post">
					
					<div class="page-header">
						<h1><small>Job Experience</small></h1>
					</div>
					
					<div class="row clearfix">
					
						<div class="col-md-6 column">
							<div class="form-group">
								 <label>Company Name</label><input class="form-control" id="compname" name="cname" placeholder="Company Name" value="<?php echo $data['company']; ?>"/>
							</div>
							<div class="form-group">
								 <label>Start Date</label><input class="form-control" id="startdate" name="sdate" placeholder="YYYY-MM-DD" value="<?php echo $data['start_date']; ?>"/>
							</div>
						</div>
						
						<div class="col-md-6 column">
								<div class="form-group">
									 <label>Position</label><input class="form-control" id="position" name="position" placeholder="Position" value="<?php echo $data['position']; ?>"/>
								</div>
								<div class="form-group">
									 <label>End Date</label><input class="form-control" id="enddate" name="edate" placeholder="YYYY-MM-DD" value="<?php echo $data['end_date']; ?>"/>
								</div>
						</div>
								
						<div class="page-header">
							<h1><small>Honor</small></h1>
						</div>
						
					<div class="row clearfix">
						
						<div class="col-md-9 column">
							<div class="form-group">
								 <label for="award" class="col-sm-2 control-label"> Honor </label>
								<div class="col-sm-7"><input  class="form-control" id="honor" name="honor" placeholder="Honor" value="<?php echo $data['honor']; ?>"/></div>
							</div>
						</div>
					</div>
					
					<div class="page-header">
						<h1><small>Award(s)</small></h1>
					</div>
					
					<div class="row clearfix">
						<div class="col-md-9 column">						
							<p>List all your awards seperated by a comma (,)</p>
							<div id="awardarea" class="form-input">
								<textarea id="activity" class="form-control col-sm-10"  cols="100" rows="5" name="award" placeholder="Award"><?php echo $awd; ?></textarea>
							</div>					
						</div>
					</div><br>
										
					<div class="page-header">
						<h1><small>Education Background</small></h1>
					</div>
					
					<div class="row clearfix">
						<div class="col-md-6 column">						
							<div class="form-group">
								 <label>Field of Study</label><input class="form-control" id="fstudy" name="fieldstudy" placeholder="Field Study" value="<?php echo $data['study_field']; ?>"/>
							</div>
							<div class="form-group">
								 <label>GPA</label><input class="form-control" id="gpa" name="gpa" placeholder="GPA" value="<?php echo $data['gpa']; ?>"/>
							</div>
						</div>
						<div class="col-md-6 column">
							<div class="form-group">
								 <label>Starting Year</label><input class="form-control" id="startyear" name="syear" placeholder="Start Year" value="<?php echo $data['start_year']; ?>"/>
							</div>
							<div class="form-group">
								 <label>Ending Year</label><input class="form-control" id="endyear" name="eyear" placeholder="End Year" value="<?php echo $data['end_year']; ?>"/>
							</div>
						</div>
								
						<div class="col-md-9 column"><br>
							<label>Activity</label>
							<p>List all your activities and organizational participation separated by a comma (,)</p>
							<div id="activityarea" class="form-input">
								<textarea id="acitivity" class="form-control col-sm-10"  cols="100" rows="5" name="activity" placeholder="Activity" ><?php echo $act ?></textarea>
							</div>					
						</div>
						
						<div class="col-md-9 column">
							<div class="row clearfix">			
								<div class="form-group"><br>
									 <label for="degree" class="col-sm-3 control-label"> Degree </label>
									<div class="col-sm-7">
										<input  class="form-control" id="degree" name="degree" placeholder="Degree" value="<?php echo $data['degree']; ?>"/>
									</div>
								</div>
								
								<br>
								<br>
				
								<div class="form-group">
									 <label for="school" class="col-sm-3 control-label"> School </label>
									<div class="col-sm-7">
										<input  class="form-control" id="school" name="school" placeholder="School" value="<?php echo $data['school']; ?>"/>
									</div>
								</div>	
							</div><br>	
							<button type="submit" class="btn btn-primary btn-block btn-lg">Save</button>
							<button type="reset" class="btn btn-primary btn-block btn-lg">Reset</button>
						</div>
						<div class="col-md-3 column">
						</div>
					</div>
				</div>
			</div>
		</div>
			<br>
			<br>
			
		</form>
			
			<div class="row clearfix">
				<div class="col-md-12 column">
					<blockquote>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
						</p> <small>Someone famous <cite>Source Title</cite></small>
					</blockquote>
				</div>
			</div>
		</div>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/ajax.js"></script>
		
	</body>
</html>
