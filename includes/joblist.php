<?php

session_start();

require_once "functions/dbconnect.php";

$con = connectDB();

$fid = $_SESSION['fid'];

$query = "SELECT * FROM job WHERE faculty_id=$fid";
$result = pg_query($query) or die("Query failed: " . pg_last_error());



?>