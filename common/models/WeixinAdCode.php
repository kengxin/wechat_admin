<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class WeixinAdCode extends ActiveRecord
{
    // 正常
    const STATUS_OK = 0;

    // 被封
    const STATUS_ERROR = 1;

    public static $status_list = [
        self::STATUS_OK => '正常',
        self::STATUS_ERROR => '异常'
    ];

    public static function tableName()
    {
        return 'weixin_ad_code';
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
            [['code', 'code_url'], 'string'],
            [['code', 'code_url',], 'required'],
            [['status', 'show_sum', 'created_at'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'code' => '微信号',
            'code_url' => '二维码地址',
            'show_sum' => '展示次数',
            'status' => '状态',
            'created_at' => '创建时间'
        ];
    }

    public function batchAdd($postData)
    {
        if (!empty($postData['WeixinAdCode']['code_url'])) {
            $result = [];
            foreach ($postData['WeixinAdCode']['code_url'] as $v) {
                $codeInfo = pathinfo($v);
                $code = substr($codeInfo['basename'], 0, strpos($codeInfo['basename'], '.'));
                $result[] = [
                    'code' => $code,
                    'code_url' => $v,
                    'show_sum' => 0,
                    'status' => 0,
                    'created_at' => time()
                ];
            }

            return Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['code', 'code_url', 'show_sum', 'status', 'created_at'], $result)->execute();
        }

        return false;
    }

    public function getShowCode()
    {
        $model = WeixinAdCode::find()
            ->where(['status' => self::STATUS_OK])
            ->orderBy('rand()')
            ->one();

        if (!empty($model)) {
            $model->show_sum += 1;

            $model->save();

            return [
                'code' => $model->code,
                'code_url' => $model->code_url
            ];
        }

        return false;
    }
}