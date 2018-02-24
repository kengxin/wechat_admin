<?php
    $this->title = '活动管理';
?>
<h1><?= $this->title?></h1>
<a class="btn btn-success" style="margin: 10px auto" href="/weixin-app-config/create">添加活动</a>
<?=
    \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'share_title',
            'ad_title',
            'created_at:datetime',
            [
                'class' => '\yii\grid\ActionColumn'
            ]
        ]
    ])
?>