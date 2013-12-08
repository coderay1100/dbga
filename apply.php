<?php

session_start();
require_once "functions/dbconnect.php";

$con = connectDB();

$jid = $_GET['id'];

$result = queryDB("SELECT cv_id FROM dbga.faculty_member WHERE id={$_SESSION['id']}");

$cv = fetchResult($result)['cv_id'];
if ($cv == "") {
	header("Location: student.php?cv");
	exit;
}

queryDB("INSERT INTO dbga.applicant VALUES (nextval('dbga.applicant_id_seq'), $cv, current_timestamp, '0', $jid)");

$role = $_SESSION['role'];
if ($role == 's')
	queryDB("UPDATE dbga.student SET applicant_id=currval('dbga.applicant_id_seq') WHERE id={$_SESSION['id']}");

header("Location: student.php?success");

?>