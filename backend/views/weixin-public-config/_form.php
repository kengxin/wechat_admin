<?php
use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'name')?>
<?= $form->field($model, 'app_id')?>
<?= $form->field($model, 'app_secret')?>
<?= $form->field($model, 'status')->radioList(\common\models\WeixinPublicConfig::$status_list)?>


<?= Html::submitButton('提交', ['class' => 'btn btn-success btn-block'])?>

<?php
    ActiveForm::end()
?>
