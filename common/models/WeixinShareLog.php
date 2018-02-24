<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class WeixinShareLog extends ActiveRecord
{
    public static function tableName()
    {
        return 'weixin_share_log';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                ],
            ],
        ];
    }

    public function rules()
    {
        return [
            [['url', 'msg'], 'string'],
            [['url', 'type', 'app_id'], 'required'],
            [['type', 'app_id', 'created_at'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'url' => 'Url',
            'type' => '分享类型',
            'app_id' => '所属公众号',
            'msg' => '信息',
            'created_at' => '创建时间'
        ];
    }

    public function saveLog($url, $type, $app_id, $msg)
    {
        $this->url = $url;
        $this->type = $type;
        $this->app_id = $app_id;
        $this->msg = $msg;

        return $this->save();
    }
}