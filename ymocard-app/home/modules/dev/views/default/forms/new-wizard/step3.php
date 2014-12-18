<?php 

use kartik\widgets\ActiveForm;
use ymobiz\models\common\Dev;

$model = new Dev;
$model->scenario = 'formStep3';

$form = ActiveForm::begin([
	'id' => 'step3',
	'action' => '/dev/step-form?step=finish',
	'options' => [
		'enctype'=>'multipart/form-data'
	],	
]);

?>
<div class="col-xs-12  ymo-nopadding ymo-card-form">
    <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
        <?php
        echo $form->field($model,'fileStep[]', ['template'=>'{input}'])->widget(\kartik\widgets\FileInput::classname(), [
            'options' => [
                'accept' => 'any/*',
                'multiple'=>true,
            ],
            'pluginOptions' => [
                'showPreview' => false,
                'showCaption' => false,
                'showUpload' => false,
                'elCaptionText' => '#customCaption',
                'browseClass' => 'col-md-2 ymo-btn-upload',
                'removeClass' => 'ymo-btn-upload input-upload-espace',
                'browseIcon' => '',
                'removeIcon' => '',
                'browseLabel' =>  'Upload'
            ]
        ]);
        echo '<span id="customCaption" class="text-success upload-caption" style="margin-top: -19px;"></span>';
        echo $form->field($model,'fileStep', ['template'=>'{error}']);
        ?>
    </div>

<div class="col-xs-12  ymo-nopadding ymo-card-form" style="margin: 7px 0px 7px 0px;">
	       <?php 
	       
		       $steps = Yii::$app->session->get('steps');
		       
		       if(\yii\helpers\ArrayHelper::getValue($steps,'finish'))
		       {
		       		$ymoClientsFiles = \yii\helpers\ArrayHelper::getValue($steps,'finish');
		       
		       		echo ymoExt::widget([
		       			'plugin' => 'previewFile',
		       			'pluginOptions' => 	[
		       				'url' => '/dev/delete-file',
		       				'route' => '/dev/display-document',
		       				'files' => $ymoClientsFiles['Dev']['fileStep'],
		       			]
		       		]);
		        }
	       ?>
</div>
<?php

echo '<div class="col-md-12 ymo-nopadding ymo-Panel">';

echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
	'class' => 'col-md-3 btn ymo-btn-dark-pink',
]);

echo '</div>';

$form->end();

?>
