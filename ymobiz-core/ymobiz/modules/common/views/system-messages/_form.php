<?php

use yii\helpers\Html;
use mcms\isloading\Isloading;
use kartik\widgets\SwitchInput;
use \mcms\ajaxform\AjaxActiveFormOne;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoSystemMessages */
/* @var $form \mcms\ajaxform\AjaxActiveFormOne */
?>

<div class="ymo-system-messages-form">

<?php 	
	$beforeSend = false;
	if($model->isNewRecord==true)
	{
		$beforeSend = "
			if(jQuery('body').find('.error-summary ul li').size()===0) {
				jQuery('form').resetForm();
			}
		";
	}
	
	$form = AjaxActiveFormOne::begin([
		'id' => 'ymo-system-messages-form',
        'model' => $model,
        'pluginOptions' => [
			'dataType' => 'json',
			'resetForm' => $beforeSend,
		],
		'customCallbacks' => [
			'complete' => new \yii\web\JsExpression("
				var obj = JSON.parse(event.responseText);
				if(obj.status === 200){
					".Isloading::widget([
						'id' => 'response-result-popup',
						'pluginOptions' => [
							'text' => Yii::t('app','Sending, wait...')
						],	
						'response' => new \yii\web\JsExpression('
							jQuery("#load-modal-result-popup").modal("hide"); 
						    	jQuery("#ajax-msg").html(obj.content);  
						        $.isLoading("hide");
						')
					])."
				}else if(obj.status === 500){
					jQuery('#ajax-msg').html(obj.content);;
				}
					return false;
				"),
			],
			'loadingOptions' => "
			{
				text: '".Yii::t('app','Loading')."',
				'class': \"fa fa-cog fa-spin fa-lg\",
				'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
			}"
		]);

	?>
	
	<div id="ajax-msg"></div>

    <?= $form->field($model, 'languages_id')->dropDownList(ArrayHelper::map(ymobiz\models\common\ymoLanguages::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'cluster_id')->dropDownList(ArrayHelper::map(ymobiz\models\common\ymoClusters::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'module')->textInput(['maxlength' => 255,'value' => $model->isNewRecord ? 'app' : $model->module]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->widget(CKEditor::className(),[
    		'preset' => 'basic',
    		'clientOptions' => [
    			'allowedContent' => true
    		]
    	]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 
    		'success' => 'Success',
    		'alert' => 'Alert',
    		'info' => 'Info', 
    		'warning' => 'Warning', 
    		'error' => 'Error', 
    	]) ?>
    
    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [ 
         'inlineLabel' => false, 
    ]) ?>

	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div id="form-response"></div>
			<div class="form-group" style= " width: 200px; margin: 20px auto;">
				<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg']) ?>
				<?= Html::a('Reset', '',['class' => 'btn btn-default btn-lg']) ?>
			</div>
		</div>
	</div>

    <?php AjaxActiveFormOne::end(); ?>

</div>
