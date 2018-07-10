<?php

require_once __DIR__ . '/vendor/autoload.php';

use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\Constant\HTTPHeader;
use \LINE\Controller\LineBotController;

date_default_timezone_set('Asia/Tokyo');

$httpClient = new CurlHTTPClient(getenv('LINE_CHANNEL_ACCESS_TOKEN'));
$bot = new LineBotController($httpClient, ['channelSecret' => getenv('LINE_CHANNEL_SECRET')]);

$pushMessage = $bot->getPushMessage();

$response = $bot->pushMessage(getenv('LINE_USER_ID'), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($pushMessage));

if (!$response->isSucceeded()) {
  error_log('Faild!' . $response->getHTTPStatus . ' ' . $response->getRawBody());
}