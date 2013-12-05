<?php

require_once "functions/dbconnect.php";

$data = array();

$con = connectDB();

$query = "SELECT * FROM dbga.faculty_member WHERE id={$_SESSION['id']}";
$result = queryDB($query);
$data = fetchResult($result);

$data['gender'] = ($data['gender'] == 'm') ? "Male" : "Female";

$result = queryDB("SELECT name FROM dbga.faculty WHERE id={$data['faculty_id']}");
$faculty = fetchResult($result);

$role = $_SESSION['role'];
if ($role == 's') {
	$query = "SELECT * FROM dbga.student WHERE id={$data['id']}";
} else {
	$query = "SELECT * FROM dbga.alumnus WHERE id={$data['id']}";
}
$result = queryDB($query);
$info = fetchResult($result);
if ($role == 's') {
	$info['grad_year'] = '-';
}

echo <<<EOS
<tr>
	<th>ID</th>
	<td>{$data['id']}</td>
</tr>
<tr>
	<th>First Name</th>
	<td>{$data['fname']}</td>
</tr>
<tr>
	<th>Last Name</th>
	<td>{$data['lname']}</td>
</tr>
<tr>
	<th>Email</th>
	<td>{$data['email']}</td>
</tr>
<tr>
	<th>Gender</th>
	<td>{$data['gender']}</td>
</tr>
<tr>
	<th>Faculty</th>
	<td>{$faculty['name']}</td>
</tr>
<tr>
	<th>Enrollment Year</th>
	<td>{$info['enroll_year']}</td>
</tr>
<tr>
	<th>Graduation Year</th>
	<td>{$info['grad_year']}</td>
</tr>
<tr>
	<th></th>
	<th></th>
	<td></td>
</tr>
EOS;

?>