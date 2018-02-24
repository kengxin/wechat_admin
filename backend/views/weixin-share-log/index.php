<?php
    $this->title = '分享日志';
?>
<h1><?= $this->title?></h1>
<?=
    \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'publicConfig.name',
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    if ($model->type == 0) {
                        return '会话';
                    } else if ($model->type == 1) {
                        return '朋友圈';
                    } else if ($model->type == 2) {
                        return '朋友圈广告';
                    }

                    return '未知';
                }
            ],
            'url',
            'msg',
            'created_at:datetime',
        ]
    ])
?>