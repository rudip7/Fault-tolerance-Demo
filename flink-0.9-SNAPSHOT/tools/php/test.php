<?php
	header('Access-Control-Allow-Origin: *'); 
	$user = get_current_user();
	$hostname = gethostname();
	$log = "../../log/flink-".$user."-jobmanager-".$hostname."-11.log";
	echo $log;
	

?>