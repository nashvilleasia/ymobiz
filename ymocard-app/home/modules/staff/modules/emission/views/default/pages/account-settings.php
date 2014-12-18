<?php 
use yii\helpers\Json;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use yii\web\JsExpression;
use ymobiz\components\ymoTools;
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

echo ymoTools::preloadModal([
	['id'=>'more-documents','size'=>'sm', 'module' => 'cardholder'],
]);

?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-Panel">

            <!-- Start ymo-account-left-->
            <div class="col-md-6 ymo-account-left ymo-nopadding ymo-Panel">
                <div class="col-md-10 col-md-offset-2 ymo-nopadding ymo-Panel">

                    <!--Start personal details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','personal details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <?php
                                if($account==true and $company==true){
                            ?>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','name:')?></strong>
                                <?=$account->ufirstname?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','partner:')?></strong>
                                <?=$company->name?>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <!--End personal details-->

                    <!--Start documents-->
                    <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                        <h2 class="col-md-6 ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','documents')?>
                        </h2>

                        <?php

                        echo \mcms\ajaxform\EditableActiveForm::widget([
                            'id' => 'form-documents-settings',
                            'model' => $documents,
	                        'scenario' => 'singleUpload',
                            'formTemplate' => '<li class="form-objects {displaylabel}" id="{formid}" style="width: 100%; float: left;"><strong>{label}</strong>{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></li>',
                            'tagTemplate' => '<ul class="col-md-8 ymo-card-form ymo-Panel">{activeform}</ul>',
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
                                        'customResponse' => @$documents->getListUploadDocs(['limit'=>5]),
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
                                    'action' => '/staff-emission/edit-documents-settings',
                                ]
                            ],
                        	'customResponse' => new JsExpression("
	            				$('#form-documents-settings :input[type=file]').fileinput('reset'); 	
                        	"),
                        	'pluginOptions' => [
                        		'data' => [
                        			'userID' => Yii::$app->user->id
                        		]
                        	]	
                        ]);

                        ?>
						
                    </div>
                    <!--End documents-->
                    <div class="col-md-8 ymo-see-more">
                    	<a class="dropdown-toggle" data-toggle="dropdown" href="#" data-action="more-documents" data-size="sm">
                    		<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more')?>
                    		<span class="caret"></span>
                    	</a>
                    </div>
                </div>
            </div>
            <!-- End ymo-account-left-->

            <!-- Start ymo-account-right-->
            <div class="col-md-6 ymo-account-right ymo-nopadding ymo-Panel">
                <div class="col-md-10 col-md-offset-2 ymo-nopadding ymo-Panel">

                    <!--Start contact details-->
                    <div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">
                        <h2 class="col-md-7 ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','account details')?>
                        </h2>

                        <?php
                        
	                        echo \mcms\ajaxform\EditableActiveForm::widget([
	                            'id' => 'form-account-details',
	                            'model' => $model,
		                        'scenario' => 'updateAccount',
	                            'formTemplate' => '<li class="form-objects {displaylabel}" id="{formid}" style="width: 100%; float: left;"><strong>{label}</strong>{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></li>',
	                            'tagTemplate' => '<ul class="col-md-8 ymo-card-form ymo-Panel">{activeform}</ul>',
	                            'editButtomClass' => 'ymo-btn-logout',
	                            'saveButtomClass' => 'ymo-btn-logout',
	                            'cancelButtomClass' => 'ymo-btn-logout',
	                            'attributes' => [
	                                'email' => [
	                                    'type' => 'field',
	                                    'options' => [
	                                        'inputType' => 'textInput',
	                                        'fieldOptions' => ['template'=>'{input}{error}'],
	                                        'inputOptions' => ['class'=>'ymo-input form-control']
	                                    ]
	                                ],
	                                'currentpassword' => [
	                                    'type' => 'field',
	                                    'label' => 'current password',
	                                    'displayLabel' => 'none',
	                                    'options' => [
	                                        'inputType' => 'passwordInput',
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
	                            ],
	                            'activeForm' => [
		                            'class' => 'mcms\ajaxform\AjaxActiveFormOne',
		                            'activeFieldClass' => 'kartik\widgets\ActiveField',
	                                'options' => [
	                                    'action' => '/staff-emission/edit-account-settings',
	                                ]
	                            ]
	                        ]);

                        ?>
                    </div>
                    <!--End contact details-->
                    

                </div>
            </div>
            <!-- End ymo-account-right-->

        </div>
    </div>
</div>