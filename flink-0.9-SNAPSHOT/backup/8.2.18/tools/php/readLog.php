
<?php
	header('Access-Control-Allow-Origin: *'); 
	$myfile = fopen("/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/log/flink-rudi-jobmanager-rudi-7-11.log", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/log/flink-rudi-jobmanager-rudi-7-11.log"));
	fclose($myfile);

?>