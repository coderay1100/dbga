<?php

require_once "functions/dbconnect.php";

$con = connectDB();

$cv = $_POST;

queryDB("UPDATE dbga.cv SET company='{$cv['cname']}', position='{$cv['position']}', start_date='{$cv['sdate']}', end_date='{$cv['edate']}', honor='{$cv['honor']}', study_field='{$cv['fieldstudy']}', gpa={$cv['gpa']} , start_year={$cv['syear']} , end_year={$cv['eyear']} , degree='{$cv['degree']}', school='{$cv['school']}' WHERE id={$_GET['id']}");

function trim_value (&$value) {
	$value = trim($value);
}

$act = explode(',', $cv['activity']);
$awd = explode(',', $cv['award']);

array_walk($act, 'trim_value');
array_walk($awd, 'trim_value');

queryDB("UPDATE dbga.award SET award='{$awd}' WHERE cv_id={$_GET['id']}");

queryDB("UPDATE dbga.activity SET activity='{$act}' WHERE cv_id={$_GET['id']}");

header("Location: student.php?saved");