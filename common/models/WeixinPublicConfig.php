<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class WeixinPublicConfig extends ActiveRecord
{
    // 正常
    const STATUS_OK = 0;

    // 掉权限
    const STATUS_ERROR = 1;

    public static $status_list = [
        self::STATUS_OK => '正常',
        self::STATUS_ERROR => '掉权限'
    ];

    public static function tableName()
    {
        return 'weixin_public_config';
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
            [['name', 'app_id', 'app_secret'], 'string'],
            [['name', 'app_id', 'app_secret', 'status'], 'required'],
            [['status', 'created_at'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'name' => '公众号名称',
            'app_id' => 'APP_ID',
            'app_secret' => 'APP_SECRET',
            'status' => '状态',
            'created_at' => '创建时间'
        ];
    }
}