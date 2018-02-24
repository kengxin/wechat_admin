<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],
        'sendMsg' => [
            'class' => 'common\components\WeChatSendMsg',
            'app_id' => 'ww7abfe03bc95bd124',
            'app_secret' => 'Rd2rf6sg_BMorZLa8le6r1lsggNqTr3EU8X2E2nyCBE'
        ],
    ],
];
