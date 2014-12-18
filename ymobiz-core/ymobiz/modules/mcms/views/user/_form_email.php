<?php

use yii\helpers\Html;
use mcms\isloading\Isloading;
use kartik\widgets\SwitchInput;

?>

<div class="user-form">

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
	
	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
						    'id' => 'form-email',
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
	<?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'current_password')->passwordInput()->label(Yii::t('app','Password')) ?>

	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div class="form-group" style= " width: 300px; margin: 20px auto;">
				<?= Html::submitButton('Update Email', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg','name' => 'update_email']) ?>
				<?= Html::a('Reset', '',['class' => 'btn btn-default btn-lg']) ?>
			</div>
		</div>
	</div>

	<?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>

</div>
