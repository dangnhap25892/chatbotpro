<?php

$token = "EAADn4qwXcIQBAFHRcn1PVuyAjPrYaJbqRJZBAMPWJiVNH4IDnu2Q1zv1hNORLZBKj1MT0eYJudICNjQTaycesDiZBvtyhhOLqKuFgTapMm9Bt9tSNdPocIaC3aBcOAzHg8hUsxMrxnj9sZAQiBwVmzZBJOfu4WjgnvbU9igFuVQZDZD";
$token2="EAADn4qwXcIQBAPd61ca1Ee35hssJqhQz4qJFscbZCAXyeshGwCNmQl7hy6vpWqQB6uV8Vr97XTgmghTcMs1CeG7KrUJGHXeIP94PgUjJRfZBdyMDHMyDO7XI1HOHTFgUmAKWyDmJU2i5yFAvWN8YG0dPmzJpVcHSDwx8vGwgZDZD";
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
$message = $input['entry'][0]['messaging'][0]['message']['text'];

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
sendchat($token2,$jsonData);
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
sendchat($token2,$jsonData);
sendchat($token,$jsonData);
}
else{
	$jsonData ="{
	'messaging_type' : 'RESPONSE',
	'recipient':{
		'id': $userID
	},
	'message':{
		'text':'hi".$message."chans".$userID."'
		}
}";
	if(isset($message)){
	sendchat($token,$jsonData);
	sendchat($token2,$jsonData);
	}
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