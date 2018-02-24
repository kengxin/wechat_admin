<?php
    $this->title = '公众号管理';
    use common\models\WeixinPublicConfig;
?>
<h1><?= $this->title?></h1>
<a class="btn btn-success" style="margin: 10px auto" href="/weixin-public-config/create">添加公众号</a>
<?=
    \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'app_id',
            'app_secret',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    return WeixinPublicConfig::$status_list[$model->status];
                }
            ],
            'created_at:datetime',
            [
                'class' => '\yii\grid\ActionColumn'
            ]
        ]
    ])
?>