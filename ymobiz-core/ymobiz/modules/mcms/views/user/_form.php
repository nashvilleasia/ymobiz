<?php

use yii\helpers\Html;
use mcms\isloading\Isloading;
use kartik\widgets\SwitchInput;
use ymobiz\components\ymoCluster;
use yii\helpers\ArrayHelper;

?>

<div class="user-form">

	<?php
	
	$beforeSend = false;
	if($model->isNewRecord==true)
	{
		$beforeSend = "
			if(jQuery('body').find('.error-summary ul li').size()===0) {
				//jQuery('form').resetForm();
			}
		";
	}
	
	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
						    'id' => 'form-user',
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
	
    <?= $form->field($model, 'username') ?>
    
	<?= $form->field($model, 'cluster_id')->dropDownList(ymoCluster::allClusters()) ?>
    
	<?= $form->field($model, 'group_id')->dropDownList(ymoCluster::allGroups()) ?>

    <?php
        if($model->isNewRecord){
	?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'repeat_password')->passwordInput() ?>

    <?php
        }

    if(!empty($model->confirmed_at)){
        $model->confirmed_at = 1;
    }
    ?>

    <?= $form->field($model, 'confirmed_at')->widget(SwitchInput::classname(), [
        'inlineLabel' => false,
    ])->label(Yii::t('app','Confirmed?')); ?>

	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
		'inlineLabel' => false,
	]); ?>

	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div id="form-response"></div>
			<div class="form-group" style= " width: 200px; margin: 20px auto;">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg','name' => $model->isNewRecord ? 'new' : 'update']) ?>
				<?= Html::a('Reset', '',['class' => 'btn btn-default btn-lg']) ?>
			</div>
		</div>
	</div>

	<?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>

</div>
