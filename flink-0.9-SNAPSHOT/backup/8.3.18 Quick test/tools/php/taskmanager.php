
<?php
	header('Access-Control-Allow-Origin: *'); 
	$result = exec('jps | grep TaskManager | tr \'\\n\' \' \'');
	echo "$result";
	

?>