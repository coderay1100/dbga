<?php

$jid = $_GET['id'];

$name = array();
$gender = array();
$fmid = array();
$r1 = queryDB("SELECT * FROM dbga.student");
$r2 = queryDB("SELECT * FROM dbga.alumnus");
while ($line = fetchResult($r1)) {
	$fmid[$line['applicant_id']] = $line['id'];
}

while ($line = fetchResult($r2)) {
	$fmid[$line['applicant_id']] = $line['id'];
}

$result = queryDB("SELECT * FROM dbga.faculty_member");
while ($line = fetchResult($result)) {
	$name[$line['id']] = $line['fname'] . " " . $line['lname'];
	$gender[$line['id']] = $line['gender'];
}

$result = queryDB("SELECT * FROM dbga.applicant WHERE job_id=$jid");

$data = array();
while ($line = fetchResult($result)) {
	$arr = explode(" ", $name[$fmid[$line['id']]]);
	$extra = '';
	if ($line['status'] != "f") {
		$status = "Approved";
	} else {
		$status = "Pending";
		$extra = '<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>';
	}
	echo <<<EOS
<tr>
	<td>{$line['id']}</td>
	<td>{$name[$fmid[$line['id']]]}</td>
	<td>{$gender[$line['id']]}</td>
	<td>$status</td>
	<td><a href="viewcv.php?cv={$line['cv_id']}&fname={$arr[0]}&lname={$arr[1]}&id={$line['id']}" class="btn btn-primary">View CV</a></td>
	<td><a href="approve.php?id={$line['id']}&jid=$jid" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a></td>
	<td>$extra</td>
</tr>	
EOS;
}


?>