<?php

require_once __DIR__ . '/vendor/autoload.php';

use \LINE\LINEBot;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\Constant\HTTPHeader;
use LineBotController;

$httpClient = new CurlHTTPClient(getenv('LINE_CHANNEL_ACCESS_TOKEN'));
$bot = new LINEBot($httpClient, ['channelSecret' => getenv('LINE_CHANNEL_SECRET')]);

$lineCtrl = new LineBotController();
$pushMessage = $lineCtrl->getPushMessage();

$response = $bot->pushMessage(getenv('LINE_USER_ID'), new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($pushMessage));

if (!$response->isSucceeded()) {
  error_log('Faild!' . $response->getHTTPStatus . ' ' . $response->getRawBody());
}