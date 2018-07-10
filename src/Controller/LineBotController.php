<?php

/**
 * 
 */

namespace Controller;
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
    return 'test';
  }
}