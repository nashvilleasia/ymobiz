<!-- Modal -->
<div class="popup-login-modal ">
    <div class="bs-modal-sm ymo-popup">
        <div class="popup-header">
      		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">please login</h4>
        </div>
        
       <?php

		    use mcms\isloading\Isloading;
		    
		    $model = Yii::$app->getModule('site')->ymoLoginForm;
		
		    $form = \mcms\ajaxform\AjaxActiveFormOne::begin([
		        'id' => 'login-auth',
		        'action' => '/site/login',
		        'pluginOptions' => [
		            'dataType' => 'json',
		            'resetForm' => true,
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
									jQuery("#load-modal-login-modal").modal("hide");
									jQuery(".ymo-json-response").html(obj.content);  
									$.isLoading("hide");
								')
							])."
						}else if(obj.status === 500){
								jQuery('#load-modal-login-success').modal('hide'); 
								jQuery('#load-modal-login-modal').modal('hide');
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
				    
        <div class="modal-body popup-body">
		    <div class="row">
			    <div class="col-md-12 popup-text">
				    <p style="text-align: center;">not a registered user? <a href="#">click here</a></p>
			    </div>
                <div class="col-md-10 col-md-offset-1">
				    <?= $form->field($model, 'ymo_email', ['template'=>'{input}{error}','options' => [
            				'class' => ''
       			 		]])->textInput(['class'=>'ymo-input form-control input-group','placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site', 'form', 'email')]) ?>
       			 		
		            <?= $form->field($model, 'ymo_password', ['template'=>'{input}{error}','options' => [
		                'class' => ''
		            ]])->passwordInput(['class'=>'ymo-input form-control input-group','placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site', 'form', 'password')]) ?>
                    
                </div>
		    </div>
        </div>
        
        <div class="modal-footer popup-footer">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
            	<?= \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','login'), ['class' => 'col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block']) ?>
            </div>
        </div>
        
	    <?= $form->field($model, 'cluster_id', ['template'=>'{input}'])->hiddenInput() ?>
	    <?php  \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
	    
    </div>
</div>