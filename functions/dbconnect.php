<?php

function connectDB() {
	$con = pg_connect("host=localhost user=postgres password=password dbname=postgres")
		or die("Could not connect: " . pg_last_error());

	return $con;
}

?>