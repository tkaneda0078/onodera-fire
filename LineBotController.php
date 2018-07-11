<?php

/**
 * LINE BOT用Controller
 */

class LineBotController
{
  /**
   * pushメッセージ一覧
   *
   * @var [array]
   */
  protected $messageList;


  /**
   * pushメッセージ内容
   *
   * @var [string]
   */
  protected $pushMessage;


  public function __construct()
  {
    date_default_timezone_set('Asia/Tokyo');
    // pushメッセージ一覧を読み込む
    $this->messageList = require_once __DIR__ . '/messageList.php';
  }

  /**
   * pushメッセージを取得する
   *
   * @return [string] push message
   */
  public function getPushMessage()
  {
    $timeZone = $this->getTimeZone();
    $this->setPushMessage($timeZone);
    
    return $this->pushMessage;
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
      case 18:
        $timeZone = 'dinner';
        break;
      case 14:
      case 17:
        $timeZone = 'praise';
        break;
      default:
        break;
    }

    return $timeZone;
  }


  /**
   * pushメッセージ内容を取得する
   *
   * @param [string] $timeZone
   * @return [string] $pushMessage
   */
  private function setPushMessage($timeZone)
  {
    return $this->pushMessage = $this->messageList[$timeZone];
  }

}