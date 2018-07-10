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
   * @return [string] push message
   */
  public function getPushMessage()
  {
    $timeZone = $this->getTimeZone();

    return $this->getMessage($timeZone);
  }

  /**
   * 何の時間帯か取得する
   *
   * @return [string] $timeZone
   * @todo 時間帯の見直し
   */
  private function getTimeZone()
  {
    $nowTime = intval(date('H'));

    $timeZone = '';
    switch ($nowTime) {
      case 9:
        $timeZone = 'morning';
        break;
      case 12:
        $timeZone = 'lunch';
        break;
      case 15:
        $timeZone = 'tea';
        break;
      case 14:
      case 17:
      case 18:
        $timeZone = 'praise';
        break;
      default:
        break;
    }

    return $timeZone;
  }

  /**
   * pushするメッセージ内容を取得する
   *
   * @param [string] $timeZone
   * @return [string] $message
   * @todo メッセージ一覧をconfigで定義する
   */
  private function getMessage($timeZone)
  {
    $message = $timeZone . ' よいしょ';

    return $message;
  }

}