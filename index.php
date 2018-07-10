<?php

require_once __DIR__ . '/vendor/autoload.php';

use \LINE\LINEBot;
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot\Constant\HTTPHeader;

$httpClient = new CurlHTTPClient(getenv('LINE_CHANNEL_ACCESS_TOKEN'));
$bot = new LINEBot($httpClient, ['channelSecret' => getenv('LINE_CHANNEL_SECRET')]);
$sign = $_SERVER["HTTP_" . HTTPHeader::LINE_SIGNATURE];
$events = $bot->parseEventRequest(file_get_contents('php://input'), $sign);

$inputString = file_get_contents('php://input');

foreach ($events as $event) {
  if (!($event instanceof \LINE\LINEBot\Event\MessageEvent) ||
    !($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
    continue;
  }
  $bot->replyText($event->getReplyToken(), $event->getText());
}
