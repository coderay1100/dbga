<!DOCTYPE html>

<?php

session_start();
require_once "functions/authorization.php";

?>

<html>
	<head>
		<?php include "includes/head.php" ?>
	</head>
	<body>
		<?php include "includes/navbar2.php" ?>
		
		<div class="container">
		
			<div class="row">
				<div class="page-header">
					<h1>
						Got some jobs? <small>Post them here!</small>
					</h1>
				</div>
			</div>
			
			<form role="form" action="submitjob.php" method="post">
			
				<div class="row">
					<div class="col-md-3 col-md-offset-3">
						<!-- Title -->
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="title">Title</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" class="form-control" id="title" name="title" placeholder="Title"/>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<!-- Industry type -->
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="industry">Industry Type</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" class="form-control" id="industry" name="itype" placeholder="Industry Type"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				
				<!-- Radio -->
				<div class="form-group">
					<div class="row">
						<div class="col-md-3">
							<label for="intern">
								<input type="radio" id="intern" name="category" value="i" checked/> Internship
							</label>
						</div>
						<div class="col-md-3">
							<label for="research">
								<input type="radio" id="research" name="category" value="r" /> Research Project
							</label>
						</div>
						<div class="col-md-3">
							<label for="parttime">
								<input type="radio" id="parttime" name="category" value="p" /> Part-Time
							</label>
						</div>
						<div class="col-md-3">
							<label for="fulltime">
								<input type="radio" id="fulltime" name="category" value="f" /> Full-Time
							</label>
						</div>
					</div>
				</div>
				
				<!-- Special fields -->
				<div class="row">
				
					<!-- Internship -->
					<div class="col-md-3" id="int">
						<fieldset id="fi">
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="duration">Duration</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" id="duration" class="form-control" name="duration" placeholder="(Days)" />
									</div>
								</div>
							</div>
						</fieldset>
					</div>
					
					<!-- Research Project -->
					<div class="col-md-3">
						<fieldset id="fr" disabled>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="leader">Project Leader</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" id="leader" class="form-control" name="leader" placeholder="Project Leader"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="goal">Goals</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" id="goal" class="form-control" name="goal" placeholder="Goals"/>
									</div>
								</div>
							</div>
						</fieldset>
					</div>	
					
					<!-- Part-Time -->
					<div class="col-md-3">
						<fieldset id="fp" disabled>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="sal">Salary-per-Hour</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" id="sal" class="form-control" name="sal" placeholder="Salary-per-Hour"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="hpw">Hours-per-Week</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" id="hpw" class="form-control" name="hpw" placeholder="Hours-per-Week" />
									</div>
								</div>
							</div>
						</fieldset>
					</div>
					
					<!-- Full-Time -->
					<div class="col-md-3">
						<fieldset id="ff" disabled>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="workhour">Working Hours</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="text" id="workhour" class="form-control" name="workhour" placeholder="Working Hours"/>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				
				<hr>
				
				<div class="row">
					<div class="col-md-3 col-md-offset-3">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="address">Address</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" id="address" name="address" placeholder="Address" class="form-control" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="city">City</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" id="city" name="city" placeholder="City" class="form-control" />
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3 col-md-offset-3">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="province">Province</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" id="province" name="province" placeholder="Province" class="form-control" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="country">Country</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="text" id="country" name="country" placeholder="Country" class="form-control" />
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<textarea class="form-control" placeholder="Description" name="desc"></textarea>
					</div>
				</div>
				
				<br>
				
				<div class="row clearfix">
					<div class="col-md-6 col-md-offset-3">
						<button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
					</div>
				</div>
				
				
				
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
		<script>
		
		$("input[type='radio']").change(function() {
			$("fieldset").attr("disabled", true);
			var val = $(this).val();
			$("#f" + val).removeAttr("disabled");
		});
		
		</script>
	</body>
</html>