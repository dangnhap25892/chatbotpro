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
	exit;
	
	
}
$input = json_decode(file_get_contents('php://input'),true);
file_put_contents("text.txt", $input);
$userID = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['sender']['text'];

//echo $userID." and ".$message;

$url = "https://graph.facebook.com/v7.0/me/messages?access_token=$token";
if($message=='hi'){
	$jsonData ="{
	'messaging_type' : 'RESPONSE',
	'recipient':{
		'id': $userID
	},
	'message':{
		'text':'hello232'
		}
}";
sendchat($token,$jsonData);
}

if($message=='hello'){
	$jsonData ="{
	'messaging_type' : 'RESPONSE',
	'recipient':{
		'id': $userID
	},
	'message':{
		'text':'Met quas roiof'
		}
}";

sendchat($token,$jsonData);
}
else{
	$jsonData ="{
	'messaging_type' : 'RESPONSE',
	'recipient':{
		'id': $userID
	},
	'message':{
		'text':'chans'
		}
}";
sendchat($token,$jsonData);
}
// $jsonData ="{
// 	'messaging_type' : 'RESPONSE',
// 	'recipient':{
// 		'id': $userID
// 	},
// 	'message':{
// 		'text':'hello232'
// 		}
// }";

//sendchat($token,$jsonData);
function sendchat($token,$jsonData)
{
$url = "https://graph.facebook.com/v7.0/me/messages?access_token=$token";

  $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $st=curl_exec($ch);
$result=json_decode($st,TRUE);
	return $result;

    curl_close($ch);
}



?>
