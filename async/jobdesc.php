<?php

require_once "../functions/dbconnect.php";

$con = connectDB();

$jid = $_GET['jid'];


$query = "SELECT * FROM dbga.job WHERE id=$jid";
$result = queryDB($query);

$job = fetchResult($result);

$query = "SELECT * FROM dbga.company WHERE owner_id={$job['owner_id']}";
$result = queryDB($query);
if (pg_num_rows($result) == 1) {
	$line = fetchResult($result);
	$job['contact'] = $line['email'];
	$job['employer'] = $line['name'];
} else {
	pg_free_result($result);
	$query = "SELECT id FROM dbga.lecturer WHERE owner_id={$job['owner_id']}";
	$result = queryDB($query);
	$mid = fetchResult($result)['id'];
	$query = "SELECT * FROM dbga.faculty_member WHERE id=$mid";
	$result = queryDB($query);
	$line = fetchResult($result);
	$job['contact'] = $line['email'];
	$job['employer'] = $line['fname'] . " " . $line['lname'];
}

echo <<<EOS
<dl class="text-center">
	<dt>Job Description</dt>
	<dd>{$job['description']}</dd>
	<dt>Employer</dt>
	<dd>{$job['employer']}</dd>
	<dt>Industry Type</dt>
	<dd>{$job['industry']}</dd>
	<dt>Address</dt>
	<dd>-</dd>
	<dt>City</dt>
	<dd>-</dd>
	<dt>Province</dt>
	<dd>-</dd>
	<dt>Country</dt>
	<dd>-</dd>
	<dt>Contact</dt>
	<dd><a href='{$job['contact']}'>{$job['contact']}</a></dd>
	<br>
	<button type="button" class="btn btn-danger middle">Apply</button>
</dl>
EOS;
?>