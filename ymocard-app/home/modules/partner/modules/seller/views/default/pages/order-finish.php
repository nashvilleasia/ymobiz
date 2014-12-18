<?php

use yii\helpers\ArrayHelper;
use ymoext\ymoExt;
use yii\web\NotFoundHttpException;
use kartik\icons\Icon;
use mcms\isloading\Isloading;
use ymobiz\models\common\ymoStates;
use ymobiz\models\common\ymoCountries;
use yii\helpers\Json;

$view = Yii::$app->getView();
		
$view->registerJs("
		
	$('.collapse-icon').each(function(){
      if ($(this).children().hasClass('fa-plus')){
        $(this).next().hide();
      }
    });
		
	jQuery('a[href=#step1]').trigger('click');
	jQuery('a[href=#step1] i').removeClass('fa-plus');
    jQuery('a[href=#step1] i').addClass('fa-minus');
		
	$('.collapse-icon').click(function(){
		$(this).next().toggle();
		if ($(this).children().hasClass('fa-plus')){
			$(this).children().removeClass('fa-plus');
            $(this).children().addClass('fa-minus');
		}      
		else {
			$(this).children().removeClass('fa-minus');
            $(this).children().addClass('fa-plus');
		}
	});
		
");

$modelSignup = new $orderModel;
$modelSignup->scenario = 'OrderSignup';
$modelSignup->disableFields = true;

$modelCard = new $orderModel;
$modelCard->scenario = 'OrderCard';
$modelCard->disableFields = true;

$modelPayment = new $orderModel;
$modelPayment->scenario = 'OrderPayment';
$modelPayment->disableFields = true;

if(@Yii::$app->session['steps'] 
		&& @Yii::$app->session['steps']['OrderSignup'] 
		&& @Yii::$app->session['steps']['OrderCard'] 
		&& @Yii::$app->session['steps']['OrderFiles'] 
		&& @Yii::$app->session['steps']['OrderPayment']){

?>

	<!-- OrderSignup -->
		<div class="orderForms" id="OrderSignup">
		
			<?php 
				$arrayOrderSignup = $modelSignup->finishFormOrderSignup(@Yii::$app->session['steps']['OrderSignup']);
			?>
		
			<span class="badge ymo-badge-a">1</span>
			<h2 class="col-md-11 ymo-nopadding ymo-title-b">
			    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Personal Details') ?>
			    <a data-toggle="collapse" data-parent="#OrderSignup" href="#step1"  style="float: right;" class="collapse-icon"><?=Icon::show('plus', ['class'=>'fa fa-plus','style'=>'color:#0b8fd4;'])?></a>
			</h2>
			
			<div id="step1" class="col-md-12 ymo-nopadding panel-collapse collapse">
				<ul class="list-unstyled" style="margin-left: 42px;">
					<?php

						$stepOne = [
							'ufirstname','ulastname','dob','gender','countryob_id','countrynat_id','countrydoctype_id'
						];
					
						foreach ($arrayOrderSignup as $key => $value ){
							if(in_array($key, $stepOne)){
						
								echo "	<li>
										<div class=\"col-md-8 form-group ymo-nopadding ymo-group\">
										<label class=\"control-label\">".$modelSignup->getAttributeLabel($key)."</label>
										<span class=\"form-control ymo-input\" style=\"background-color: transparent; border: none;\">$value</span>
										</div>
									</li>
								";
							}
						}
					?>
				</ul>
			</div>
			
			<span class="badge ymo-badge-a">2</span>
			<h2 class="col-md-11 ymo-nopadding ymo-title-b">
			    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Account Details') ?>
			    <a data-toggle="collapse" data-parent="#OrderSignup" href="#step2" style="float: right;" class="collapse-icon"><?=Icon::show('plus', ['class'=>'fa fa-plus','style'=>'color:#0b8fd4;'])?></a>
			</h2>
			
			<div id="step2" class="col-md-12 ymo-nopadding panel-collapse collapse">
				<ul class="list-unstyled" style="margin-left: 42px;">
				<?php

					$stepTwo = [
						'email','repeat_email','password','repeat_password'
					];
				
					foreach ($arrayOrderSignup as $key => $value ){
						if(in_array($key, $stepTwo)){
					
							echo "	<li>
									<div class=\"col-md-8 form-group ymo-nopadding ymo-group\">
									<label class=\"control-label\">".$modelSignup->getAttributeLabel($key)."</label>
									<span class=\"form-control ymo-input\" style=\"background-color: transparent; border: none;\">$value</span>
									</div>
								</li>
							";
						}
					}
				?>
				</ul>
			</div>
			
			<span class="badge ymo-badge-a">3</span>
			<h2 class="col-md-11 ymo-nopadding ymo-title-b">
			    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Contact Details') ?> 
			    <a data-toggle="collapse" data-parent="#OrderSignup" href="#step3" style="float: right;" class="collapse-icon"><?=Icon::show('plus', ['class'=>'fa fa-plus','style'=>'color:#0b8fd4;'])?></a>
			</h2>
			
			<div id="step3" class="col-md-12 ymo-nopadding panel-collapse collapse">
				<ul class="list-unstyled" style="margin-left: 42px;">
				<?php
				
					$stepThree = array_merge($stepOne,$stepTwo);

					foreach ($arrayOrderSignup as $key => $value){
						if(!in_array($key, $stepThree)){
							
							if($key!='verifyCode'){
							
								echo "	<li>
										<div class=\"col-md-8 form-group ymo-nopadding ymo-group\">
										<label class=\"control-label\">".$modelSignup->getAttributeLabel($key)."</label>
										<span class=\"form-control ymo-input\" style=\"background-color: transparent; border: none;\">$value</span>
										</div>
									</li>
									";
							}
						}
					}
				?>
				</ul>
			</div>
			
		</div>	
	<!-- OrderSignup -->
	
	<!-- OrderCard -->
		<div class="orderForms" id="OrderCard">
		
			<span class="badge ymo-badge-a">4</span>
            <h2 class="col-md-11 ymo-nopadding ymo-title-b">
                 <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Card Name') ?>
                 <a data-toggle="collapse" data-parent="#OrderCard" href="#step4"  style="float: right;" class="collapse-icon"><?=Icon::show('plus', ['class'=>'fa fa-plus','style'=>'color:#0b8fd4;'])?></a>
            </h2>
            
            <?php 
				$arrayOrderCard = $modelCard->finishFormOrderCard(@Yii::$app->session['steps']['OrderCard']);
			?>
			
			<div id="step4" class="col-md-12 ymo-nopadding panel-collapse collapse">
				<ul class="list-unstyled" style="margin-left: 42px;">
				<?php
				
					foreach ($arrayOrderCard as $key => $value ){
						if(!is_array($value)){
							echo "	<li>
									<div class=\"col-md-8 form-group ymo-nopadding ymo-group\">
									<label class=\"control-label\">".$modelCard->getAttributeLabel($key)."</label>
									<span class=\"form-control ymo-input\" style=\"background-color: transparent; border: none;\">$value</span>
									</div>
								</li>
							";
						}
					}
				?>
				</ul>
			</div>
		
			<span class="badge ymo-badge-a">5</span>
            <h2 class="col-md-11 ymo-nopadding ymo-title-b">
                 <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Compliance') ?>
                 <a data-toggle="collapse" data-parent="#OrderCard" href="#step5"  style="float: right;" class="collapse-icon"><?=Icon::show('plus', ['class'=>'fa fa-plus','style'=>'color:#0b8fd4;'])?></a>
            </h2>
			
			<?php 
				$arrayOrderFiles = $modelCard->finishFormOrderFiles(@Yii::$app->session['steps']['OrderFiles']);
			?>
			
			<div id="step5" class="col-md-12 ymo-nopadding panel-collapse collapse" style="margin-top: 5px; margin-bottom: 15px;">
				<ul class="list-unstyled" style="margin-left: 42px;">
					<?php
					foreach ($arrayOrderFiles['card_compliance'] as $key => $value ){
						echo "	<li>
								<div class=\"col-md-8 form-group ymo-nopadding ymo-group\" style=\"margin-bottom: 0px;\">
								<span class=\"form-control ymo-input\" style=\"background-color: transparent; border: none;\">$value[name]</span>
								</div>
							</li>
						";
						
					}
				?>
				</ul>
			</div>
			
		</div>	
	<!-- OrderCard -->
	
	<!-- OrderPayment -->
		<div class="orderForms" id="OrderPayment">
		
			<span class="badge ymo-badge-a">6</span>
            <h2 class="col-md-11 ymo-nopadding ymo-title-b">
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Payment Method') ?>
                <a data-toggle="collapse" data-parent="#OrderPayment" href="#step6"  style="float: right;" class="collapse-icon"><?=Icon::show('plus', ['class'=>'fa fa-plus','style'=>'color:#0b8fd4;'])?></a>
            </h2>
			
			<?php 
				$arrayOrderPayment = $modelPayment->finishFormOrderPayment(@Yii::$app->session['steps']['OrderPayment']);
			?>
			
			<div id="step6" class="col-md-12 ymo-nopadding panel-collapse collapse">
				<ul class="list-unstyled" style="margin-left: 42px;">
				<?php
				
					foreach ($arrayOrderPayment as $key => $value ){
						if(!is_array($value)){
							echo "	<li>
									<div class=\"col-md-8 form-group ymo-nopadding ymo-group\">
									<label class=\"control-label\">".$modelPayment->getAttributeLabel($key)."</label>
									<span class=\"form-control ymo-input\" style=\"background-color: transparent; border: none;\">$value</span>
									</div>
								</li>
							";
						}
					}
				?>
				</ul>
			</div>
			
			 <?php
			 
	                 echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),'/partner-supervisor/order-signup?step=OrderSignup',[
	                 	'class' => 'col-md-3 btn ymo-btn-dark-pink',
	                    'style' => 'margin-right: 15px;'
	                 ]);


                 	echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
                 		'id' => 'OrderSave',
                 		'buttonClass' => 'col-md-3 btn ymo-btn-dark-pink',
                 		'name' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','Finish'),
                 		'target' => 'response-order-save',
                 		'pluginOptions' => [	
                 			'dataType' => 'json',
                 			'resetForm' => false,
                 			'url' => '/partner-seller/order-signup?step=OrderSave',
                 		],
                 		'customCallbacks' =>
                 		[
                 			'complete' => new \yii\web\JsExpression("
					            var obj = JSON.parse(event.responseText);
					            if(obj.status === 200){
			 						jQuery('.ymo-json-response').html(obj.content);
					             }else if(obj.status === 500){
					        		jQuery('.ymo-json-response').html(obj.content);
					             }
					             return false;
					        "),
                 		]
                 	]);
             ?>
			
		</div>	
	<!-- OrderPayment -->
	
<?php 
}else{
	throw new NotFoundHttpException(Yii::t('yii', 'This form don\'t send it, please back to register form, and follow all steps, and complete your request.'));
}
?>	