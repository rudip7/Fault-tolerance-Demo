
<?php
	header('Access-Control-Allow-Origin: *'); 
	$myfile = fopen("../../log/flink-rudi-jobmanager-rudi-7-11.log", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("../../log/flink-rudi-jobmanager-rudi-7-11.log"));
	fclose($myfile);

?>