<?php

function jobcat($jid) {
	$queries = array();
	$queries[] = "SELECT * FROM dbga.full_time_job";
	$queries[] = "SELECT * FROM dbga.part_time_job";
	$queries[] = "SELECT * FROM dbga.internship";
	$queries[] = "SELECT * FROM dbga.research_project";
	$result = array();
	$jobcategory = array();
	$i = 0;
	foreach ($queries as $q) {
		$result[] = queryDB($q);
		while ($line = fetchResult($result[$i])) {
			switch ($i) {
				case 0:
					$jobcategory[$line['job_id']] = 'Full Time';
					break;
				case 1:
					$jobcategory[$line['job_id']] = 'Part Time';
					break;
				case 2:
					$jobcategory[$line['job_id']] = 'Internship';
					break;
				case 3:
					$jobcategory[$line['job_id']] = 'Research Project';
					break;
			}
		}
		$i++;
	}
	
	return $jobcategory[$jid];
}

?>