<?php

session_start();

function loggedin() {
	return isset($_SESSION['email']);
}

function loggedout() {
	return isset($_GET['logout']);
}

function falselogin() {
	return isset($_GET['false']);
}


?>