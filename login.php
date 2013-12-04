<?php

$con = pg_connect("host=localhost user=postgres password=password dbname=postgres")
	or die("Could not connect: " . pg_last_error());
	
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM dbga.faculty_member WHERE email='$email' AND password='$password';";
$result = pg_query($query) or die("Query failed: " . pg_last_error());

$count = pg_num_rows($result);

if ($count == 1) {
	echo "Authentication success. Redirecting...";
	$result = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['fname'] = $result['fname'];
	$_SESSION['lname'] = $result['lname'];
	$_SESSION['id'] = $result['id'];
	
	checkuser($result['id']);
	
	//header("Location: index.php");
	
} else {
	
	$query = "SELECT * FROM dbga.company WHERE email='$email' AND password='$password';";
	$result = pg_query($query) or die("Query failed: " . pg_last_error());
	
	$count = pg_num_rows($result);
	
	if ($count == 1) {
		echo "Authentication success. Redirecting...";
		$result = pg_fetch_array($result, null, PGSQL_ASSOC);
		
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['fname'] = $result['name'];
		$_SESSION['lname'] = "";
		$_SESSION['id'] = $result['id'];
		
		header("Location: index.php");
		
	} else {
		echo "Authentication failed, email or password wrong!";
		header("Location: index.php?false");		
	}
	
}

function checkuser($id) {
	$email = $_SESSION['email'];
	$role = getRole($email);
	$_SESSION['role'] = $role;
	
	//$query = "SELECT * FROM dbga.member_of WHERE member_id=$id;";
	//$result = pg_query($query) or die("Query failed: " . pg_last_error());
	//$_SESSION['faculty_id'] = pg_fetch_result($result, 0, "faculty_id");
}

function getRole($email) {
	$emails = array();
	$role = facultyLogIn();
	$_SESSION['faculty_id'] = $faculty_id;
	return $role;
}

function facultyLogIn() {
	$ids = array();
	$q1 = "SELECT id FROM dbga.student;";
	$q2 = "SELECT id FROM dbga.alumnus;";
	$q3 = "SELECT id FROM dbga.lecturer;";
	$r1 = pg_query($q1);
	$r2 = pg_query($q2);
	$r3 = pg_query($q3);
	while ($line = pg_fetch_array($r1, null, PGSQL_ASSOC)) {
		$ids[$line['id']] = 's';
	}
	while ($line = pg_fetch_array($r2, null, PGSQL_ASSOC)) {
		$ids[$line['id']] = 'a';
	}
	while ($line = pg_fetch_array($r3, null, PGSQL_ASSOC)) {
		$ids[$line['id']] = 'l';
	}
	if (array_key_exists($_SESSION['id'], $ids)) {
		$role = $ids[$_SESSION['id']];
	} else {
		echo "Account error. Please contact the administrator";
		exit;
	}
	return $role;
}





























