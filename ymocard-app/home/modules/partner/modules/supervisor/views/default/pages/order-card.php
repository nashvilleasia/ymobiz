<?php

use kartik\widgets\DatePicker;
use mcms\isloading\Isloading;
use yii\web\JsExpression;
use ymoext\ymoExt;
use yii\web\Session;
use ymobiz\components\ymoArray;
use yii\helpers\ArrayHelper;

$view = Yii::$app->getView();
$view->registerJs("
    var formOrderModel = jQuery('form#OrderCard');
");

$orderModel->scenario = 'OrderCard';

?>

            <!--form-->
                <?php

					$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
					    'id' => 'orderCard',
					    'action' => '/partner-supervisor/order-signup?step=OrderCard',
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
					        		console.log(obj.message);
					        		".Isloading::widget([
					        			'id' => 'response-order-card',
					        			'pluginOptions' => [
											'text' => Yii::t('app','Next step, wait...')
										],	
					        			'response' => new \yii\web\JsExpression('window.location = obj.redirect;')
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

                    <!--ymo-card-form-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Compliance') ?>
                        </h2>
                        <div class="col-md-12 ymo-nopadding ymo-Panel">
                        
                        	<div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                        		<p class="ymo-text-a">
                                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','id document <span>(such as national id card, passport or driver licence)</span>') ?>
                                    <span class="badge ymo-badge-b">?</span>
                                </p>
                                <p class="ymo-text-a">
                                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','proof of residence <span>(such as, power or phone bil)</span>') ?>
                                    <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                </p>
                                <p class="ymo-text-a">
                                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(If you hare a Company add “Certificate of incorporation” and “Proof of Residence”') ?>
                                    <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                </p>
						        <?php
						        //echo $form->field($orderModel,'card_compliance')->fileInput();
						        
						        echo $form->field($orderModel,'card_compliance[]', ['template'=>'{input}'])->widget(\kartik\widgets\FileInput::classname(), [
						            'options' => [
						                'accept' => 'any/*',
						                'multiple'=>true,
						            ],
						            'pluginOptions' => [
						                'showPreview' => false,
						                'showCaption' => false,
						                'showUpload' => false,
						                'elCaptionText' => '#OrderCardCaption',
						                'browseClass' => 'col-md-4 ymo-btn-upload',
						                'removeClass' => 'ymo-btn-upload input-upload-espace',
						                'browseIcon' => '',
						                'removeIcon' => '',
						                'browseLabel' =>  'Upload'
						            ]
						        ]);
						        
						        echo '<span id="OrderCardCaption" class="text-success upload-caption" style="margin-top: 0px;"></span>';
						        echo $form->field($orderModel,'card_compliance', ['template'=>'{error}']);
						        
						        ?>
						    </div>
						    
						    <div class="col-md-12  ymo-nopadding ymo-card-form" style="margin: 7px 0px 7px 0px;">
								<?php 
								       
									   	   $steps = Yii::$app->session->get('steps');
									       
									       if(\yii\helpers\ArrayHelper::getValue($steps,'OrderFiles'))
									       {
									       		$ymoClientsFiles = \yii\helpers\ArrayHelper::getValue($steps,'OrderFiles');
									       
									       		echo ymoExt::widget([
									       			'plugin' => 'previewFile',
									       			'pluginOptions' => 	[
									       				'url' => '/site/delete-file',
									       				'route' => '/site/display-document',
									       				'files' => $ymoClientsFiles['card_compliance'],
									       			]
									       		]);
									        }
								       ?>
							</div>
                            
                            <?php
                            echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),'/partner-supervisor/order-signup?step=OrderSignup',[
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
                    <!--ymo-card-form-->

                <?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
                <!--form-->