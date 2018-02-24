<?php
use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;

$this->title = '批量上传二维码';

$form = ActiveForm::begin();
?>

<h1><?= $this->title?></h1>
<?= $form->field($model, 'code_url')->widget('manks\FileInput', [
    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ]
    ],
]); ?>

<?= Html::submitButton('提交', ['class' => 'btn btn-success btn-block'])?>

<?php
    ActiveForm::end()
?>
