<?php 

use mcms\isloading\Isloading;
use mcms\maskmoney\MaskMoney;
use yii\helpers\Inflector;
use common\models\grid\ymoCardsPartner;
use common\models\forms\ymoNewCardHolderForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\popover\PopoverX;

$model = new ymoCardsPartner();
$viewCards = $model->viewPartnersCard();$view = Yii::$app->getView();

$view = Yii::$app->getView();

$methodDisplay = false;
if(@ArrayHelper::getColumn(Yii::$app->session['steps'],'OrderPayment')){
	$methodCheck = @ArrayHelper::getValue(Yii::$app->session['steps']['OrderPayment']['ymoClients'],'payment_method');
	if($methodCheck){
		$methodDisplay = "
		displayMethods.hide();
		classMethods.find('.ymo-$methodCheck').show();
		";
	}
}

$view->registerJs("

		var formOrderModel = jQuery('form#OrderPayment');

		var buttonsMethods = jQuery('.ymo-method,input[name=ymo-method]');
		var classMethods = jQuery('.ymo-methods');
		var displayMethods = classMethods.find('li.ymo-method-view');

		displayMethods.find(':input').prop('disabled', true);

		$methodDisplay

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

$orderModel = new ymoNewCardHolderForm;
$orderModel->scenario = 'PaymentCardHolder';

?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-Panel">

        <?php echo $this->render('payment-table') ?>

            <!-- Start ymo-column-right-->
            <div class="col-md-6 ymo-column-right ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-partner ymo-nopadding ymo-Panel">
                    <h2 class="ymo-title-a">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment details') ?>
                    </h2>
                    
                    <?php
					if($viewCards->one()!=false){
						
						$cards = $viewCards->one();
						
					?>

                    <!--Start ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','nr. of pending ymocard payments: ') ?></strong>
                                <?=$viewCards->count()?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','registered between: ')?></strong>
                                <p><?=Yii::$app->formatter->asDatetime($model->find()->orderBy('created_at asc')->one()->created_at,'php:d.m.Y H:m')?></p>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','and: ')?></strong>
                                <p><?=Yii::$app->formatter->asDatetime($model->find()->orderBy('created_at desc')->one()->created_at,'php:d.m.Y H:m')?></p>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','ymocard status: ') ?></strong>
                                <?=Yii::$app->getModule('site')->ymoTranslate->t('site','app','pendent')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','total payment amount : ') ?></strong>
                                <?=Yii::$app->formatter->asCurrency($cards->plafond)?> <span style="margin-left: 4px;"><?php echo Yii::$app->formatter->currencyCode ?></span>
                            </li>
                        </ul>
                    </div>
                    <!--End ymo-card-details-->

                    <!--ymo-card-form-->
                    <div class="col-md-12 ymo-nopadding ymo-Panel" style="margin-top: 20px;">
                        <div class="col-md-12 ymo-nopadding">

                            <!--form-->
                           <?php

							$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
							    'id' => 'NewCardHolder',
							    'action' => '/partner-account/payment-card',
							    'model' => $orderModel,
							    'pluginOptions' => [
							        'dataType' => 'json',
							        'resetForm' => false,
							    	'data' => [
							    		'cardid' => $cards->id
							    	]	
							    ],
							    'customCallbacks' => [
							        'complete' => new \yii\web\JsExpression("
							             var obj = JSON.parse(event.responseText);
							             if(obj.status === 200){
							        		console.log(obj.message);
							        		".Isloading::widget([
							        			'id' => 'response-new-cardholder',
							        			'pluginOptions' => [
													'text' => Yii::t('app','Generate your new card')
												],	
							        			'response' => new \yii\web\JsExpression('
							        				jQuery(".ymo-json-response").html(obj.content);
													$.isLoading("hide");
							        			')
											])."
							             }else if(obj.status === 500){
							        		jQuery('.ymo-json-response').html(obj.content);
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
						
                     <div class="col-md-12 ymo-nopadding ymo-Panel">
                     
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Payment Method') ?>
                        </h2>

                        <div class="col-md-12 ymo-group ymo-nopadding" style="margin-left: 15px;">
                        
                            <div class="col-md-12 ymo-payment ymo-nopadding">
                                <?php
							        echo $form->field($orderModel, 'payment_method', ['template'=>'{label}','options' =>[
							        	'class' => 'radio-inline ymo-nopadding'
							       ]]);
							    ?>
                            </div>
                            
                            <ul class="col-md-12 list-inline ymo-Panel ymo-nopadding">
                                
                                <li>
                                <?php 
                                
									if(!@ArrayHelper::getValue(Yii::$app->session['steps']['OrderPayment']['ymoClients'],'payment_method')){
	                					$orderModel->payment_method = 'bank-transfer';
	                					$view->registerJs("classMethods.find('.ymo-bank-transfer').show();");
	                				}
                                
                                	echo $form->field($orderModel, 'payment_method', ['template'=>'{input}{error}','options' =>[
                                		'class' => 'col-md-12 ymo-nopadding ymo-group',
                                		]
                                	])->radioList(ymobiz\models\common\ymoPaymentMethods::getMethods(), [
                                			'inline'=>true,
                                			'class' => 'radio-name ymo-nopadding custom-radio',
                                			'itemOptions' => [
                                			'class' => 'ymo-radio ymo-method',
											'labelOptions' => [
                                				'class' => 'ymo-radio-label',
                                			],
                                		],
                                	]);
                                ?>
                                </li>
                            </ul>
                            
                            <div class="ymo-methods">
                            	<ul class="list-unstyled">
                                <li class="col-md-12 ymo-bank-transfer ymo-method-view ymo-nopadding ymo-Panel">
                                    <div class="col-md-8 ymo-bank-text ymo-nopadding ymo-Panel">
                                        <p>
                                            <?php echo ymobiz\models\common\ymoPaymentMethods::getMethodsByCondition(['name'=>'bank transfer'])->message; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-4 ymo-nopadding">
                                        <?php 
                                        PopoverX::begin([
	                                        'placement' => PopoverX::ALIGN_RIGHT,
	                                        'closeButton' => null,
	                                        'toggleButton' => [
	                                        	'tag' => 'span',
	                                        	'label'=>'?', 'class'=>'badge ymo-badge'
                                        	],
                                        	'pluginOptions' => [
                                        		'trigger' => 'hover'
                                        	]
                                        ]);
                                        echo '<p class="text-justify">'.Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password').'</p>';
                                        PopoverX::end();
                                        ?>
                                    </div>
                                    <ul class="col-md-8 ymo-bank-details ymo-nopadding ymo-Panel list-unstyled">
                                        <li>
                                            <?php echo ymobiz\models\common\ymoPaymentMethods::getMethodsByCondition(['name'=>'bank transfer'])->content; ?>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="col-md-12 ymo-credit-card ymo-method-view ymo-nopadding">
                                
                                	<?= $form->field($orderModel, 'payment_method_credit_card_number', ['template'=>'{label}{input}{error}','options' => [
						                'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
						            ]])->textInput(['class'=>'form-control ymo-input','maxlength'=>16]) ?>
						            
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
							            ]])->textInput(['class'=>'form-control ymo-input','maxlength'=>3]) ?>
                                        
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        <div class="col-md-12 ymo-important ymo-nopadding ymo-Panel">
                                            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('arrow-order.png','img') ?>" alt="...">
                                            <p>
                                                (1) <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password')?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            </div>
                                <?php
						            echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Submit'),[
						                  'class' => 'col-md-3 btn ymo-btn-dark-pink',
						            ]);
						        ?>
						        
						<?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
                            <!--form-->

                        </div>
                    </div>
                    <!--ymo-card-form-->
                    
                   <?php 
						}else{
							echo '<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no registered card').'</li>';	
						}
					?>

                </div>
            </div>
            <!-- End ymo-column-right-->

        </div>
    </div>
</div>