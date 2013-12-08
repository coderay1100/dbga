<?php

session_start();
require_once "functions/dbconnect.php";

$con = connectDB();

$p = $_POST;


$query = "
INSERT INTO dbga.cv VALUES ('{$p['cname']}', '{$p['position']}', '{$p['location']}', '{$p['sdate']}', '{$p['edate']}', '{$p['honor']}', '{$p['fieldstudy']}', {$p['gpa']}, {$p['syear']}, {$p['eyear']}, '{$p['degree']}', '{$p['school']}', nextval('dbga.cv_id_seq'));
";


queryDB($query);

function trim_value (&$value) {
	$value = trim($value);
}

$act = explode(',', $p['activity']);
$awd = explode(',', $p['award']);

array_walk($act, 'trim_value');
array_walk($awd, 'trim_value');

foreach ($act as $val) {
	queryDB("INSERT INTO dbga.activity VALUES (currval('dbga.cv_id_seq'), '$val')");
}
foreach ($awd as $val) {
	queryDB("INSERT INTO dbga.award VALUES (currval('dbga.cv_id_seq'), '$val')");
}

queryDB("UPDATE dbga.faculty_member SET cv_id=currval('dbga.cv_id_seq') WHERE id={$_SESSION['id']}");

header("Location: student.php?saved");

?>