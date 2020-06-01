<?php

$token = "EAADn4qwXcIQBAFHRcn1PVuyAjPrYaJbqRJZBAMPWJiVNH4IDnu2Q1zv1hNORLZBKj1MT0eYJudICNjQTaycesDiZBvtyhhOLqKuFgTapMm9Bt9tSNdPocIaC3aBcOAzHg8hUsxMrxnj9sZAQiBwVmzZBJOfu4WjgnvbU9igFuVQZDZD";
if (isset($_REQUEST['hub_challenge']))
{
	$c = $_REQUEST['hub_challenge'];
	$v = $_REQUEST['hub_verify_token'];
}

if($v =="123")
{
	echo $c;
}


?>
