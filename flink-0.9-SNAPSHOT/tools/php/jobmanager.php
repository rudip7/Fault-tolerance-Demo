
<?php
	header('Access-Control-Allow-Origin: *'); 
	$result = exec('jps | grep JobManager | tr \'\\n\' \' \'');
	echo "$result";
	

?>