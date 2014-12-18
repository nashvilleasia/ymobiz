<?php 

use common\models\ymoCards;
use mcms\isloading\Isloading;
use mcms\maskmoney\MaskMoney;
use yii\helpers\Inflector;

$model = new ymoCards();
$viewCards = $model->viewCardByClient();

?>

                    <h2 class="ymo-title-a">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card details')?>
                    </h2>
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
<?php
if($viewCards->one()!=false){
	
	$cards = $viewCards->one();
	
?>
<!-- Start ymo-card-details-->
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card name: ')?></strong>
                                <?php echo Inflector::camel2words($cards->title . ' ' . $cards->name) ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card number: ')?></strong>
                                <?php echo ymoCards::hideCardNumber($cards->cardnumber,'3','3') ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card status: ')?></strong>
                                <?php echo $cards->status_code ?>
                            </li>
                            <li>
                                <?php
                        
						       		$plafondModel = new ymoCards;
						       		
			                        echo \mcms\ajaxform\EditableActiveForm::widget([
			                            'id' => 'define-plafond',
			                            'model' => $cards,
				                        'scenario' => 'DefinePlafond',
			                            'formTemplate' => '<span class="form-objects {displaylabel}" id="{formid}" style="float: left; width: auto;">{field}<span class="value-editable" id="{formid}-{fieldid}">{value}</span></span>',
			                            'tagTemplate' => '<strong>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','card authorized plafond: ').'</strong>{activeform}',
			                            'editButtomClass' => 'ymo-btn-logout',
			                            'saveButtomClass' => 'ymo-btn-logout',
			                            'cancelButtomClass' => 'ymo-btn-logout',
			                        	'buttomTemplate' => '{save}{cancel}',
			                        	'buttomOptions' => [
			                        		'style' => 'position: absolute;right: 134px; bottom: -53px;'
			                        	],	
			                            'attributes' => [
			                                'plafond' => [
			                                    'type' => 'field',
			                                	'value' => Yii::$app->formatter->asCurrency($cards->plafond),	
			                                    'options' => [
			                                        'inputType' => 'textInput',
			                                        'fieldOptions' => ['template'=>'{input}{error}'],
			                                        'inputOptions' => [
			                                        	'class'=>'ymo-input form-control',
			                        				],
				                                	'widget' => [
			                                            'class' =>\kartik\money\MaskMoney::classname(),
			                                            'config' => [
			                                            	'options' => [
			                                            		'style' => '
																	font-size: 0.87em;
																	font-family: microsoft_tai_leregular;
																	color: rgb(120, 120, 120);
																	height: 25px;
																	margin-top: -5px;'
			                                    			],	
			                                            	'pluginOptions' => [
															    'prefix' => '$ ',
															    'suffix' => '',
															   	'allowNegative' => false
			                                            	]
														]
			                                        ]
			                                    ],
			                                ],
			                            ],
			                            'activeForm' => [
				                            'class' => 'mcms\ajaxform\AjaxActiveFormOne',
				                            'activeFieldClass' => 'kartik\widgets\ActiveField',
			                                'options' => [
			                                    'action' => '/card-holder/define-plafond?cardid='.$cards->id,
			                                ]
			                            ],
			                        	'customResponse' => new \yii\web\JsExpression("
			                        		var fieldValue = jQuery('#ymocards-plafond').val();	
			                        		$.ajax({
			                        			url: '/card-holder/replace-plafond-value',
			                        			type: 'post',
											    dataType: 'json',
			                        			async: true,
			                        			cache: false,
											    data: {plafondValue : fieldValue},
												complete: function( event ) {
			                        				var obj = JSON.parse(event.responseText);
			                        				var fieldPlafond = jQuery('#define-plafond-ymocards-plafond');
			                        				fieldPlafond.html(obj.plafondValue);
			                        			}
											});	
			                        	")	
			                        ]);
		
		                        ?> <span style="margin-left: 4px;"><?php echo Yii::$app->formatter->currencyCode ?></span>
                            </li>
                        </ul>
                        
                        <?php if($cards->ordersOne->status_emission!='pendent emission'){?>
                        
                        <?php 
                        
				            echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
				            	'id' => ($cards->status_code=='active') ? 'block-ymocard' : 'unblock-ymocard',
				            	'buttonClass' => 'btn ymo-btn-logout',
				            	'name' => Yii::$app->getModule('site')->ymoTranslate->t('site','form',($cards->status_code=='active') ? 'block this ymocard' : 'unblock this ymocard'),
				            	'pluginOptions' => [
				            		'url' => ($cards->status_code=='active') ? '/card-holder/block-ymocard' : '/card-holder/unblock-ymocard',
						            'dataType' => 'json',
						            'resetForm' => false,
				            		'data' => [
				            			'cardid' => "$cards->id",
				            		],
				            	],
				            	'customCallbacks' => [
				            		'complete' => new \yii\web\JsExpression("
										 var obj = JSON.parse(event.responseText);
										 if(obj.status === 200){
											".Isloading::widget([
												'id' => ($cards->status_code=='active') ? 'response-block-ymocard' : 'response-block-ymocard',
												'pluginOptions' => [
													'text' => Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','Verifying your data, please wait...')
												],	
												'response' => new \yii\web\JsExpression('
													jQuery(".ymo-json-response").html(obj.content);
													$.isLoading("hide");
												')
											])."
										}else if(obj.status === 500){
											jQuery('.ymo-json-response').html(obj.content);;
										}
										return false;
									"),
				            	],
				            	'events' => [
				            		'confirmation' => [
				            			'message' => 'Are you sure?',
				            			'error' => 'There was an error!',
				            		]
				            	],
				            ]);
				            
				       ?>
				       
				       <a class="define-plafond-activeform-edit ymo-btn-logout" href="#" style="margin-right: 5px; display: block;"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','define plafond')?></a>
				       <?php } ?>
                    
<?php 
	}else{
		echo '<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no registered card').'</li>';	
	}
?>
                    </div>
                    <!-- End ymo-card-details-->