<?php 

use common\models\ymoContactUs;
use mcms\isloading\Isloading;
use ymobiz\components\ymoLangManager;

$contactUsModel = new ymoContactUs;

?>


<!-- Modal -->
<div class="popup-contact">
    <div class="ymo-popup">
        <div class="popup-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','contact us')?></h4>
        </div>
            <!-- Start form-->
            
            
                    <?php 
                    	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
						    'id' => 'ContactUs',
						    'action' => '/site/contact-us',
                    		'model' => $contactUsModel,
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
            
            <div class="row ymo-nomargin">
                <div class="col-md-12 popup-form ymo-Panel">
                    	
                        <div class="col-md-4 popup-padding ymo-Panel">
                            <!-- Start first name-->
                            <?= $form->field($contactUsModel, 'fname', ['template'=>'{label}{input}{error}','options' => [
				                'class' => 'form-group col-md-12 popup-group ymo-Panel'
				            ]])->textInput(['class'=>'popup-input form-control']) ?>
                            <!-- End first name-->
                            <!-- Start last name-->
                            <?= $form->field($contactUsModel, 'lname', ['template'=>'{label}{input}{error}','options' => [
				                'class' => 'form-group col-md-12 popup-group ymo-Panel'
				            ]])->textInput(['class'=>'popup-input form-control']) ?>
                            <!-- End last name-->
                            <!-- Start your email-->
                            <?= $form->field($contactUsModel, 'email', ['template'=>'{label}{input}{error}','options' => [
				                'class' => 'form-group col-md-12 popup-group ymo-Panel'
				            ]])->textInput(['class'=>'popup-input form-control']) ?>
                            <!-- End your email-->
                            <!-- Start your email-->
                            <?= $form->field($contactUsModel, 'company', ['template'=>'{label}{input}{error}','options' => [
				                'class' => 'form-group col-md-12 popup-group ymo-Panel'
				            ]])->textInput(['class'=>'popup-input form-control']) ?>
                            <!-- End your email-->
                        </div>
                        <div class="col-md-4 popup-padding ymo-Panel">
                            <!-- Start subject-->
                            <?= $form->field($contactUsModel, 'name', ['template'=>'{label}{input}{error}','options' => [
				                'class' => 'form-group col-md-12 popup-group ymo-Panel'
				            ]])->textInput(['class'=>'popup-input form-control']) ?>
                            <!-- End subject-->
                            <!-- Start message-->
                            <?= $form->field($contactUsModel, 'description', ['template'=>'{label}{input}{error}','options' => [
				                'class' => 'form-group col-md-12 popup-group ymo-Panel'
				            ]])->textArea(['class'=>'popup-input form-control']) ?>
                            <!-- End message-->
                        </div>
                        <div class="col-md-4 popup-padding ymo-Panel">
                            <div class="col-md-12 popup-text ymo-Panel">
                                <p><span>Address:</span><br/>
                                    Zzril delenit augue 22
                                    Lisbon, Portugal
                                </p>
                            </div>
                            <div class="col-md-12 popup-text ymo-Panel">
                                <p><span>phone: </span>+52 123456789<br/>
                                   <span>email: </span>info@ymobiz.com
                                </p>
                            </div>
                            <div class="form-group col-md-12 popup-required ymo-Panel">
                                <label>* required fields</label>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer popup-footer">
            <div class="col-md-6 col-sm-12 col-xs-12 popup-btn-right">
            	<?php
					echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','send message'),[
					    'class' => 'col-md-6 col-sm-12 col-xs-12 col-md-offset-6 btn btn-primary',
					]);
				?>
            </div>
        </div>
        <!-- End form-->
    </div>
        
        <?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
</div>