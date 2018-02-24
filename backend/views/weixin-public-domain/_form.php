<?php
use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'domain')?>
<?= $form->field($model, 'type')->radioList(\common\models\WeixinPublicDomain::$type_list)?>
<?= $form->field($model, 'status')->radioList(\common\models\WeixinPublicDomain::$status_list)?>
<?= $form->field($model, 'public_id')->dropDownList(\common\models\WeixinPublicConfig::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => '请选择公众号'])?>


<?= Html::submitButton('提交', ['class' => 'btn btn-success btn-block'])?>

<?php
    ActiveForm::end()
?>
