<?php
    use \common\models\WeixinAdCode;

    $this->title = '广告二维码';
?>
<h1><?= $this->title?></h1>
<a class="btn btn-success" style="margin: 10px auto" href="/weixin-ad-code/create">添加二维码</a>
<a class="btn btn-success" style="margin: 10px auto" href="/weixin-ad-code/batch-create">批量添加二维码</a>
<?=
    \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'code',
            'show_sum',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return WeixinAdCode::$status_list[$model->status];
                }
            ],
            'created_at:datetime',
            [
                'class' => '\yii\grid\ActionColumn'
            ]
        ]
    ])
?>