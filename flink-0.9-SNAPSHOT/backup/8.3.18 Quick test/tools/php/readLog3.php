
<?php
	header('Access-Control-Allow-Origin: *'); 
	$myfile = fopen("/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/flink-rudi-jobmanager-rudi-7-11-test.log", "r") or die("Unable to open file!");

	if($myfile){
		while (($line = fgets($myfile)) !== false) {
        	echo $line;
        	echo "<br/>";
    	}
    	fclose($myfile);
	}
	#echo fread($myfile,filesize("/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/flink-rudi-jobmanager-rudi-7-11-test.log"));
	

?>