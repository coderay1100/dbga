<?php

require_once "functions/dbconnect.php";
require_once "functions/jobcat.php";

$con = connectDB();

$result = queryDB("SELECT * FROM dbga.job WHERE owner_id={$_SESSION['oid']}");

while ($job = fetchResult($result)) {
	$jobcategory = jobcat($job['id']);
	echo <<<EOT
<tr value="a">
<td>{$job['id']}</td>
<td>$jobcategory</td>
<td>{$job['title']}</td>
<td>GPA > {$job['requirement']}</td> 	
<td><button class="btn btn-sm btn-warning infobtn" type="button" value="{$job['id']}"><span class="glyphicon glyphicon-info-sign"></button></td>
<td><a href="deletejob.php?id={$job['id']}" class="btn btn-sm btn-danger deletebtn" type="button"><span class="glyphicon glyphicon-trash"></a></td>
</tr>	
EOT;
}

//echo "HELLO";

?>