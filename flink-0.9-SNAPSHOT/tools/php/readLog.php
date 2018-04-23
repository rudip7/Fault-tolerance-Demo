
<?php
	header('Access-Control-Allow-Origin: *'); 
    $user = get_current_user();
    $hostname = gethostname();
    $log = "../../log/flink-".$user."-jobmanager-".$hostname."-11.log";

	$myfile = fopen($log, "r") or die("Unable to open file! Please start a Flink cluster");
	echo "<table style=\"border: 0;  border-spacing: 20px 0px; border-collapse: separate; margin-left: -20px;\">";
	if($myfile){
		
		while (($line = fgets($myfile)) !== false) {
			$cells = explode("-", $line);
        	echo "<tr>";
        	echo "<td>";
        	echo $cells[0];
        	echo "   ";
        	echo "</td>";
        	echo "<td>";
        	echo "-";
        	echo $cells[1];
        	echo "</td>";
        	echo "</tr>";
    	}
    	echo "</table>";
    	fclose($myfile);
	}
	#echo fread($myfile,filesize("/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/flink-rudi-jobmanager-rudi-7-11-test.log"));
	

?>