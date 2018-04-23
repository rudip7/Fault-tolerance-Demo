<?php
	header('Access-Control-Allow-Origin: *'); 
	echo $_GET["failure"];
	echo "<br/>";
	echo $_GET["NumberIterations"];
	echo "<br/>";
	echo $_GET["CheckpointInterval"];
	echo "<br/>";
	echo $_GET["FailedIteration"];
	echo "<br/>";
	echo "success";
	

?>