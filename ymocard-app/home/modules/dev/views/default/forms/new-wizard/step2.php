<?php 

use kartik\widgets\ActiveForm;
use ymobiz\models\common\Dev;

$model = new Dev;
$model->scenario = 'formStep2';

$form = ActiveForm::begin([
	'id' => 'step2',
	'action' => '/dev/step-form?step=finish',
	'options' => [
		'enctype'=>'multipart/form-data'
	],	
]);

echo $form->field($model, 'email', ['template'=>'{label}{input}{error}','options' => [
		'class' => 'col-md-8 form-group ymo-nopadding ymo-group',
]])->textInput(['class'=>'form-control ymo-input']);

echo '<div class="col-md-12 ymo-nopadding ymo-Panel">';

echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
	'class' => 'col-md-3 btn ymo-btn-dark-pink',
]);

echo '</div>';

$form->end();

?>
