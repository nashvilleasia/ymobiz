<?php 

use common\models\forms\ymoNewCardHolderForm;
use mcms\isloading\Isloading;
use yii\helpers\ArrayHelper;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use yii\helpers\Json;
use kartik\widgets\DatePicker;
use kartik\popover\PopoverX;

$view = Yii::$app->getView();

$countries = [];
foreach (ymoCountries::find()->all() as $value){
	$countries[] = [
		'country' => $value->id,
		'code' => $value->code,
		'code1' => $value->code1,
		'phone_code' => $value->phone_code
	];
}
 
$states = [];
foreach (ymoStates::find()->all() as $value){
	$states[] = [
		'country' => $value->country,
		'code' => $value->id,
		'name' => $value->name
	];
}

$view->registerJs("
	var ymoCountries = ".Json::encode($countries).";
	var ymoStates = ".Json::encode($states).";
");

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
$orderModel->scenario = 'NewCardHolder';

?>
<?php $this->title = Yii::$app->getModule('site')->ymoTranslate->t('cardholder','form','Order Card - ' . Yii::$app->name) ?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-Panel">
            <?php echo $this->render('card-table') ?>
            <div class="col-md-6 ymo-column-right ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-card-order ymo-nopadding ymo-Panel">

<!--form-->
<?php

	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
	    'id' => 'NewCardHolderUser',
	    'action' => '/card-holder/new-card',
	    'model' => $orderModel,
	    'pluginOptions' => [
	        'dataType' => 'json',
	        'resetForm' => false,
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
			
					<!--ymo-card-form-->
                    <div class="col-md-12 ymo-card-form ymo-group ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Card Name') ?>
                        </h2>
                        <p class="ymo-required">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(all fields required)') ?>
                        </p>
                        <div class="col-md-12 ymo-nopadding">
                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
						        <?=$form->field($orderModel, 'card_title', ['template'=>'{label}{input}{error}','options' => [
						            'class' => 'col-md-12 ymo-nopadding ymo-group',
						        ]])->dropDownList(\yii\helpers\ArrayHelper::map(ymobiz\components\ymoTools::Titles(), 'id', 'name'),[
						                'class' => 'form-control ymo-input',
						                'data-id' => 'countryCheck'
						            ]);?>
						    </div>
                            
                             <?= $form->field($orderModel, 'card_name', ['template'=>'{label}{input}{error}','options' => [
						        'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
						    ]])->textInput(['class'=>'form-control ymo-input'])->label(Yii::t('app','card name <span>(max. 20 characters)</span>')) ?>
						    
                        </div>
                    </div>
                    <!--ymo-card-form-->
                    
                    

        <div id="shipping-info">
            <div class="col-md-12 ymo-nopadding ymo-group ymo-Panel">
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Shipping Details') ?>
                        </h2>
                <div class="col-md-12 ymo-new-address">
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                        <?= $form->field($orderModel, 'shipping_firstname', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                        <?= $form->field($orderModel, 'shipping_lastname', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                        <?= $form->field($orderModel, 'shipping_address', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textarea(['class'=>'form-control ymo-input','rows'=>'10','cols'=>'30']) ?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                        <?= $form->field($orderModel, 'shipping_city', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                        <?= $form->field($orderModel, 'shipping_zipcode', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                    	<?php 
						if(!@ArrayHelper::getValue(Yii::$app->session['steps']['OrderSignup']['ymoClients'],'shipping_country')){
							$orderModel->shipping_country =  \ymobiz\models\common\ymoCountries::findUserByCountry();
						}
						?>
                        <?=$form->field($orderModel, 'shipping_country', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group',
                        ]])->dropDownList($orderModel->getListCountries(),[
                            'class' => 'form-control ymo-input',
                        ]);?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group" id="shipping_state_countriesid">
                        <?= $form->field($orderModel, 'shipping_state', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Start ymo payment method-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
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
                                    <ul class="col-md-8 ymo-bank-details ymo-nopadding ymo-Panel">
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
        </div>
    </div>
</div>