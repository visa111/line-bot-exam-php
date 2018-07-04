<?php


$access_token = 'eXfc2yorldMU6wdiaqrjWdaBkZKyfVIWk1rpGzms5BFj+Z8agphZ5tliqnt7TunqJbIOjvYK/KiM0Yrzaaqd4A53t95aNBpnRVW2Y0rC4jplDrEVuu3GXoOF4u3QlAl8w4yPcp2yce/t3saO44Ea3gdB04t89/1O/w1cDnyilFU=';

$userId = 'Uffa138efe037e6e889d0b0f4a871c005';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

