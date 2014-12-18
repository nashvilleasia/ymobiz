<?php 

use mcms\bootstrapwizard\BootstrapWizard;
use yii\web\JsExpression;
use kartik\widgets\ActiveForm;
use common\models\forms\ymoPreOrder;
use ymobiz\components\ymoTools;
use yii\helpers\Html;
use ymobiz\models\common\ymoBusinessAreas;
use yii\helpers\ArrayHelper;
use ymobiz\models\common\ymoCountries;
use mcms\isloading\Isloading;

$register = new ymoPreOrder();
$register->setScenario('PreOrderClient');

echo BootstrapWizard::widget([
	'id' => 'wizard-pre-order',	
	'form' => 'PreOrderForm',
	'model' => $register,
	'validation' => true,	
	'options' => [
		'nextSelector' => '.button-next', 
		'previousSelector' => '.button-previous'
	],
	'callbacks' => new JsExpression("
	")			
]);

?>

<?php 

$view = Yii::$app->getView();

$view->registerJs("
	var preOrderModel = $('#load-modal-register');	
		
	preOrderModel.on('shown.bs.modal', function (e) {
	  	var emailPreOrder = jQuery(document).find('.email-pre-order')
		preOrderModel.find('.put-preorder-email').val(emailPreOrder.val());
		emailPreOrder.val('');
	})
");

?>

<?php $form = \mcms\ajaxform\AjaxActiveFormOne::begin([
    'id' => 'PreOrderForm',
    'action' => '/site/pre-order',
    'model' => $register,
    'pluginOptions' => [
		'dataType' => 'json',
		'resetForm' => false,
	],
	'customCallbacks' => [
	'complete' => new \yii\web\JsExpression("
		var obj = JSON.parse(event.responseText);
		if(obj.status === 200){
			".Isloading::widget([
				'id' => 'response-contact-us',
				'pluginOptions' => [
					'text' =>Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','Sending, wait...')
				],	
				'response' => new \yii\web\JsExpression('
					jQuery("#load-modal-contact-us").modal("hide"); 
					jQuery(".ymo-json-response").html(obj.content);  
					$.isLoading("hide");
				')
			])."
			}else if(obj.status === 500){
				jQuery('.ymo-json-response').html(obj.content);;
			}
			return false;
		")],
		'loadingOptions' => "
		{
			 text: '".Yii::t('app','Loading')."',
			'class': \"fa fa-cog fa-spin fa-lg\",
			'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
	    }"
	]);
?>
<div id="wizard-pre-order">
<!--<div class="modal-dialog ymo-popups-md"> -->
<!-- <div class="modal-content"> -->
	    
				
	      
				<div class="col-md-12 modal-body ymo-nopadding">
					<div class="col-md-12 ymo-popup-container ymo-nopadding">
				        	
				    	<div class="navbar" style="min-height: 0px;margin-top: -22px;">
						  <div class="navbar-inner">
						    <div class="container" style="display: none;">
								<ul>
								  	<li><a href="#tab1" data-toggle="tab"></a></li>
									<li><a href="#tab2" data-toggle="tab"></a></li>
								</ul>
						 	</div>
						  </div>
						</div>
						
						<div class="tab-content">
							
						    <div class="ymo-popup-account tab-pane" id="tab1">
						    
						   		<div class="col-md-12 modal-header ymo-nopadding">
							        <div class="col-md-12 ymo-popup-header ymo-nopadding">
				        				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','app','close')?></span></button>
				        				<h4 class="modal-title ymo-popup-title" style="font-size: 1.50em;text-align: left;"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','app','register')?></h4>
							        </div>
								</div>
								
						    	<div class="col-md-6 ymo-column-left ymo-nopadding">
						    	
						    		<?= $form->field($register, 'user_fname', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-6 form-group ymo-input-left ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
	                            	
			                        <?= $form->field($register, 'user_lname', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-6 form-group ymo-input-right ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
				            		
			                        <?= $form->field($register, 'user_email', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control put-preorder-email']) ?>
			                        
			                        <?= $form->field($register, 'user_password', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->passwordInput(['class'=>'popup-input form-control']) ?>
				            		
			                        <div class="col-md-12 form-group ymo-nopadding">
					      				
					      				<?=Html::activeLabel($register, 'user_dob');?>
					      				
					      				<?=$form->field($register, 'user_dob_day', ['template'=>'{input}{error}','options' => [
								            'class' => 'col-md-4 ymo-day ymo-nopadding',
								        ]])->dropDownList(ymoTools::getOrderDay(),[
								            'class' => 'form-control',
								        ]);?>
								        
								        <?=$form->field($register, 'user_dob_month', ['template'=>'{input}{error}','options' => [
								            'class' => 'col-md-4 ymo-month ymo-nopadding',
								        ]])->dropDownList(ymoTools::getOrderMonth(),[
								            'class' => 'form-control',
								        ]);?>
								        
								        <?=$form->field($register, 'user_dob_year', ['template'=>'{input}{error}','options' => [
								            'class' => 'col-md-4 ymo-year ymo-nopadding',
								        ]])->dropDownList(ymoTools::getOrderYear(),[
								            'class' => 'form-control',
								        ]);?>
				                        
			                        </div>
			                        
				            	</div>
				            	
				            	<div class="col-md-6 ymo-column-center ymo-nopadding">
				            	
				            		<ul class="radio-group list-inline">
            							<li style="width: 100%;float: left;">
            								<?php $register->user_gender = 'male';?>
							            	<?= $form->field($register, 'user_gender', ['template'=>'{input}{error}','options' =>[
							                    'class' => 'col-md-12 ymo-nopadding',
							                ]])->radioList($register->genderForm, [
							                    'inline'=>true,
												'itemOptions' => [
								            		'class' => 'ymo-radio',
								            	],
							                ]);?>
										</li>
									</ul>
				            		
			                        <?= $form->field($register, 'user_repeat_email', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control put-preorder-email']) ?>
			                        
			                        <?= $form->field($register, 'user_repeat_password', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->passwordInput(['class'=>'popup-input form-control']) ?>
			                        
			                    </div>
					      			
					      		<div class="col-md-12 ymo-column-right ymo-nopadding" style="margin-bottom: 30px;">
					      		
					      			 <div class="col-md-5 checkbox ymo-group ymo-nopadding">
							            <?= $form->field($register, 'user_terms', ['template'=>'{input}{label}'])->checkbox([
							            		'class' => 'col-md-12 ymo-nopadding ymo-group ymo-checkbox',
							            		'uncheck'=>0,
							            		'label' => Yii::t('app','i accept ymobiz ') . \yii\helpers\Html::a(Yii::t('app','terms&conditions'), ['#'],['data-action' => 'terms']) . '.'
							            ]) ?>
							            
							            <?= $form->field($register, 'user_terms', ['template'=>'{error}'])->checkbox() ?>
							        </div>
							        
							        <div class="col-md-6 ymo-nopadding" style="float: right;">
								         <ul class="radio-group list-inline ymo-nav-right" style="width: 100%; margin-top: -10px;">
		                                	<p style="float: left;">subscribe newsletter?</p>
	            							<li style="float: left;">
	            								<?php $register->user_newsletter = 'yes';?>
								            	<?= $form->field($register, 'user_newsletter', ['template'=>'{input}{error}','options' =>[
								                    'class' => 'col-md-12 ymo-nopadding',
								                ]])->radioList($register->newsletterForm, [
								                    'inline'=>true,
													'itemOptions' => [
									            		'class' => 'ymo-radio',
									            	],
								                ]);?>
											</li>
										</ul>
									</div>
									
				                </div>	
				                
						    </div>
						    
						    <div class="ymo-popup-company tab-pane" id="tab2">
						    
						   		<div class="col-md-12 modal-header ymo-nopadding">
							        <div class="col-md-12 ymo-popup-header ymo-nopadding">
				        				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','app','close')?></span></button>
				        				<h4 class="modal-title ymo-popup-title" style="font-size: 1.50em;text-align: left;"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','app','register your company')?></h4>
							        </div>
								</div>
								
						      	<div class="col-md-6 ymo-column-left ymo-nopadding">
						      	
						      		<?= $form->field($register, 'company_name', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
				            		
					      			<?= $form->field($register, 'company_address', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-6 form-group  ymo-input-left ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
	                            	
	                          		<?= $form->field($register, 'company_city', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-6 form-group ymo-input-right ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
	                            	
	                          		<?= $form->field($register, 'company_email', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
				            		
								</div>
		      		
					      		<div class="col-md-6 ymo-column-right ymo-nopadding">
					      		
					      			<?= $form->field($register, 'company_taxcode', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-6 form-group  ymo-input-left ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
				            		
				                	<div class="col-md-6 form-group ymo-input-right ymo-nopadding">
				                	
				                		<?=Html::activeLabel($register, 'company_business_area');?>
					      				
					      				<?=$form->field($register, 'company_business_area', ['template'=>'{input}{error}','options' =>[
					      					'style' => 'margin-bottom: 0px;'	
					      				]])->dropDownList(ArrayHelper::merge([null=>Yii::$app->getModule('site')->ymoTranslate->t('site','app','select a area')],ArrayHelper::map(ymoBusinessAreas::find()->all(),'name','name')),[
								            'class' => 'form-control',
								        ]);?>
								        
				                   	</div>
				                   	
				                   	<?= $form->field($register, 'company_zipcode', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-6 form-group  ymo-input-left ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
				            		
				                    <div class="col-md-6 form-group ymo-input-right ymo-nopadding">
				                    
					      				<?=Html::activeLabel($register, 'company_country');?>
					      				
					      				<?=$form->field($register, 'company_business_area', ['template'=>'{input}{error}','options' =>[
					      					'style' => 'margin-bottom: 0px;'	
					      				]])->dropDownList(ArrayHelper::merge([null=>Yii::$app->getModule('site')->ymoTranslate->t('site','app','select a country')],ArrayHelper::map(ymoCountries::find()->all(),'id','name')),[
								            'class' => 'form-control',
								        ]);?>
								        
				                    </div>
				                    
				                    <?= $form->field($register, 'company_phone', ['template'=>'{label}{input}{error}','options' => [
				                		'class' => 'col-md-12 form-group ymo-nopadding'
				            		]])->textInput(['class'=>'popup-input form-control']) ?>
				            		
				                </div>
				                
						    </div>
							
						</div>
				        	
					</div>
				</div>
	      
			    <div class="col-md-12 modal-footer ymo-nopadding">
			      	<div class="col-md-12 ymo-popup-footer ymo-nopadding" style="text-align: right;">
			      		<hr />
			      		<button class='btn ymo-blue-gradient button-finish' style="width: 130px;margin-top: 15px;">done</button>
					    <a href="javascript:;" class='btn ymo-blue-gradient button-next' style="width: 130px;margin-top: 15px;">next</a>
						<a href="javascript:;" class='btn ymo-blue-gradient button-previous pull-left' style="width: 130px;margin-top: 15px;">back</a>
			        </div>
			    </div>
	      
<!--</div> /.modal-content -->
<!--</div> /.modal-dialog -->
</div>

 <?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>