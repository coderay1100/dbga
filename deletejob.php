<?php

require_once "functions/dbconnect.php";

$con = connectDB();

queryDB("DELETE FROM dbga.job WHERE id={$_GET['id']}");

header("Location: owner.php");