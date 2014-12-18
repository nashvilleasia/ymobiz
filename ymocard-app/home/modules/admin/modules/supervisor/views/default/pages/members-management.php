<?php

use common\models\forms\ymoMemberForm;
use mcms\isloading\Isloading;
use kartik\widgets\Select2;
use ymobiz\auth\ymoUser;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\JsExpression;
use ymobiz\components\ymoTools;
use common\models\ymoClients;
use common\models\ymoClientsFiles;
use common\models\auth\ymoAccountSettings;

$model = new ymoMemberForm();
$viewMembers = json_decode(json_encode($model->viewMembers(),true));

echo ymoTools::preloadModal([
	['id'=>'more-documents','size'=>'md', 'module' => 'admin/modules/supervisor'],
]);

?>
<div class="">
    <div class="col-md-12 ymo-body ymo-Panel">

        <?php echo $this->render('members-table') ?>

        <!-- Start ymo-column-right-->
        <div class="col-md-6 ymo-column-right ymo-Panel">
            <div class="col-md-11 col-md-offset-1 ymo-management ymo-nopadding ymo-Panel">

                <!-- Start ymo-card-details-->
                <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                    <h2 class="ymo-title-a">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','member account details')?>
                    </h2>
                    <?php
					if($viewMembers!=false){

						$userModel = ymoUser::findOne($viewMembers->id);
						$member = $viewMembers;
						
					?>
                       <?php
                        
	                        echo \mcms\ajaxform\EditableActiveForm::widget([
	                            'id' => 'form-account-details',
	                            'model' => $accounts->getAccountsSupervisor($member->id)->one(),
		                        'scenario' => 'updateAccountSupervisor',
	                            'formTemplate' => '<li class="form-objects {displaylabel}" id="{formid}" style="width: 100%; float: left;"><strong>{label}:</strong>{field}<span class="value-editable" id="{formid}-{fieldid}">{value}</span></li>',
	                            'tagTemplate' => '<ul class="col-md-8 ymo-Panel">{activeform}<ul>',
	                            'editButtomClass' => 'ymo-btn-logout',
	                            'saveButtomClass' => 'ymo-btn-logout',
	                            'cancelButtomClass' => 'ymo-btn-logout',
	                            'attributes' => [
	                                'username' => [
	                                    'type' => 'field',
	                                    'options' => [
	                                        'inputType' => 'textInput',
	                                        'fieldOptions' => ['template'=>'{input}{error}'],
	                                        'inputOptions' => ['class'=>'ymo-input form-control']
	                                    ]
	                                ],
	                                'email' => [
	                                    'type' => 'field',
	                                    'options' => [
	                                        'inputType' => 'textInput',
	                                        'fieldOptions' => ['template'=>'{input}{error}'],
	                                        'inputOptions' => ['class'=>'ymo-input form-control']
	                                    ]
	                                ],
	                                'password' => [
	                                    'type' => 'field',
	                                    'displayLabel' => 'none',
	                                    'options' => [
	                                        'inputType' => 'passwordInput',
	                                        'fieldOptions' => ['template'=>'{input}{error}'],
	                                        'inputOptions' => ['class'=>'ymo-input form-control']
	                                    ]
	                                ],
	                                'repassword' => [
	                                    'type' => 'field',
	                                    'displayLabel' => 'none',
	                                    'options' => [
	                                        'inputType' => 'passwordInput',
	                                        'fieldOptions' => ['template'=>'{input}{error}'],
	                                        'inputOptions' => ['class'=>'ymo-input form-control']
	                                    ]
	                                ],
	                                'status' => [
	                                    'type' => 'field',
	                                    'displayLabel' => 'none',
	                                    'options' => [
	                                        'inputType' => 'checkbox',
	                                        'fieldOptions' => ['template'=>'{input}{label}','options' => [
	                                        	'class' => 'col-md-12 checkbox ymo-group',
	                                    	]],
	                                        'inputOptions' => [
	                                        	'class'=>'col-md-12 ymo-nopadding ymo-group ymo-checkbox',
	                                        	'label' => false,
	                                        	'style' => 'margin-top:15px;'	
	                                		],
	                                    ]
	                                ],
	                            ],
	                            'activeForm' => [
		                            'class' => 'mcms\ajaxform\AjaxActiveFormOne',
		                            'activeFieldClass' => 'kartik\widgets\ActiveField',
	                                'options' => [
	                                    'action' => '/supervisor/edit-account-supervisor?memberid='.ymoMemberForm::findMemberId(),
	                                ]
	                            ]
	                        ]);

                        ?>
                    
                    <?php 
                    
						}
					?>
                    
                </div>
                <!-- End ymo-card-details-->
                
                <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                
                
                
				<?php
					if($viewMembers!=false){
						
						$userModel = ymoUser::findOne($viewMembers->id);
						$staffModel = new ymoMemberForm;
						$staffModel->scenario = 'UpdateMember';
						
				?>

                <!--Start documents-->
                    <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel" style="margin-top: 0px;">
                        <h2 class="col-md-6 ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','documents')?>
                        </h2>

                        <?php

                        echo \mcms\ajaxform\EditableActiveForm::widget([
                            'id' => 'form-documents-members',
                            'model' => (!method_exists($staffModel->documents, 'one')) ? $staffModel->documents : $staffModel->documents->one(),
	                        'scenario' => 'singleUpload',
                            'formTemplate' => '<li class="form-objects {displaylabel}" id="{formid}" style="width: 100%; float: left;"><strong>{label}</strong>{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></li>',
                            'tagTemplate' => '<ul class="col-md-12 ymo-card-form ymo-Panel">{activeform}</ul>',
                            'editName' => Yii::t('app','edit documents'),
                            'editButtomClass' => 'ymo-btn-logout',
                            'saveButtomClass' => 'ymo-btn-logout',
                            'cancelButtomClass' => 'ymo-btn-logout',
                            'attributes' => [
                                'file' => [
                                    'type' => 'field',
                                    'displayLabel' => 'none',
                                    'options' => [
                                        'inputType' => 'fileInput',
                                        'fieldOptions' => ['template'=>'{input}{error}'],
                                        'inputOptions' => ['class'=>'ymo-btn-upload form-control'],
                                        'customResponse' =>(!method_exists($staffModel->documents, 'one')) ? $staffModel->documents->getListUploadDocs(['limit'=>5],ymoMemberForm::findMemberId())
                                    		: @$staffModel->documents->one()->getListUploadDocs(['limit'=>5],ymoMemberForm::findMemberId()),
                                        'widget' => [
                                            'class' => \kartik\widgets\FileInput::classname(),
                                            'caption' => '<span id="caption-documents-uploaddoc" class="text-success upload-caption" style="width: 100%; float:left; margin-top: 7px;"></span>',
                                            'config' => [
                                                'options' => [
                                                    'accept' => 'any/*',
                                                    'multiple'=>true,
                                                ],
                                                'pluginOptions' => [
                                                    'showPreview' => false,
                                                    'showCaption' => false,
                                                    'showUpload' => false,
                                                    'elCaptionText' => '#caption-documents-uploaddoc',
                                                    'browseClass' => 'col-md-4 ymo-btn-smallupload',
                                                    'removeClass' => 'col-md-4 ymo-btn-smallupload ymo-btn-smallremove ymo-btn-smallupload-space',
                                                    'browseIcon' => '',
                                                    'removeIcon' => '',
                                                    'browseLabel' =>  Yii::t('app','upload docs')
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                            ],
                            'activeForm' => [
	                            'class' => 'mcms\ajaxform\AjaxActiveFormOne',
	                           	'activeFieldClass' => 'kartik\widgets\ActiveField',                                
                                'options' => [
                                    'action' => '/supervisor/edit-documents-members?memberid='.ymoMemberForm::findMemberId(),
                                ]
                            ],
                        	'pluginOptions' => [
                            	'data' => [
                                	'userID' => ymoMemberForm::findMemberId()
                               	],	
                            ],
                        	'customResponse' => new JsExpression("
	            				$('#form-documents-members :input[type=file]').fileinput('reset'); 	
                        	")	
                        ]);

                        ?>
						
                    </div>
                    
                    <?php if(ymoClientsFiles::findOne(['clients_id'=>ymoMemberForm::findMemberId()])!=false){?>
                    
                    <!--End documents-->
                    <div class="col-md-12 ymo-see-more ymo-nopadding">
                    	<a class="dropdown-toggle" data-toggle="dropdown" href="#" data-action="more-documents" data-size="sm">
                    		<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more')?>
                    		<span class="caret"></span>
                    	</a>
                    </div>
                    
                    <?php } ?>

                <!-- Start ymo-card-activity-->
                <div id="response-card-activity">
                    <?php echo $this->render('member-activity') ?>
                </div>
                <!-- End ymo-card-activity-->
				
                <?php 
                
                	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
					    'id' => 'editMember',
					    'action' => '/supervisor/edit-member', 
                		'options' => [
					        'enctype'=>'multipart/form-data'
					    ],
					    'model' => $staffModel,
					    'pluginOptions' => [
					        'dataType' => 'json',
					        'resetForm' => false,
					    	'data' => [
                				'memberid' =>$viewMembers->id
                			]	
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
                
                <div class="col-md-12 ymo-group ymo-nopadding">
                    <h2 class="ymo-title-a" style="margin-top: 10px; margin-bottom: 0px;">
                    	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','type of member')?>
                    </h2>
                    <ul class="col-md-12 list-inline ymo-Panel ymo-nopadding" style="margin-left: 2px;">
                    
                    	<?php 
                    	
                    		$staffModel->type = $userModel->group_id;
                    		
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
                
                <div class="col-md-12 ymo-group ymo-nopadding" style="margin-top: 0px; margin-bottom: 25px;">
                    <h2 class="ymo-title-a" style="margin-top: 10px; margin-bottom: 0px;">
                    	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member permissions')?>
                    </h2>
                    <ul class="col-md-12 list-inline ymo-Panel ymo-nopadding" style="margin-left: 2px;">
                    
                    	<?php 
                    	
                    		$staffModel->permissions = implode(',',$staffModel->getPermissionsByMember($userModel->id));
                    	
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
                
                <?php
                      echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Submit'),[
                         'class' => 'col-md-3 btn ymo-btn-dark-pink',
                  	]);
                ?>
                
                <?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
                
                </div>
                
                <?php 
					}else{
						echo '<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no registered member').'</li>';	
					}
				?>

            </div>
        </div>
        <!-- End ymo-column-right-->

    </div>
</div>