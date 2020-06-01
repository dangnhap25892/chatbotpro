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
$input = json_decode(file_get_contents('php://input'),true);

$userID = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['sender']['text'];

//echo $userID." and ".$message;

$url = "https://graph.facebook.com/v7.0/me/messages?access_token=$token";

$jsonData ="{
	'recipient':{
		'id': $userID
	},
	'message':{
		'text':'hello'
	}
}";

  $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsondata);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_exec($ch);





?>
