<?php

use yii\helpers\Html;
use mcms\isloading\Isloading;
use kartik\widgets\SwitchInput;
use \mcms\ajaxform\AjaxActiveFormOne;
use dosamigos\ckeditor\CKEditor;
use ymobiz\extensions\amigos\ckeditor\CKEditorOne;

/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoContents */
/* @var $form \mcms\ajaxform\AjaxActiveFormOne */
?>

<div class="ymo-contents-form">

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
		'id' => 'ymo-contents-form',
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

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->widget(CKEditorOne::className(),[
    		'preset' => 'full',
    		'clientOptions' => [
    			'allowedContent' => true,
    			'extraPlugins' => 'showprotected',
    			'protectedSource'=> 'push(/<\?[\s\S]*?\?>/g)',
    			//'customConfig' => 'http://igx89.github.io/CKEditor-ShowProtected-Plugin/config.js?t=DBAA'		
    		],
    		
    	]) ?>

    <?= $form->field($model, 'slug') ?>

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
