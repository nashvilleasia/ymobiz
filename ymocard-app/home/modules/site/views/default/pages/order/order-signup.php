<?php

use kartik\widgets\DatePicker;
use mcms\isloading\Isloading;
use yii\web\JsExpression;
use yii\web\Session;
use ymobiz\components\ymoArray;
use yii\helpers\ArrayHelper;
use ymobiz\components\FormWizard;
use yii\captcha\Captcha;

$orderModel->scenario = 'OrderSignup';

$view = Yii::$app->getView();

if(@ArrayHelper::getValue(Yii::$app->session['steps']['OrderSignup']['ymoClients'],'countrynat_id')=='30'){
	$brazilCheck = "
		brazilCheck.css('display','block');
   		brazilCheck.find(':input').prop('disabled', false);
	";
}else{
	$brazilCheck = "
		brazilCheck.css('display','none');
   		brazilCheck.find(':input').prop('disabled', true);
	";
}

if(@ArrayHelper::getValue(Yii::$app->session['steps']['OrderSignup']['ymoClients'],'shipping_shoice')==1){
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

    var formOrderModel = jQuery('form#OrderSignup');

    var countryCheck = jQuery('select[data-id=\"countryCheck\"]');
    var othersCountriesCheck = jQuery('#others-country-docs');
    var brazilCheck = jQuery('#brazil-docs');

	$brazilCheck

    countryCheck.change(function(){
        if(this.value==='30'){
            brazilCheck.css('display','block');
            othersCountriesCheck.css('display','none');
            brazilCheck.find(':input').prop('disabled', false);
        }else{
            brazilCheck.css('display','none');
            othersCountriesCheck.css('display','block');
            brazilCheck.find(':input').prop('disabled', true);
        }
    });
		
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

?>

<div class="col-md-12 ymo-nopadding">
    <?php
    if(ArrayHelper::getValue(Yii::$app->session['steps'],'OrderSignup')){
    	echo '<pre>';
    	print_r(Yii::$app->session['steps']['OrderSignup']);
    	echo '</pre>';
    }
    ?>
</div>

<div class="col-md-12 ymo-body ymo-Panel">
<div class="col-md-7 ymo-nopadding ymo-Panel">

<?php echo $this->render('order-text') ?>

<div class="col-md-10 col-md-offset-1 ymo-nopadding ymo-Panel">
<?php

$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
    'id' => 'OrderSignup',
    'action' => '/site/order-signup?step=OrderSignup',
    'options' => [
        'enctype'=>'multipart/form-data'
    ],
	//'enableAjaxValidation' => true,	
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
        		jQuery('.form-response').html(obj.content);
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
<div class="form-response"></div>

<!--ymo-card-form-->
<div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">

<!--Start for orderModel-->
<div class="orderForms" id="orderModel">

<span class="badge ymo-badge-a">1</span>
<h2 class="ymo-title-b">
    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Personal Details') ?>
</h2>
<p class="ymo-required">
    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(all fields required)') ?>
</p>

<div class="col-md-12 ymo-nopadding">

    <?= $form->field($orderModel, 'ufirstname', ['template'=>'{label}{input}{error}','options' => [
        'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
    ]])->textInput(['class'=>'form-control ymo-input']) ?>

    <?= $form->field($orderModel, 'ulastname', ['template'=>'{label}{input}{error}','options' => [
        'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
    ]])->textInput(['class'=>'form-control ymo-input']) ?>

    <div class="col-md-8 form-group ymo-nopadding ymo-birth ymo-group">

        <?= $form->field($orderModel, 'dob', ['template'=>'{label}{input}{error}','options' => [
            'class' => 'col-md-12 ymo-nopadding ymo-group'
        ]])->textInput(['class'=>'form-control ymo-input'])->widget(DatePicker::className(),[
                'name' => 'dob',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                //'value' => '23-Feb-1982',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-M-yyyy'
                ],
                'options' => [
                    'class' => 'form-control ymo-input'
                ]]);
        ?>
    </div>
    <div class="col-md-12 ymo-nopadding form-group ymo-group">
        <div class="col-md-12 ymo-nopadding">
        </div>
        <ul class="col-md-12 list-inline ymo-nopadding">
            <li>
            	<?php
            	
                echo $form->field($orderModel, 'gender', ['template'=>'{label}','options' =>[
                    'class' => 'col-md-12 ymo-nopadding ymo-group',
                ]]);
                
                if(!@ArrayHelper::getValue(Yii::$app->session['steps']['OrderSignup']['ymoClients'],'gender')){
                	$orderModel->gender = 0;
                }
                
                echo $form->field($orderModel, 'gender', ['template'=>'{input}{error}','options' =>[
                    'class' => 'col-md-12 ymo-nopadding ymo-group',
                ]
                ])->radioList($orderModel->genderForm, [
                    'inline'=>true,
	            	'class' => 'radio-name ymo-nopadding custom-radio',	
					'itemOptions' => [
	            		'class' => 'ymo-radio',
						'labelOptions' => [
	            			'class' => 'ymo-radio-label',
	            		],
	            	],
                ]);
                
                ?>
            </li>
        </ul>
    </div>
    <div class="col-md-8 form-group ymo-nopadding ymo-group">

        <?=$form->field($orderModel, 'countryob_id', ['template'=>'{label}{input}{error}','options' => [
            'class' => 'col-md-12 ymo-nopadding ymo-group'
        ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                'class' => 'form-control ymo-input'
            ]);?>

    </div>
    <div class="col-md-8 form-group ymo-nopadding ymo-group">

        <?=$form->field($orderModel, 'countrynat_id', ['template'=>'{label}{input}{error}','options' => [
            'class' => 'col-md-12 ymo-nopadding ymo-group',
        ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                'class' => 'form-control ymo-input',
                'data-id' => 'countryCheck'
            ]);?>

    </div>

    <div id="others-country-docs">
        <div class="col-md-12 ymo-nopadding form-group ymo-group">
            <ul class="col-md-12 list-inline ymo-nopadding">
                <li>
                    <?php
                    
                    if(!@ArrayHelper::getValue(Yii::$app->session['steps']['OrderSignup']['ymoClients'],'countrydoctype_id')){
                    	$orderModel->countrydoctype_id = 1;
                    }
                    
                    echo $form->field($orderModel, 'countrydoctype_id', ['template'=>'{label}','options' =>[
                    	'class' => 'col-md-12 ymo-nopadding ymo-group',
                    ]]);
                    
                    echo $form->field($orderModel, 'countrydoctype_id', ['template'=>'{input}{error}','options' =>[
                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                    ]])->radioList($orderModel->doctypes, [
                    	'inline'=>true,
		            	'class' => 'radio-name ymo-nopadding custom-radio',	
						'itemOptions' => [
		            		'class' => 'ymo-radio',
							'labelOptions' => [
		            			'class' => 'ymo-radio-label',
		            		],
		            	],
                    ]);
                    
                    ?>
                </li>
            </ul>
        </div>
    </div>

    <div id="brazil-docs">
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'brazil_rg', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'brazil_cpf', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
    </div>

</div>
<!--ymo-card-form-->

<!--ymo-card-form-->
<div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
    <span class="badge ymo-badge-a">2</span>
    <h2 class="ymo-title-b">
        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Account Details') ?>
    </h2>

    <div class="col-md-12 ymo-nopadding ymo-Panel">
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'email', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12  ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'repeat_email', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12  ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-Panel">
            <?= $form->field($orderModel, 'password', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->passwordInput(['class'=>'form-control ymo-input','maxlength'=>16]) ?>
        </div>
        <div class="col-md-4 ymo-important ymo-nopadding ymo-group ymo-Panel">
            <a href="#"><span class="badge ymo-badge-b">?</span></a>
            <div class="col-md-12 ymo-text ymo-Panel">
                <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('arrow-order.png','img') ?>" alt="...">
                <p>
                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(1) IMPORTANT: you will need your password in order to access your online account.') ?>
                </p>
            </div>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-Panel">
            <?= $form->field($orderModel, 'repeat_password', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->passwordInput(['class'=>'form-control ymo-input','maxlength'=>16]) ?>
        </div>
    </div>
</div>
<!--ymo-card-form-->

<!--ymo-card-form-->
<div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
    <span class="badge ymo-badge-a">3</span>
    <h2 class="ymo-title-b">
        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Contact Details') ?>
    </h2>

    <div class="col-md-12 ymo-nopadding">
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'address', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textarea(['class'=>'form-control ymo-input','rows'=>'10','cols'=>'30']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'city', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'zipcode', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'state', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?=$form->field($orderModel, 'countries_id', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                    'class' => 'form-control ymo-input'
                ]);?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'phone', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>
        <div class="col-md-8 form-group ymo-nopadding ymo-group">
            <?= $form->field($orderModel, 'mobile', ['template'=>'{label}{input}{error}','options' => [
                'class' => 'col-md-12 ymo-nopadding ymo-group'
            ]])->textInput(['class'=>'form-control ymo-input']) ?>
        </div>

        <div id="shipping-info">
            <div class="col-md-12 ymo-nopadding ymo-group ymo-Panel">
		        <div class="col-md-12 checkbox ymo-terms ymo-group">
		            <?= $form->field($orderModel, 'shipping_shoice', ['template'=>'{input}{label}'])->checkbox([
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
                        <?= $form->field($orderModel, 'shipping_state', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                        <?=$form->field($orderModel, 'shipping_country', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group',
                        ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                            'class' => 'form-control ymo-input',
                        ]);?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ymo-text ymo-group">
            <p>
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Please read and click each box to complete your resgistration:') ?>
            </p>
        </div>
        <div class="col-md-12 checkbox ymo-terms ymo-group">
            <?= $form->field($orderModel, 'termsconditions', ['template'=>'{input}{label}'])->checkbox([
            		'class' => 'col-md-12 ymo-nopadding ymo-group ymo-checkbox',
            		'uncheck'=>0,
            		'label' => Yii::t('app','I agree to the ') . \yii\helpers\Html::a(Yii::t('app','Terms and Conditions'), ['#']) . '.'
            ]) ?>
            
            <?= $form->field($orderModel, 'termsconditions', ['template'=>'{error}'])->checkbox() ?>
        </div>
        
		<div class="col-md-12 ymo-text ymo-group">
             <?= $form->field($orderModel, 'verifyCode')->widget(Captcha::className(), [
                  'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>
        </div>  
              
    </div>
</div>
</div>
<!--End for orderModel-->

<?php
echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
    'class' => 'col-md-3 btn ymo-btn-dark-pink btnNext',
]);
?>

</div>
<!--ymo-card-form-->

<?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
<!--form-->

</div>
</div>

<?php echo $this->render('info-card') ?>

</div>
</div>