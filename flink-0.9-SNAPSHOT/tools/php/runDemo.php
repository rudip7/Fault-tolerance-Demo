<?php
	header('Access-Control-Allow-Origin: *'); 
	$dir = dirname(__FILE__);
	$rel = $dir.'/../shellScripts/runDemo.sh';
	$abs = realpath($rel);
    exec($abs);

?>