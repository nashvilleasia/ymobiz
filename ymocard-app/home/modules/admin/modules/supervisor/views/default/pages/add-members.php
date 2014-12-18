<?php

use common\models\forms\ymoMemberForm;
use kartik\widgets\ActiveForm;
use mcms\isloading\Isloading;
use kartik\widgets\Select2;

$staffModel = new ymoMemberForm;
$staffModel->scenario = 'AddMember';


?>
<div class="">
    <div class="col-md-12 ymo-body ymo-super ymo-Panel">

        <?php echo $this->render('members-table') ?>

        <!-- Start ymo-column-right-->
        <div class="col-md-6 ymo-column-right ymo-Panel">
            <div class="col-md-11 col-md-offset-1 ymo-nopadding ymo-Panel">

                <?php 
                
                	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
					    'id' => 'NewMember',
					    'action' => '/supervisor/new-member', 
                		'options' => [
					        'enctype'=>'multipart/form-data'
					    ],
					    'model' => $staffModel,
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
					        			'id' => 'response-new-member',
					        			'pluginOptions' => [
											'text' => Yii::t('app','Generate your new card')
										],	
					        			'response' => new \yii\web\JsExpression('
					        				jQuery(".ymo-json-response").html(obj.content);
					        				//jQuery("#NewMember").resetForm();
					        				//$("#NewMember :input[type=file]").fileinput("reset"); 		
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
                
                <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                 	<h2 class="ymo-title-a" style="margin-bottom: 10px;">
                       	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member account details')?>
                    </h2>
                   	<div class="col-md-8 form-group ymo-group">
                        <?= $form->field($staffModel, 'name', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                   	<div class="col-md-8 form-group ymo-group">
                        <?= $form->field($staffModel, 'email', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                   	<div class="col-md-8 form-group ymo-group">
                        <?= $form->field($staffModel, 'repeat_email', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->textInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                   	<div class="col-md-8 form-group ymo-group">
                        <?= $form->field($staffModel, 'password', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->passwordInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                   	<div class="col-md-8 form-group ymo-group">
                        <?= $form->field($staffModel, 'repeat_password', ['template'=>'{label}{input}{error}','options' => [
                            'class' => 'col-md-12 ymo-nopadding ymo-group'
                        ]])->passwordInput(['class'=>'form-control ymo-input']) ?>
                    </div>
                </div>       
                
                <div class="col-md-12 ymo-group ymo-nopadding">
                    <h2 class="ymo-title-a" style="margin-top: 10px; margin-bottom: 10px;">
                    	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','type of member')?>
                    </h2>
                    <ul class="col-md-12 list-inline ymo-Panel" style="margin-left: 2px;">
                    
                    
                    	<?php 
                    	
                    		foreach (array_keys($staffModel->roleTypes) as $key=>$value){
                    			if($key==0){
                    				$staffModel->type = $value;
                    			}
                    		}
                    	
                    		echo $form->field($staffModel, 'type', ['template'=>'{input}{error}', 'options' => [
                    			'style' => 'margin-bottom: 5px;',
                    			'class' => 'col-md-12 radio-name ymo-nopadding custom-radio list-unstyled',
                    			]])->radioList($staffModel->roleTypes, [
                    				'inline'=>false,
                    				'itemOptions' => [
                    				'class' => 'ymo-nopadding ymo-radio',
                    				'labelOptions' => [
                    					'class' => ' ymo-nopadding col-md-12 ymo-radio-label',
                    				],
                    			],
                    		]);
                    	?>
						
                    </ul>
                </div>    
                
                <div class="col-md-12 ymo-group ymo-nopadding">
                    <h2 class="ymo-title-a" style="margin-top: 10px; margin-bottom: 20px;">
                    	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member permissions')?>
                    </h2>
                    <ul class="col-md-12 list-inline ymo-Panel" style="margin-left: 2px;">
                    
                    	<?php 
                    	
                    		echo $form->field($staffModel, 'permissions', ['template'=>'{input}{error}'])->widget(Select2::classname(), [
                    			'options' => [
                    				'placeholder' => 'Select permissions',
                    			],
                    			'pluginOptions' => [
                    				'tags' => array_values($staffModel->permissionsGroup),	
                    				'multiple' => true
                    			],
                    		]);
                    	?>
                    	
                    </ul>
                </div>   
                
                <!--ymo-card-documents-->
                <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                     <h2 class="col-md-7 ymo-title-a ymo-Panel">
                         <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member documents')?>
                     </h2>
                     <div class="col-md-5 ymo-nopadding">
                      <?php
						        
						        echo $form->field($staffModel,'compliance[]', ['template'=>'{input}','options' =>[
						        ]])->widget(\kartik\widgets\FileInput::classname(), [
						            'options' => [
						                'accept' => 'any/*',
						                'multiple'=>true,
						            ],
						            'pluginOptions' => [
						                'showPreview' => false,
						                'showCaption' => false,
						                'showUpload' => false,
						                'elCaptionText' => '#MemberCaption',
						                'browseClass' => 'col-md-10 ymo-btn-upload',
						                'removeClass' => 'col-md-10 ymo-btn-upload input-upload-espace',
						                'browseIcon' => '',
						                'removeIcon' => '',
						                'browseLabel' =>  'upload docs'
						            ]
						        ]);
						        
						?>
					</div>
					<div class="col-md-12 ymo-nopadding">
						<?php 
							echo '<span id="MemberCaption" class="text-success upload-caption" style="margin-top: 10px;"></span>';
							echo $form->field($staffModel,'compliance', ['template'=>'{error}']);
						?>
					</div>
                    <hr/>
                </div>
                <!--ymo-card-documents-->
                
                <?php
                      echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Submit'),[
                         'class' => 'col-md-3 btn ymo-btn-dark-pink',
                  	]);
                ?>
                
                <?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>

            </div>
        </div>
        <!-- End ymo-column-right-->

    </div>
</div>