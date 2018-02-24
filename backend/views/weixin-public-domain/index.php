<?php
    $this->title = '公众号域名管理';
    use common\models\WeixinPublicDomain;
?>
<h1><?= $this->title?></h1>
<a class="btn btn-success" style="margin: 10px auto" href="/weixin-public-domain/create">添加域名</a>
<?=
    \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'domain',
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($model) {
                    return WeixinPublicDomain::$type_list[$model->type];
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    return WeixinPublicDomain::$status_list[$model->status];
                }
            ],
            [
                'attribute' => 'public_id',
                'value' => function($model) {
                    return $model->publicConfig->name;
                }
            ],
            'created_at:datetime',
            [
                'class' => '\yii\grid\ActionColumn'
            ]
        ]
    ])
?>