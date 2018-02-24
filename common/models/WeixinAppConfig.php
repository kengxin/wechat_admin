<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class WeixinAppConfig extends ActiveRecord
{
    public static function tableName()
    {
        return 'weixin_app_config';
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
            [['share_title', 'share_thumb', 'ad_title', 'ad_thumb', 'ad_url'], 'required'],
            [['share_title', 'share_thumb', 'share_desc', 'ad_title', 'ad_thumb', 'ad_url'], 'string'],
            [['created_at'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'share_title' => '分享标题',
            'share_desc' => '分享描述',
            'share_thumb' => '分享图标',
            'ad_title' => '广告标题',
            'ad_thumb' => '广告分享图',
            'ad_url' => '广告Url',
            'created_at' => '创建时间'
        ];
    }
}