<div class="col-md-5 col-sm-11 ymo-login ymo-Panel col-md-offset-4">
<?php

    use mcms\isloading\Isloading;
    
    $model = Yii::$app->getModule('site')->ymoLoginForm;

    $form = \mcms\ajaxform\AjaxActiveFormOne::begin([
        'id' => 'login-auth',
        'action' => '/site/login',
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
							'text' => Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','Verifying your data, please wait...')
						],	
						'response' => new \yii\web\JsExpression('
							jQuery("#load-modal-login-success").modal("hide"); 
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
        'loadingOptions' => "
        {
            text: '".Yii::t('app','Loading')."',
            'class': \"fa fa-cog fa-spin fa-lg\",
            'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
        }"
    ]);

    ?>

    <div class="col-md-5">
        <div class="">
        	<div class="col-md-12 checkbox ymo-group">
		        <?= $form->field($model, 'remember', ['template'=>'{input}{label}'])->checkbox([
		            'class' => 'col-md-12 ymo-nopadding ymo-group ymo-checkbox',
		            'uncheck'=>0,
		        ]) ?>
		   </div>
        </div>
        <?= $form->field($model, 'ymo_email', ['template'=>'{input}{error}','options' => [
            'class' => 'col-md-12 form-group ymo-nopadding ymo-group'
        ]])->textInput(['class'=>'form-control','placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site', 'form', 'email')]) ?>
    </div>
    <div class="form-group col-md-7">
        <div class="link">
            <a href="#" data-action="password-recovery"><?php echo  Yii::$app->getModule('site')->ymoTranslate->t('site', 'form', 'forgot your password?') ?></a>
        </div>
        <div class="input-group">
            <?= $form->field($model, 'ymo_password', ['template'=>'{input}{error}','options' => [
                'class' => 'col-md-12 form-group ymo-nopadding ymo-group'
            ]])->passwordInput(['class'=>'form-control','placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site', 'form', 'password')]) ?>
            <span class="input-group-btn">
                <?= \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','login'), ['class' => 'btn btn-primary']) ?>
            </span>
        </div>
    </div>
    <?= $form->field($model, 'cluster_id', ['template'=>'{input}'])->hiddenInput() ?>
    <?php  \mcms\ajaxform\AjaxActiveFormOne::end(); ?>

</div>