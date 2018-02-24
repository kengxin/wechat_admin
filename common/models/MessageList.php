<?php
namespace common\models;

use Yii;
use yii\base\Model;

class MessageList extends Model
{
    public static function sendCloseDomainMessage($domain, $type, $last_sum, $closed_at)
    {
        $message = <<<MSG
域名被封报警!
域名: {$domain}
类型: {$type}
封禁时间: {$closed_at}
{$type}剩余数量: {$last_sum}
MSG;

        return Yii::$app->sendMsg->sendWeChatMsg($message);
    }
}