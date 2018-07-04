<?php



require "vendor/autoload.php";

$access_token = 'eXfc2yorldMU6wdiaqrjWdaBkZKyfVIWk1rpGzms5BFj+Z8agphZ5tliqnt7TunqJbIOjvYK/KiM0Yrzaaqd4A53t95aNBpnRVW2Y0rC4jplDrEVuu3GXoOF4u3QlAl8w4yPcp2yce/t3saO44Ea3gdB04t89/1O/w1cDnyilFU=';

$channelSecret = '0358bf825ebbdc2a6e6090d5eb51ffec';

$pushID = 'U4acc521b33071bd822440d6458876bb7';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







