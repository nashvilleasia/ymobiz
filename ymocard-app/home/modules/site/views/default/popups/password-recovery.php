<?php

use yii\helpers\Html;
use ymobiz\auth\ymoUser;
use mcms\isloading\Isloading;
use ymobiz\auth\ymoUserSystem;

$passwordRecoveryModel = new ymoUserSystem;
$passwordRecoveryModel->scenario = 'PasswordRecovery';

$view = Yii::$app->getView();
$view->registerJs("
	var RecoveryClass = jQuery('.ymo-recovery-type');
	var RecoveryInputClass = jQuery('.ymo-recovery-type-choice');
		
	RecoveryClass.on('click',function(){
		var valueRecoveryType = jQuery(this).val();
		RecoveryInputClass.attr('placeholder','".Yii::$app->getModule('site')->ymoTranslate->t('site','form','insert ')."' + valueRecoveryType);
	});
		
	jQuery('input[value=\"mobile number\"]').prop('disabled', true);
");

?>
                    
<!-- Modal -->
<div class="popup-password">
  <div class="ymo-size">
    <div class="bs-modal-sm ymo-popup">
      <div class="popup-header">
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title" id="myModalLabel"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','password recovery')?></h4> 
      </div>
      <div class="modal-body popup-body">
		<div class="row">
			<div class="col-md-6 popup-text col-md-offset-3">
				<!--<?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','please choose one of the options to recover your password')?>-->
			</div>
		</div>
		<?php 
			$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
				'id' => 'PasswordRecovery',
				'action' => '/site/password-recovery',
				'model' => $passwordRecoveryModel,
				'pluginOptions' => [
					'dataType' => 'json',
					'resetForm' => true,
				],
				'customCallbacks' => [
					'complete' => new \yii\web\JsExpression("
						 var obj = JSON.parse(event.responseText);
						 if(obj.status === 200){
						    ".Isloading::widget([
								'id' => 'response-recovery-password',
								'pluginOptions' => [
									 'text' => Yii::t('app','Sending, wait...')
								],
									'response' => new \yii\web\JsExpression('
										jQuery("#load-modal-password-recovery").modal("hide"); 
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
		<div class="row">
			<div class="col-md-8 col-sm-8 col-md-12 col-md-offset-3 ymo-radio">
				<?
					$passwordRecoveryModel->pass_recovery_choice='email';
					
					echo $form->field($passwordRecoveryModel, 'pass_recovery_choice', ['template'=>'{input}{error}','options' =>[
							'class' => 'col-md-12 ymo-nopadding ymo-group',
							]
							])->radioList($passwordRecoveryModel->recoveryType, [
								'inline'=>true,
							'class' => 'radio-name ymo-nopadding custom-radio',
							'itemOptions' => [
								'class' => 'ymo-radio ymo-recovery-type',
								'labelOptions' => [
								'class' => 'ymo-radio-label',
							],
						],
					]);
					
				?>
			</div>
		</div>
		  <div class="row">
		    <div class="col-lg-8 col-lg-offset-3">
		        <div class="input-group">
					<?= $form->field($passwordRecoveryModel, 'pass_recovery_input', ['template'=>'{input}'])->textInput(['class'=>'ymo-input form-control ymo-recovery-type-choice','placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site','form','insert email')]) ?>
		         	<span class="input-group-btn">
						<?= Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','next'), ['class' => 'btn btn-primary']) ?>
		         	</span>
		        </div><!-- /input-group -->
				<?= $form->field($passwordRecoveryModel, 'pass_recovery_input', ['template'=>'{error}']) ?>
		    </div> <!-- /.col-lg-6 -->
		</div><!-- /.row -->
		<?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
      </div>
    </div>
  </div>
</div>