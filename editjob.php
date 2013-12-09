<?php

require_once "functions/dbconnect.php";

$con = connectDB();

$d = $_POST;

queryDB("UPDATE dbga.job SET title='{$d['title']}', industry='{$d['itype']}', address='{$d['address']}', city='{$d['city']}', province='{$d['province']}', country='{$d['country']}', description='{$d['desc']}' WHERE id={$_GET['id']}");


header("Location: owner.php");