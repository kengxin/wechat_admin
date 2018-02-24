<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'oss' => [
        'ossServer' => 'http://oss-cn-beijing.aliyuncs.com', //服务器外网地址，深圳为 http://oss-cn-shenzhen.aliyuncs.com
        'ossServerInternal' => 'http://oss-cn-beijing-internal.aliyuncs.com	', //服务器内网地址，深圳为 http://oss-cn-shenzhen-internal.aliyuncs.com
        'AccessKeyId' => 'LTAIIkL4yVPoDvrC', //阿里云给的AccessKeyId
        'AccessKeySecret' => 'eUtiYmzzi6hDEet1O3O4zA4gTErRM9', //阿里云给的AccessKeySecret
        'Bucket' => 'wechat-master' //创建的空间名
    ],
];
