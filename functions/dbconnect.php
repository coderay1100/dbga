<?php

function connectDB() {
	return pg_connect("host=localhost user=postgres password=password dbname=postgres")
		or die("Could not connect: " . pg_last_error());
}

function queryDB($query) {
	$result = pg_query($query) or die("Query failed: " . pg_last_error());
	
	return $result;
}

function fetchResult($result) {
	$line = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	return $line;
}

?>