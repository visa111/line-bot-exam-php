<?php



require "vendor/autoload.php";

$access_token = 'SwnqHbfW+jBs4/VLDLVpvcUi6U537+gE2ClNh+WvUtZhQqX04EMQVRHJNtngZPV5dPsEqkMvaAfAkhI/6QSWnGQykChqgLeyj4fxQY9ZXeUGoSmbXbwuen8mbfOwAo6LN9+HqXXiDjBn7iM4bW6PegdB04t89/1O/w1cDnyilFU=';

$channelSecret = '75509b2d7dec8f7e151e2906cd870026';

$pushID = 'Ua10b16e9c7035ec885465bcb24058289';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







