<?php

use kartik\widgets\DatePicker;

$view = Yii::$app->getView();
$view->registerJs("

    var formOrderSignup = jQuery('#orderSignup');
    var formOrderCard = jQuery('#orderCard');
    var formOrderPayment = jQuery('#orderPayment');

    formOrderCard.css('display','none');
    formOrderPayment.css('display','none');

    var countryCheck = jQuery('select[data-id=\"countryCheck\"]');
    var othersCountriesCheck = jQuery('#others-country-docs');
    var brazilCheck = jQuery('#brazil-docs');
    brazilCheck.css('display','none');
    brazilCheck.find(':input').prop('disabled', true);

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

    var formSteps = jQuery('.orderForms');
    var nextButton = jQuery('.btnNext');
    var finishButton = jQuery('.btnFinish');
    var backButton = jQuery('.btnBack');

    function nextStep(mode,step)
    {
        if(mode==='hide' && step==='next'){
            nextButton.css('display','none');
        }

        if(mode==='show' && step==='next'){
            nextButton.css('display','block');
        }

        if(mode==='hide' && step==='finish'){
            finishButton.css('display','none');
        }

        if(mode==='show' && step==='finish'){
            finishButton.css('display','block');
        }

        if(mode==='hide' && step==='back'){
            backButton.css('display','none');
        }

        if(mode==='show' && step==='back'){
            backButton.css('display','block');
        }

        if(mode==='hide' && step==='all'){
            formSteps.css('display','none');
        }

        if(mode==='hide'){
            jQuery('#'+step).css('display','none');
        }

        if(mode==='show'){
            jQuery('#'+step).css('display','block');
        }

        /*if(step==='back'){
            backButton.css('display','none');
        }else if(step==='orderSignup'){

            jQuery('#'+step).css('display','block');
            backButton.css('display','none');

        }else if(step==='orderCard'){

            formSteps.css('display','none');
            jQuery('#'+step).css('display','block');
            backButton.css('display','block');

        }else if(step==='orderPayment'){

            formSteps.css('display','none');
            jQuery('#'+step).css('display','block');
            backButton.css('display','block');

        }else if(step==='200'){

        }*/

        /*jQuery('.orderForms').css('display','none');
        jQuery('#'+step).css('display','block');

        jQuery('.btnBack').on('click',function(event){
            event.preventDefault();

        });*/
    }

    nextStep('hide','back');
    nextStep('hide','finish');
");

?>
<div class="col-md-12 ymo-body ymo-Panel">
    <div class="col-md-7 ymo-nopadding ymo-Panel">

        <?php echo $this->render('order-text') ?>

        <div class="col-md-10 col-md-offset-1 ymo-nopadding ymo-Panel">
        <?php

        $form = \mcms\ajaxform\AjaxActiveFormOne::begin([
            'id' => 'form-ajax-upload-model',
            'action' => '/site/order-signup',
            'options' => [
                'enctype'=>'multipart/form-data'
            ],
            'pluginOptions' => [
                'dataType' => 'json',
                'resetForm' => false,
            ],
            'customCallbacks' => [
                'complete' => new \yii\web\JsExpression("
                     var obj = JSON.parse(event.responseText);

                     if(obj.status==='orderSignup'){

                        console.log(obj.status);
                        nextStep('hide','all');
                        nextStep('show','orderSignup');
                        nextStep('hide','back');

                     }else if(obj.status==='orderCard'){

                        console.log(obj.status);
                        nextStep('hide','all');
                        nextStep('show','orderCard');
                        nextStep('show','back');
                        backButton.attr('data-formback','orderSignup');

                        backButton.on('click',function(event){
                            event.preventDefault();
                            var stepBack = jQuery(this).attr('data-formback');
                            nextStep('hide','all');
                            nextStep('show',stepBack);
                        });

                     }else if(obj.status==='orderPayment'){

                        console.log(obj.status);
                        nextStep('hide','all');
                        nextStep('show','orderPayment');
                        nextStep('show','back');
                        nextStep('show','next');
                        backButton.attr('data-formback','orderCard');
                        nextStep('hide','finish');

                        backButton.on('click',function(event){
                            event.preventDefault();
                            var stepBack = jQuery(this).attr('data-formback');
                            nextStep('hide','all');
                            nextStep('show',stepBack);
                            nextStep('hide','back');
                            nextStep('hide','next');
                            nextStep('show','finish');
                        });

                     }else if(obj.status===200){

                        console.log('saved');
                        nextStep('hide','all');

                     }
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

                <!--Start for orderSignup-->
                <div class="orderForms" id="orderSignup">

                    <span class="badge ymo-badge-a">1</span>
                    <h2 class="ymo-title-b">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Personal Details') ?>
                    </h2>
                    <p class="ymo-required">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(all fields required)') ?>
                    </p>

                        <div class="col-md-12 ymo-nopadding">

                            <?= $form->field($orderSignup, 'ufirstname', ['template'=>'{label}{input}{error}','options' => [
                                'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
                            ]])->textInput(['class'=>'form-control ymo-input']) ?>

                            <?= $form->field($orderSignup, 'ulastname', ['template'=>'{label}{input}{error}','options' => [
                                'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
                            ]])->textInput(['class'=>'form-control ymo-input']) ?>

                            <div class="col-md-8 form-group ymo-nopadding ymo-birth ymo-group">

                                <?= $form->field($orderSignup, 'dob', ['template'=>'{label}{input}{error}','options' => [
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
                                        <?
                                        $orderSignup->gender = 0;
                                        echo $form->field($orderSignup, 'gender', ['template'=>'{label}{input}{error}','options' =>[
                                                'class' => 'col-md-12 ymo-nopadding ymo-group'
                                            ]
                                        ])->radioList($orderSignup->genderForm, ['inline'=>true,'class'=>'radio-name ymo-nopadding']);
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8 form-group ymo-nopadding ymo-group">

                                <?=$form->field($orderSignup, 'countryob_id', ['template'=>'{label}{input}{error}','options' => [
                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                                    'class' => 'form-control ymo-input'
                                ]);?>

                            </div>
                            <div class="col-md-8 form-group ymo-nopadding ymo-group">

                                <?=$form->field($orderSignup, 'countrynat_id', ['template'=>'{label}{input}{error}','options' => [
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
                                            <?
                                            echo $form->field($orderSignup, 'countrydoctype_id', ['template'=>'{label}{input}{error}','options' =>[
                                                'class' => 'col-md-12 ymo-nopadding ymo-group'
                                            ]
                                            ])->radioList($orderSignup->doctypes, ['inline'=>true,'class'=>'radio-name ymo-nopadding']);
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div id="brazil-docs">
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'brazil_rg', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'brazil_cpf', ['template'=>'{label}{input}{error}','options' => [
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
                                    <?= $form->field($orderSignup, 'email', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12  ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'repeat_email', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12  ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-Panel">
                                    <?= $form->field($orderSignup, 'password', ['template'=>'{label}{input}{error}','options' => [
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
                                    <?= $form->field($orderSignup, 'repeat_password', ['template'=>'{label}{input}{error}','options' => [
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
                                    <?= $form->field($orderSignup, 'address', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textarea(['class'=>'form-control ymo-input','rows'=>'10','cols'=>'30']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'city', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'zipcode', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'state', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?=$form->field($orderSignup, 'countries_id', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                                            'class' => 'form-control ymo-input'
                                        ]);?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'phone', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <?= $form->field($orderSignup, 'mobile', ['template'=>'{label}{input}{error}','options' => [
                                        'class' => 'col-md-12 ymo-nopadding ymo-group'
                                    ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                </div>

                                <div id="shipping-info">
                                    <div class="col-md-12 ymo-nopadding ymo-group ymo-Panel">
                                        <div class="col-md-12 checkbox">
                                            <input type="checkbox" name="other-shipping-address" id="other-shipping-address" />
                                            <label for="other-shipping-address"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','click here if your shipping address is diferent from the one above') ?></label>
                                        </div>
                                        <div class="col-md-12 ymo-new-address" style="display: none;">
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?= $form->field($orderSignup, 'shipping_firstname', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                                ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                            </div>
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?= $form->field($orderSignup, 'shipping_lastname', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                                ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                            </div>
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?= $form->field($orderSignup, 'shipping_address', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                                ]])->textarea(['class'=>'form-control ymo-input','rows'=>'10','cols'=>'30']) ?>
                                            </div>
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?= $form->field($orderSignup, 'shipping_city', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                                ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                            </div>
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?= $form->field($orderSignup, 'shipping_zipcode', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                                ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                            </div>
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?= $form->field($orderSignup, 'shipping_state', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group'
                                                ]])->textInput(['class'=>'form-control ymo-input']) ?>
                                            </div>
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <?=$form->field($orderSignup, 'shipping_country', ['template'=>'{label}{input}{error}','options' => [
                                                    'class' => 'col-md-12 ymo-nopadding ymo-group',
                                                ]])->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name'),[
                                                    'class' => 'form-control ymo-input',
                                                    'data-id' => 'countryCheck'
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
                                    <?= $form->field($orderSignup, 'termsconditions', ['template'=>'{input}{label}{error}'])->checkbox(['uncheck'=>0,'label' => 'I agree to the ' . \yii\helpers\Html::a(Yii::t('app','Terms and Conditions'), ['#']) . '.']) ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--End for orderSignup-->

                    <!--Start for orderCard-->
                    <div class="orderForms" id="orderCard">

                        <!--ymo-card-form-->
                        <div class="col-md-12 ymo-card-form ymo-group ymo-nopadding ymo-Panel">
                            <span class="badge ymo-badge-a">4</span>
                            <h2 class="ymo-title-b">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Card Name') ?>
                            </h2>
                            <p class="ymo-required">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(all fields required)') ?>
                            </p>
                            <div class="col-md-12 ymo-nopadding">
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','title') ?></label>
                                    <select class="form-control ymo-input">
                                        <option value=""></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                    <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','card name <span>(max. 20 carachters)</span>') ?></label>
                                    <input type="text" class="form-control ymo-input" id="">
                                </div>
                            </div>
                        </div>
                        <!--ymo-card-form-->

                        <!--ymo-card-form-->
                        <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                            <span class="badge ymo-badge-a">5</span>
                            <h2 class="ymo-title-b">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Compliance') ?>
                            </h2>
                            <div class="col-md-12 ymo-nopadding ymo-Panel">
                                <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                                    <p class="ymo-text-a">
                                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','id document <span>(such as national id card, passport or driver licence)</span>') ?>
                                        <span class="badge ymo-badge-b">?</span>
                                    </p>
                                    <button class="ymo-btn-upload" ><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Upload') ?></button>
                                </div>
                                <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                                    <p class="ymo-text-a">
                                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','proof of residence <span>(such as, power or phone bil)</span>') ?>
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                    </p>
                                    <button class="ymo-btn-upload" ><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Upload') ?></button>
                                </div>
                            </div>
                        </div>
                        <!--ymo-card-form-->

                    </div>
                    <!--End for orderCard-->

                    <!--Start for orderPayment-->
                    <div class="orderForms" id="orderPayment">

                        <!--Start ymo payment method-->
                        <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                            <span class="badge ymo-badge-a">6</span>
                            <h2 class="ymo-title-b">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Payment Method') ?>
                            </h2>

                            <div class="col-md-12 ymo-group ymo-nopadding">
                                <div class="col-md-12 ymo-payment ymo-nopadding">
                                    <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','select payment method') ?></label>
                                </div>
                                <ul class="col-md-12 list-inline ymo-Panel">
                                    <li>
                                        <label class="radio-inline ymo-nopadding">
                                            <input type="radio" name="ymo-method" value="paypal" id="national" checked="checked" />
                                            <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','paypal') ?></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-inline ymo-nopadding">
                                            <input type="radio" name="ymo-method" value="bank-transfer" id="passport" />
                                            <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','bank transfer') ?></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-inline ymo-nopadding">
                                            <input type="radio" name="ymo-method" value="credit-card" id="driver" />
                                            <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card') ?></span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="ymo-methods">
                                    <li class="col-md-12 ymo-paypal ymo-method-view method-active">

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
                                                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/arrow-order.png" alt="...">
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
                                        <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card nº') ?></label>
                                            <input type="text" class="form-control ymo-input" id="">
                                        </div>
                                        <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-expiration">
                                            <label class="control-label" for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card expiration date') ?></label>
                                            <?php
                                            echo DatePicker::widget([
                                                'name' => 'dp_2',
                                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                                //'value' => '23-Feb-2014',
                                                'pluginOptions' => [
                                                    'autoclose'=>true,
                                                    'format' => 'dd-M-yyyy'
                                                ],
                                                'options' => [
                                                    'class' => 'form-control ymo-input'
                                                ]
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-md-12 ymo-nopadding">
                                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                                <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','security code')?></label>
                                                <input type="text" class="form-control ymo-input" id="">
                                            </div>
                                            <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                            <div class="col-md-12 ymo-important ymo-nopadding ymo-Panel">
                                                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/arrow-order.png" alt="...">
                                                <p>
                                                    (1) <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password')?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </div>

                            </div>
                        </div>
                        <!--End ymo payment method-->

                    </div>
                    <!--End for orderPayment-->

                        <?php
                        echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),null,[
                            'href' => '#',
                            'class' => 'col-md-3 btn ymo-btn-dark-pink btnBack',
                            'data-formback' => '',
                            'style' => 'margin-right: 15px;'
                        ]);
                        ?>

                        <?php
                            echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
                                'class' => 'col-md-3 btn ymo-btn-dark-pink btnNext',
                            ]);
                        ?>

                        <?php
                        echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Finish'),[
                            'class' => 'col-md-3 col-md-offset-1 btn ymo-btn-dark-pink btnFinish'
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