<?php

session_start();

require_once "functions/dbconnect.php";

$con = connectDB();

$qs = array();
$qs[] = "SELECT * FROM dbga.full_time_job";
$qs[] = "SELECT * FROM dbga.part_time_job";
$qs[] = "SELECT * FROM dbga.internship";
$qs[] = "SELECT * FROM dbga.research_project";
$result = array();
$jobcategory = array();
$i = 0;
foreach ($qs as $q) {
	$result[] = pg_query($q) or die("Query failed: " . pg_last_error());
	while ($line = pg_fetch_array($result[$i], null, PGSQL_ASSOC)) {
		switch ($i) {
			case 0:
				$jobcategory[$line['job_id']] = 'Full Time';
				break;
			case 1:
				$jobcategory[$line['job_id']] = 'Part Time';
				break;
			case 2:
				$jobcategory[$line['job_id']] = 'Internship';
				break;
			case 3:
				$jobcategory[$line['job_id']] = 'Research Project';
				break;
		}
	}
	$i++;
}

//print_r($jobcategory);

$fid = $_SESSION['fid'];
$query = "SELECT * FROM dbga.job WHERE faculty_id=$fid";
$result = pg_query($query) or die("Query failed: " . pg_last_error());

$joblist = array();
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	$job = array();
	$job['id'] = $line['id'];
	$job['title'] = $line['title'];
	$job['owner'] = $line['owner_id'];
	$job['cat'] = $jobcategory[$line['id']];
	$job['req'] = $line['requirement'];
	$joblist[] = $job;
}

//print_r($joblist);


foreach ($joblist as $job) {
	
	$class = "success";
	$avb = "Available";
	if ($_SESSION['role'] == 's') {
		if ($job['cat'] == "Research Project" || $job['cat'] == "Full Time") {
			$class = "danger";
			$avb = "Not Available";
		}
	}

	echo <<<EOT
<tr class="$class">
<td>{$job['id']}</td>
<td>{$job['cat']}</td>
<td>{$job['title']}</td>
<td>GPA > {$job['req']}</td>
<td>$avb</td>
<td><a href="#" class="btn btn-sm btn-default" type="button">Details</a></td>
</tr>	
EOT;
}


?>