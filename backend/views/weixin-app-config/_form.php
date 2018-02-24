<?php
use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;
$form = ActiveForm::begin();
?>

<?= $form->field($model, 'share_title')?>
<?= $form->field($model, 'share_desc')?>
<?= $form->field($model, 'share_thumb')?>
<?= $form->field($model, 'ad_title')?>
<?= $form->field($model, 'ad_thumb')?>
<?= $form->field($model, 'ad_url')?>


<?= Html::submitButton('提交', ['class' => 'btn btn-success btn-block'])?>

<?php
    ActiveForm::end()
?>
