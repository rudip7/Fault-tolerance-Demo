<?php
	header('Access-Control-Allow-Origin: *'); 
	$result = exec('../shellScripts/replicaSettings.sh');
    echo "$result";
?>