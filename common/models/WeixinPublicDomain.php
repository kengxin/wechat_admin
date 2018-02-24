<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class WeixinPublicDomain extends ActiveRecord
{
    // 正常
    const STATUS_OK = 0;

    // 被封
    const STATUS_ERROR = 1;

    // 落地
    const TYPE_LANDING = 0;

    // 入口
    const TYPE_ENTRANCE = 1;

    const TYPE_SAME = 2;

    public static $type_list = [
        self::TYPE_LANDING => '落地',
        self::TYPE_ENTRANCE => '入口',
        self::TYPE_SAME => '通用',
    ];

    public static $status_list = [
        self::STATUS_OK => '正常',
        self::STATUS_ERROR => '被封'
    ];

    public static function tableName()
    {
        return 'weixin_public_domain';
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
            [['domain'], 'string'],
            [['domain', 'type', 'status', 'public_id'], 'required'],
            [['type', 'status', 'public_id', 'closed_at', 'created_at'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Id',
            'domain' => '域名',
            'type' => '类型',
            'status' => '状态',
            'public_id' => '所属公众号',
            'closed_at' => '封禁时间',
            'created_at' => '创建时间'
        ];
    }

    public function getPublicConfig()
    {
        return $this->hasOne(WeixinPublicConfig::className(), ['id' => 'public_id']);
    }

    public static function getShareEntrance($limit)
    {
        $result = WeixinPublicDomain::find()
            ->joinWith('publicConfig')
            ->select(['domain'])
            ->where(['weixin_public_domain.type' => self::TYPE_SAME, 'weixin_public_domain.type' => self::STATUS_OK])
            ->andWhere(['weixin_public_config.status' => WeixinPublicConfig::STATUS_OK])
            ->limit($limit)
            ->orderBy('rand()')
            ->column();

        foreach ($result as $k => $v) {
            $result[$k] = "http://{$v}/rk.html";
        }

        return $result;
    }

    public function getLandingDomain()
    {
        return $this->find()
            ->where(['type' => self::TYPE_SAME])
            ->orderBy('rand()')
            ->one();
    }

    public function setClose()
    {
        $this->status = self::STATUS_ERROR;
        $this->closed_at = time();

        // 发送通知
        MessageList::sendCloseDomainMessage(
            $this->domain,
            self::$type_list[$this->type],
            WeixinPublicDomain::find()->where(['status' => self::STATUS_OK, 'type' => self::TYPE_SAME])->count(),
            $this->closed_at);

        return $this->save();
    }
}