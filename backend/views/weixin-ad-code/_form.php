<?php
use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'code')?>
<?= $form->field($model, 'code_url')->widget('manks\FileInput', []); ?>

<?= Html::submitButton('提交', ['class' => 'btn btn-success btn-block'])?>

<?php
    ActiveForm::end()
?>
