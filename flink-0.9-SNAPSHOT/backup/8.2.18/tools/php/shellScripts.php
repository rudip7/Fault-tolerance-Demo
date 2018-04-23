<?php

$validFunctions = array("pageRank","anotherF","test");

$functName = $_REQUEST['f'];
if(in_array($functName,$validFunctions))
{
    $$functName();
}else{
    echo "You don't have permission to call that function so back off!";
    exit();
}

function pageRank()
{
	exec('/home/rudi/Fault-tolerance-Demo/flink-0.9-SNAPSHOT/tools/pageRank.sh');
    echo "Page Rank WORKS!!!";
}

function test()
{
	echo "test works";
}

function anotherF()
{
    echo "the other funct";
}

function noTouch()
{
    echo "can't touch this!";
}
?>