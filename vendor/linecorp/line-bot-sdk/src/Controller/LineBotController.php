<?php

/**
 * 
 */

namespace LINE\Controller;

use LINE\LINEBot;

/**
 * LINE BOT用
 */
class LineBotController extends LINEBot
{

  public function __construct($httpClient, array $args)
  {
    parent::__construct($httpClient, $args);
  }

  /**
   * push messageを取得する
   *
   * @return string $message
   */
  public function getPushMessage()
  {
    $nowTime = strtotime(date('H:i:s'));
    if ($nowTime > strtotime('17:00:00') && $nowTime < strtotime('18:00:00')) {
      return 'soumen';
    } else {
      return 'test ssdfs';
    }
  }
}