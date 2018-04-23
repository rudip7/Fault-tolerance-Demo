<?php
	header('Access-Control-Allow-Origin: *'); 
	$dir = dirname(__FILE__);
	$rel = $dir.'/../shellScripts/stopCluster.sh';
	$abs = realpath($rel);
	//echo $abs;
	//$abs = realpath($rel);
	//exec('/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/shellScripts/runDemo.sh');
    exec($abs);

?>