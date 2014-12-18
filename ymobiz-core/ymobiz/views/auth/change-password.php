<?php

use yii\helpers\Html;
use ymobiz\auth\ymoUser;
use mcms\isloading\Isloading;
use ymobiz\auth\ymoUserSystem;

$resetPasswordModel = new ymoUserSystem;
$resetPasswordModel->scenario = 'PasswordReset';

$view = Yii::$app->getView();

?>

		<?php 
			$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
				'id' => 'PasswordReset',
				'action' => '/site/auth-reset-password',	
				'model' => $resetPasswordModel,
				'pluginOptions' => [
					'dataType' => 'json',
					'resetForm' => true,
					'data' => [
						'token' => Yii::$app->request->get('token')
					]	
				],
				'customCallbacks' => [
					'complete' => new \yii\web\JsExpression("
						 var obj = JSON.parse(event.responseText);
						 if(obj.status === 200){
						    ".Isloading::widget([
								'id' => 'response-password-reset',
								'pluginOptions' => [
									 'text' => Yii::t('app','Sending, wait...')
								],
									'response' => new \yii\web\JsExpression('
										jQuery("#load-modal-password-reset").modal("hide"); 
										jQuery(".ymo-json-response").html(obj.content);  
										$.isLoading("hide");
									')
								])."
						 	}else if(obj.status === 500){
								RecoveryInputClass.attr('placeholder','".Yii::$app->getModule('site')->ymoTranslate->t('site','form','insert email')."');
						 		jQuery('.ymo-json-response').html(obj.content);;
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
		<!--ymo-card-form-->
       <div class="col-md-12 ymo-card-form ymo-group ymo-nopadding ymo-Panel">
       
			<div class="col-md-12 ymo-nopadding">
       			<h2 class="ymo-title-b">
                      <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Create Your New Password') ?>
                </h2>
            </div>
            
	    	<div class="col-md-4 ymo-nopadding">
		        
		        <?= $form->field($resetPasswordModel, 'new_password', ['template'=>'{label}{input}{error}'])->passwordInput(['class'=>'ymo-input form-control ymo-recovery-type-choice']) ?>
		        
		        <?= $form->field($resetPasswordModel, 'repeat_new_password', ['template'=>'{label}{input}{error}'])->passwordInput(['class'=>'ymo-input form-control ymo-recovery-type-choice']) ?>
		        
		        <div class="input-group">
		         	<?= Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','change'), ['class' => 'col-md-12 btn ymo-btn-dark-pink btnNext']) ?>
		        </div>
		        
	    	</div>
	    	
	 	</div>
		
		<?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
