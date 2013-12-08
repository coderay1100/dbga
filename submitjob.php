<?php

session_start();

require_once "functions/dbconnect.php";

$job = array();

$job = $_POST;

$con = connectDB();

$query = "INSERT INTO dbga.job VALUES (nextval('dbga.job_id_seq'), '{$job['title']}', {$_SESSION['oid']}, {$_SESSION['fid']}, 3.3, '{$job['desc']}', '{$job['itype']}', '{$job['address']}', '{$job['city']}', '{$job['province']}', '{$job['country']}')";

$result = queryDB($query);

switch ($job['category']) {
	case 'i':
		queryDB("INSERT INTO dbga.internship VALUES (currval('dbga.job_id_seq'), {$job['duration']})");
		break;
	case 'r':
		queryDB("INSERT INTO dbga.research_project VALUES (currval('dbga.job_id_seq'), '{$job['leader']}', '{$job['goal']}')");
		break;
	case 'p':
		queryDB("INSERT INTO dbga.internship VALUES (currval('dbga.job_id_seq'), {$job['sal']}, {$job['hpw']})");
		break;
	case 'f':
		queryDB("INSERT INTO dbga.internship VALUES (currval('dbga.job_id_seq'), {$job['workhour']})");
		break;
}

header('Location: owner.php');


print_r($_POST);