<?php

require_once "functions/dbconnect.php";

$con = connectDB();

queryDB("UPDATE dbga.applicant SET status='t' WHERE id={$_GET['id']}");

header("Location: viewapp.php?id={$_GET['jid']}");