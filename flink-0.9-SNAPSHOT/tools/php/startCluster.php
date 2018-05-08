<?php
	header('Access-Control-Allow-Origin: *'); 
	$dir = dirname(__FILE__);
	$rel = $dir.'/../shellScripts/startCluster.sh';
	$abs = realpath($rel);
    exec($abs);


?>