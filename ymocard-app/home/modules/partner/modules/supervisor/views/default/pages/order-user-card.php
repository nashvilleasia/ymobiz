<?php 

use mcms\isloading\Isloading;
use yii\helpers\ArrayHelper;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use yii\helpers\Json;
use kartik\widgets\DatePicker;
use kartik\popover\PopoverX;
use common\models\forms\ymoPartnerNewCardHolderForm;

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

$shippingCheck = false;
if(@Yii::$app->session['steps']['OrderSignup']['ymoClients']['shipping_shoice']==1){
	$shippingCheck = "
		classShippingCheck.show();
   		classShippingCheck.find(':input').prop('disabled', false);
	";
}else{
	$shippingCheck = "
		classShippingCheck.hide();
   		classShippingCheck.find(':input').prop('disabled', true);
	";
}

$view->registerJs("

	var formOrderModel = jQuery('form#OrderPayment');
		
	var shippingCheck = jQuery('input[data-name=\"other-shipping-address\"]');
    var classShippingCheck= jQuery('.ymo-new-address');

	$shippingCheck	
		
	shippingCheck.click(function(){
		if(jQuery(this).is(':checked')){
			classShippingCheck.show();
            classShippingCheck.find(':input').prop('disabled', false);
		}else{
			classShippingCheck.hide();
            classShippingCheck.find(':input').prop('disabled', true);
		}
	});	

");

$orderModel = new ymoPartnerNewCardHolderForm();
$orderModel->scenario = 'NewCardHolder';

?>

<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-Panel">
            <?php echo $this->render('card-table') ?>
            <div class="col-md-6 ymo-column-right ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-card-order ymo-nopadding ymo-Panel">

<!--form-->
<?php

	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
	    'id' => 'PartnerNewCardHolder',
	    'action' => '/partner-supervisor/new-card',
	    'model' => $orderModel,
	    'pluginOptions' => [
	        'dataType' => 'json',
	        'resetForm' => false,
	    	'data' => [
	    		'userid' => Yii::$app->request->get('userid')
	    	]	
	    ],
	    'customCallbacks' => [
	        'complete' => new \yii\web\JsExpression("
	             var obj = JSON.parse(event.responseText);
	             if(obj.status === 200){
	        		console.log(obj.message);
	        		".Isloading::widget([
	        			'id' => 'response-partner-new-cardholder',
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
		        <div class="col-md-12 checkbox ymo-terms ymo-group">
		            <?= $form->field($orderModel, 'shipping_choice', ['template'=>'{input}{label}'])->checkbox([
		            		'data-name' => 'other-shipping-address',
		            		'class' => 'col-md-12 ymo-nopadding ymo-group ymo-checkbox',
		            		'uncheck'=>0,
		            ]) ?>
		        </div>
                <div class="col-md-12 ymo-new-address" style="display: none;">
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