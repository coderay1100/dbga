<?php

$jid = $_GET['id'];

$name = array();
$gender = array();

$result = queryDB("SELECT * FROM dbga.faculty_member");
while ($line = fetchResult($result)) {
	$name[$line['id']] = $line['fname'] . " " . $line['lname'];
	$gender[$line['id']] = $line['gender'];
}

$result = queryDB("SELECT * FROM dbga.applicant WHERE job_id=$jid");

$data = array();
while ($line = fetchResult($result)) {
	$arr = explode(" ", $name[$line['id']]);
	if ($line['status']) {
		$status = "Approved";
	} else {
		$status = "Pending";
	}
	echo <<<EOS
<tr>
	<td>{$line['id']}</td>
	<td>{$name[$line['id']]}</td>
	<td>{$gender[$line['id']]}</td>
	<td>$status</td>
	<td><a href="viewcv.php?cv={$line['cv_id']}&fname={$arr[0]}&lname={$arr[1]}&id={$line['id']}" class="btn btn-primary">View CV</a></td>
	<td><a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a></td>
	<td><a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>	
EOS;
}


?>