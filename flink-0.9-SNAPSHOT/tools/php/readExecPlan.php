
<?php
	header('Access-Control-Allow-Origin: *'); 

	$myfile = fopen("../executionPlan.txt", "r") or die("Unable to open file! Please start a Flink cluster");
	if($myfile){
		for ($i = 0; $i <= 4; $i++) {
            $line = fgets($myfile);
        }
		while (($line = fgets($myfile)) !== false) {
			if($line[0] != '-'){
               echo $line; 
            }
    	}
    	fclose($myfile);
	}
	#echo fread($myfile,filesize("/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/flink-rudi-jobmanager-rudi-7-11-test.log"));
	

?>