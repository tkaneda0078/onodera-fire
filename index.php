<?php
require_once __DIR__ . '/vendor/autoload.php';

error_log(55555555);

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('CHANNEL_SECRET')]);
$sign = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$events = $bot->parseEventRequest(file_get_contents('php://input'), $sign);

error_log(2222222222);

foreach ($events as $event) {
  if (!($event instanceof \LINE\LINEBot\Event\MessageEvent) ||
    !($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
    continue;
  }
  error_log($event->getText());
  $bot->replyText($event->getReplyToken(), $event->getText());
}
