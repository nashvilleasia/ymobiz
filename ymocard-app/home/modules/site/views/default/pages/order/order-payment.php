<?php

use kartik\widgets\DatePicker;
use mcms\isloading\Isloading;
use yii\web\JsExpression;
use ymoext\ymoExt;
use app\components\ymoLangManager;
use yii\helpers\ArrayHelper;

$view = Yii::$app->getView();

/*$methodCheck = ArrayHelper::getValue(Yii::$app->session['steps']['OrderPayment']['ymoClients'],'payment_method');
if($methodCheck==0){
	$methodDisplay = "
		classMethods.find('.ymo-').show();
	";
}else{
	$methodDisplay = "
		classMethods.find('.ymo-' + $methodCheck).show();
	";
}*/

$view->registerJs("
		
    var formOrderModel = jQuery('form#OrderPayment');

    var buttonsMethods = jQuery('.ymo-method,input[name=ymo-method]');
	var classMethods = jQuery('.ymo-methods');	
	var displayMethods = classMethods.find('li.ymo-method-view');
		
    displayMethods.find(':input').prop('disabled', true);
		
	buttonsMethods.click(function(){
		var idContent = jQuery(this).val();
		displayMethods.hide();
		classMethods.find('.ymo-' + idContent).show();
		 if(idContent==='credit-card'){
            displayMethods.find(':input').prop('disabled', false);
        }else{
            displayMethods.find(':input').prop('disabled', true);
        }
	});	

");

$orderModel->scenario = 'OrderPayment';

?>

<div class="col-md-12 ymo-nopadding">
<?php
	if(ArrayHelper::getValue(@Yii::$app->session['steps'],'OrderPayment')){
		echo '<pre>';
    	print_r(Yii::$app->session['steps']['OrderPayment']);
		echo '</pre>';
	}
?>
</div>

<div class="">
	<div class="col-md-12 ymo-body ymo-Panel">
		<div class="col-md-7 ymo-nopadding ymo-Panel">

            <?php echo $this->render('order-text') ?>

			<div class="col-md-10 col-md-offset-1 ymo-nopadding ymo-Panel">
			<?php
			
			$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
			    'id' => 'OrderSignup',
			    'action' => '/site/order-signup?step=OrderPayment',
			    'options' => [
			        'enctype'=>'multipart/form-data'
			    ],
			    'model' => $orderModel,
			    'localStorage' => true,
			    'pluginOptions' => [
			        'dataType' => 'json',
			        'resetForm' => false,
			    ],
			    'customCallbacks' => [
			        'complete' => new \yii\web\JsExpression("
			             var obj = JSON.parse(event.responseText);
			             if(obj.status === 200){
			        		".Isloading::widget([
			        			'id' => 'response-order-signup',
			        			'pluginOptions' => [
									'text' => Yii::t('app','Next step, wait...')
								],	
			        			'response' => new \yii\web\JsExpression('window.location = obj.redirect;')
							])."
			             }else if(obj.status === 500){
			        		alert(obj.message);
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

                    <!--Start ymo payment method-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                        <span class="badge ymo-badge-a">6</span>
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Payment Method') ?>
                        </h2>

                        <div class="col-md-12 ymo-group ymo-nopadding">
                            <div class="col-md-12 ymo-payment ymo-nopadding">
                                <?php
							        echo $form->field($orderModel, 'payment_method', ['template'=>'{label}','options' =>[
							        	'class' => 'radio-inline ymo-nopadding'
							       ]]);
							    ?>
                            </div>
                            
                            <ul class="col-md-12 list-inline ymo-Panel ymo-nopadding">
                                
                                <li class="custom-radio">
                                	<?php
                                	
                                		if(ArrayHelper::getValue(Yii::$app->session['steps'],'OrderPayment')){
                                			$orderModel->payment_method = 'paypal'; 
                                		}
                                	
						                  echo $form->field($orderModel, 'payment_method', ['template'=>'{input}','options' =>[
						                        'class' => 'radio-inline ymo-nopadding'
						                  ]])->radio([
						                    	'label' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','paypal'),
						                  		'class' => 'ymo-radio ymo-method',
						                    	'value' => 'paypal',
						                  		'labelOptions' => [
						                  			'class' => 'ymo-radio-label',
						                  			'style' => 'font-family: \'microsoft_tai_leregular\';'
						                  		]
						                  ]);
						             ?>
                                </li>
                                <li class="custom-radio">
                                	<?php
						                  echo $form->field($orderModel, 'payment_method', ['template'=>'{input}','options' =>[
						                        'class' => 'radio-inline ymo-nopadding'
						                  ]])->radio([
						                    	'label' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','bank-transfer'),
						                  		'class' => 'ymo-radio ymo-method',
						                    	'value' => 'bank-transfer',
						                  		'labelOptions' => [
						                  			'class' => 'ymo-radio-label',
						                  			'style' => 'font-family: \'microsoft_tai_leregular\';'
						                  		]
						                  ]);
						             ?>
                                </li>
                                <li class="custom-radio">
                                	<?php
						                  echo $form->field($orderModel, 'payment_method', ['template'=>'{input}','options' =>[
						                        'class' => 'radio-inline ymo-nopadding'
						                  ]])->radio([
						                    	'label' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card'),
						                  		'class' => 'ymo-radio ymo-method',
						                    	'value' => 'credit-card',
						                  		'labelOptions' => [
						                  			'class' => 'ymo-radio-label',
						                  			'style' => 'font-family: \'microsoft_tai_leregular\';'
						                  		]
						                  ]);
						             ?>
                                </li>
                            </ul>
                            
                            <div class="col-md-12 ymo-nopadding">
                            	<?php
					                 echo $form->field($orderModel, 'payment_method', ['template'=>'{error}','options' =>[
					                    'class' => 'radio-inline ymo-nopadding'
					                ]]);
					             ?>
                            </div>
                            
                            <div class="ymo-methods">
                                <li class="col-md-12 ymo-paypal ymo-method-view">

                                </li>
                                <li class="col-md-12 ymo-bank-transfer ymo-method-view ymo-nopadding ymo-Panel">
                                    <div class="col-md-10 ymo-bank-text ymo-nopadding ymo-Panel">
                                        <p>
                                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','
                                                    After payment by bank transfer, please send us by email a
                                                    certificate referring the following order identification number:
                                                    ID')?> 149986
                                        </p>
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        <div class="col-md-12 ymo-important ymo-nopadding ymo-Panel">
                                            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('arrow-order.png','img') ?>" alt="...">
                                            <p>
                                                (1) <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password')?>
                                            </p>
                                        </div>
                                    </div>
                                    <ul class="col-md-8 ymo-bank-details ymo-nopadding ymo-Panel">
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','NIB:')?></span> XXX XXXX XXXXXXXXX XX
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IBAN:')?></span> XXXX XXXX XXXX XXXX XXXX XXXX X
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','BIC/END SWIFT:')?></span> BESCPTPL
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Name:')?></span> Ymocard, LLC
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Banco:')?></span> Banco XPTO
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Conta:')?></span> XXXXX XXXXX XXXXX
                                        </li>
                                    </ul>
                                </li>
                                <li class="col-md-12 ymo-credit-card ymo-method-view ymo-nopadding">
                                
                                	<?= $form->field($orderModel, 'payment_method_credit_card_number', ['template'=>'{label}{input}{error}','options' => [
						                'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
						            ]])->textInput(['class'=>'form-control ymo-input']) ?>
						            
						            <?= $form->field($orderModel, 'payment_method_credit_card_expirate', ['template'=>'{label}{input}{error}','options' => [
							            'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
							        ]])->textInput(['class'=>'form-control ymo-input'])->widget(DatePicker::className(),[
							            'name' => 'payment_method_credit_card_expirate',
							            'type' => DatePicker::TYPE_COMPONENT_APPEND,
							            //'value' => '23-Feb-1982',
							            'pluginOptions' => [
        									//'language' => ymoLangManager::getLangItem(),
							                'autoclose'=>true,
							                'format' => 'mm/yyyy',
							                'minViewMode' => 1
							            ],
							            'options' => [
							                'class' => 'form-control ymo-input'
							         ]]);
							        ?>
							        
                                    <div class="col-md-12 ymo-nopadding">
                                    
	                                    <?= $form->field($orderModel, 'payment_method_credit_card_security', ['template'=>'{label}{input}{error}','options' => [
							                'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
							            ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                        
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        <div class="col-md-12 ymo-important ymo-nopadding ymo-Panel">
                                            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('arrow-order.png','img') ?>" alt="...">
                                            <p>
                                                (1) <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password')?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            
							<?php
                            echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),'/site/order-signup?step=OrderCard',[
                                'class' => 'col-md-3 btn ymo-btn-dark-pink',
                                'style' => 'margin-right: 15px;'
                            ]);
                            ?>
                            <?php
                            echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
                                'class' => 'col-md-3 btn ymo-btn-dark-pink',
                            ]);
                            ?>
                            
                        </div>
                    </div>
                    <!--End ymo payment method-->

                <?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
				<!--form-->
			</div>
		</div>
		<?php echo $this->render('info-card') ?>
	</div>
</div>