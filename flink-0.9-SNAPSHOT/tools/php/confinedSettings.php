<?php
	header('Access-Control-Allow-Origin: *'); 
	
	$result = exec('../shellScripts/confinedSettings.sh');
	echo "$result";
    
?>