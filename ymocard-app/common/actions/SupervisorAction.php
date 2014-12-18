<?php

namespace common\actions;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use ymobiz\actions\BaseAction;
use yii\web\NotFoundHttpException;
use yii\web\JsExpression;
use common\models\ymoCards;
use common\models\forms\ymoNewCardHolderForm;
use common\models\forms\ymoMemberForm;
use common\models\ymoClientsFiles;
use ymobiz\components\Upload;
use common\models\auth\ymoAccountSettings;
use common\models\ymoClientsMessages;
use common\models\forms\ymoEmissionForm;
use common\models\forms\ymoComplianceForm;
use common\models\forms\ymoTreasuryForm;
use common\models\ymoClients;
use ymobiz\auth\ymoUser;

class SupervisorAction extends BaseAction
{
	/**
	 * @inheritdoc
	 */
	public function blockYmocard()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$cards = new ymoCards;
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
			if($cards->blockYmocard())
			{
				return [
					'name' => 'success',
					'message' => 'Successfull.',
					'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@popups/block-ymocard'),
		            	'customJs' => new JsExpression("
		            		var ButtonSuccess = jQuery(document);
							ButtonSuccess.on('click','.close-modal',function(){
								location.reload();
							});
		            	"),
					]),
					'status' => 200,
				];
	
			}else{
			  
				return [
					'name' => 'validationError',
					'message' => 'Validation fix errors.',
					'errors' => $cards->getErrors(),
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => Html::errorSummary($cards,['class'=>'error-summary']),
					]),
					'status' => 500,
				];
			  
			}
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function unblockYmocard()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$cards = new ymoCards;
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
			if($cards->unblockYmocard())
			{
			  
				return [
					'name' => 'success',
					'message' => 'Successfull.',
					'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@popups/unblock-ymocard'),
		            	'customJs' => new JsExpression("
		            		var ButtonSuccess = jQuery(document);
							ButtonSuccess.on('click','.close-modal',function(){
								location.reload();
							});
		            	"),
					]),
					'status' => 200,
				];
	
			}else{
			  
				return [
					'name' => 'validationError',
					'message' => 'Validation fix errors.',
					'errors' => $cards->getErrors(),
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => Html::errorSummary($cards,['class'=>'error-summary']),
					]),
					'status' => 500,
				];
			  
			}
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function definePlafond()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$cards = new ymoCards;
			$cards->scenario = 'DefinePlafond';
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
			$cards->attributes = $cards->load(Yii::$app->request->post());
	
			if($cards->savePlafond())
			{
				return [
					'name' => 'success',
					'message' => 'Successfull.',
					'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@popups/plafond-edition'),
					]),
					'status' => 200,
				];
			  
			}else{
	
				return [
					'name' => 'validationError',
					'message' => 'Validation fix errors.',
					'errors' => $cards->getErrors(),
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => Html::errorSummary($cards,['class'=>'error-summary']),
					]),
					'status' => 500,
				];
			  
			}
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function definePlafondValue()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
			return [
				'status' => 200,
				'plafondValue' =>  Yii::$app->formatter->asCurrency(Yii::$app->request->post('plafondValue')),
			];
	
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}

    public function documentsMembers()
    {
    	$upload = new ymoClientsFiles;
        $upload->scenario = 'uploadDocument';
        
        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        
	        /*Return form to validate form with ajax*/
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
	        $files  = Upload::multipleUpload($upload, 'file', []);
	        
	        if (isset($files) && count($files) > 0) {
	        	
	        	foreach ($files as $key=>$file) {
	        		if($file->size!=0)
	        		{
	        			$_SESSION['upload_files'][uniqid(time())] = [
	        				'encrypt'=>false,
	        				'name'=>$file->name,
	        				'size'=>$file->size,
	        				'mimetype'=>$file->type,
	        				'extension'=>$file->extension,
	        				'filecontent'=>base64_encode(file_get_contents($file->tempName)),
	        			];
	        		}
	        	}
	        	
		        $ymoFiles = new ymoClientsFiles;
		        $ymoFiles->saveFile(Yii::$app->request->get('memberid'));
		        
		        $responseFiles = new ymoClientsFiles;
		        $listFiles = json_encode($responseFiles->getListFiles(['limit'=>5],Yii::$app->request->get('memberid'),'default/view-file'));
		
		        return [
		            'name' => 'validationError',
		            'message' => 'Well done.',
		            'errors' => Yii::t('app','Action not set'),
		        	'listDocuments' => '<li>Files here</li>',	
		            'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@popups/contact-details-upload'),
		            	'customJs' => new JsExpression("
		            			jQuery(document).find('.documents-list').html($listFiles);
		            	"),
		            ]),
		            'status' => 200,
		        ];
	        
	        }else{
	        	
	        	return [
	        		'name' => 'validationError',
	        		'message' => 'Validation fix errors.',
	        		'errors' => $ymoFiles->getErrors(),
	        		'content' => Yii::$app->controller->render('@common/errors/popup',[
	        			'id' => 'form-company-details',
	        			'header' => Yii::t('app','Validation errors!'),
	        			'body' => Html::errorSummary($ymoFiles,['class'=>'error-summary']),
	        		]),
	        		'status' => 500,
	        	];
	        }
	
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
    }
	
	/**
	 * @inheritdoc
	 */
	public function newMember()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$members = new ymoMemberForm;
			$members->scenario = 'AddMember';
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if($members->newMember())
			{
			  
				return [
					'name' => 'success',
					'message' => 'Successfull.',
					'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@supervisor-popups/new-member'),
		            	'customJs' => new JsExpression("
		            		var ButtonSuccess = jQuery(document);
							ButtonSuccess.on('click','.close-modal',function(){
								location.reload();
							});
		            	"),
					]),
					'status' => 200,
				];
	
			}else{
			  
				return [
					'name' => 'validationError',
					'message' => 'Validation fix errors.',
					'errors' => $members->getErrors(),
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => Html::errorSummary($members,['class'=>'error-summary']),
					]),
					'status' => 500,
				];
			  
			}
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function updateMember()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$members = new ymoMemberForm;
			$members->scenario = 'UpdateMember';
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if($members->updateMember())
			{
			  
				return [
					'name' => 'success',
					'message' => 'Successfull.',
					'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@supervisor-popups/edit-member'),
		            	'customJs' => new JsExpression("
		            		var ButtonSuccess = jQuery(document);
							ButtonSuccess.on('click','.close-modal',function(){
								location.reload();
							});
		            	"),
					]),
					'status' => 200,
				];
	
			}else{
			  
				return [
					'name' => 'validationError',
					'message' => 'Validation fix errors.',
					'errors' => $members->getErrors(),
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => Html::errorSummary($members,['class'=>'error-summary']),
					]),
					'status' => 500,
				];
			  
			}
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}
	
    /**
     * @inheritdoc
     */
    public function accountDetails()
    {

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        	
	        /*Model Dev*/
		    $account = new ymoAccountSettings;
		    	
		    $model = $account->getAccountsSupervisor(Yii::$app->request->get('memberid'))->one();
		    
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
            	
            	$model->attributes = $model->load(Yii::$app->request->post());
            	
                /*Return save method in model ymoClients, this method default is save()*/
                if($model->updateAccountDetailSupervisor())
                {

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@popups/account-details'),
			            	'customJs' => new JsExpression("
			            		jQuery('#form-account-details input[type=password]').val('');
			            	"),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
		    			'errors' => $model->getErrors(),
                        'content' => Yii::$app->controller->render('@common/errors/popup',[
                            'id' => 'form-account-details',
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary($model,['class'=>'error-summary']),
                        ]),
                        'status' => 500,
                    ];
                }
            }
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
    
    /**
     * @inheritdoc
     */
    public function sendMessages()
    {

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        	
	        /*Model Dev*/
		    $model = new ymoClientsMessages();
		    $model->scenario = 'SupervisorSendMessages';
		    
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
            	
            	$model->attributes = $model->load(Yii::$app->request->post());
            	
                /*Return save method in model ymoClients, this method default is save()*/
                if($model->saveMessagesSupervisor())
                {

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@supervisor-popups/send-message'),
			            	'customJs' => new JsExpression("
			            		var ButtonSuccess = jQuery(document);
								ButtonSuccess.on('click','.close-modal',function(){
									location.reload();
								});
			            	"),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
		    			'errors' => $model->getErrors(),
                        'content' => Yii::$app->controller->render('@common/errors/popup',[
                            'id' => 'form-account-details',
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary($model,['class'=>'error-summary']),
                        ]),
                        'status' => 500,
                    ];
                }
            }
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
    
    /**
     * @inheritdoc
     */
    public function saveEmission()
    {

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        	
	        /*Model Dev*/
		    $model = new ymoEmissionForm();
		    $model->scenario = 'SupervisorSaveEmission';
		    
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
            	
            	$model->attributes = $model->load(Yii::$app->request->post());
            	
                /*Return save method in model ymoClients, this method default is save()*/
                if($model->saveEmissionSupervisor())
                {

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@supervisor-popups/emission-done'),
			            	'customJs' => new JsExpression("
			            		var ButtonSuccess = jQuery(document);
								ButtonSuccess.on('click','.close-modal',function(){
									location.reload();
								});
			            	"),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
		    			'errors' => $model->getErrors(),
                        'content' => Yii::$app->controller->render('@common/errors/popup',[
                            'id' => 'form-account-details',
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary($model,['class'=>'error-summary']),
                        ]),
                        'status' => 500,
                    ];
                }
            }
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
    
    /**
     * @inheritdoc
     */
    public function saveCompliance()
    {

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        	
	        /*Model Dev*/
		    $model = new ymoComplianceForm();
		    $model->scenario = 'SupervisorSaveCompliance';
		    
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
            	
            	$model->attributes = $model->load(Yii::$app->request->post());
            	
                /*Return save method in model ymoClients, this method default is save()*/
                if($model->saveComplianceSupervisor())
                {

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@supervisor-popups/compliance-done'),
			            	'customJs' => new JsExpression("
			            		var ButtonSuccess = jQuery(document);
								ButtonSuccess.on('click','.close-modal',function(){
									location.reload();
								});
			            	"),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
		    			'errors' => $model->getErrors(),
                        'content' => Yii::$app->controller->render('@common/errors/popup',[
                            'id' => 'form-account-details',
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary($model,['class'=>'error-summary']),
                        ]),
                        'status' => 500,
                    ];
                }
            }
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
    
    /**
     * @inheritdoc
     */
    public function saveTreasury()
    {

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        	
	        /*Model Dev*/
		    $model = new ymoTreasuryForm();
		    $model->scenario = 'SupervisorSaveTreasury';
		    
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
            	
            	$model->attributes = $model->load(Yii::$app->request->post());
            	
                /*Return save method in model ymoClients, this method default is save()*/
                if($model->saveTreasurySupervisor())
                {

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@supervisor-popups/payment-confirmed'),
			            	'customJs' => new JsExpression("
			            		var ButtonSuccess = jQuery(document);
								ButtonSuccess.on('click','.close-modal',function(){
									location.reload();
								});
			            	"),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
		    			'errors' => $model->getErrors(),
                        'content' => Yii::$app->controller->render('@common/errors/popup',[
                            'id' => 'form-account-details',
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary($model,['class'=>'error-summary']),
                        ]),
                        'status' => 500,
                    ];
                }
            }
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

    /**
     * @inheritdoc
     */
    public function documentsSettings()
    {
    	$upload = new ymoClientsFiles;
        $upload->scenario = 'uploadDocument';
        
        $userID = (Yii::$app->request->post('userID')) ? Yii::$app->request->post('userID') : false;

        /*Return form to validate form with ajax*/
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $files  = Upload::multipleUpload($upload, 'file', []);
        
        if (isset($files) && count($files) > 0) {
        	
        	foreach ($files as $key=>$file) {
        		if($file->size!=0)
        		{
        			$_SESSION['upload_files'][uniqid(time())] = [
        				'encrypt'=>false,
        				'name'=>$file->name,
        				'size'=>$file->size,
        				'mimetype'=>$file->type,
        				'extension'=>$file->extension,
        				'filecontent'=>base64_encode(file_get_contents($file->tempName)),
        			];
        		}
        	}
        	
	        $ymoFiles = new ymoClientsFiles;
	        $ymoFiles->saveFile($userID);
	        
	        $responseFiles = new ymoClientsFiles;
	        $listFiles = json_encode($responseFiles->getListFiles(['limit'=>5]));
	
	        return [
	            'name' => 'validationError',
	            'message' => 'Well done.',
	            'errors' => Yii::t('app','Action not set'),
	        	'listDocuments' => '<li>Files here</li>',	
	            'content' =>  Yii::$app->controller->render('@common/errors/popup',[
					'custom' => Yii::$app->controller->renderPartial('@popups/contact-details-upload'),
	            	'customJs' => new JsExpression("
	            			jQuery(document).find('.documents-list').html($listFiles);
	            	"),
	            ]),
	            'status' => 200,
	        ];
        
        }else{
        	
        	return [
        		'name' => 'validationError',
        		'message' => 'Validation fix errors.',
        		'errors' => $ymoFiles->getErrors(),
        		'content' => Yii::$app->controller->render('@common/errors/popup',[
        			'id' => 'form-company-details',
        			'header' => Yii::t('app','Validation errors!'),
        			'body' => Html::errorSummary($ymoFiles,['class'=>'error-summary']),
        		]),
        		'status' => 500,
        	];
        }
    }

    /**
     * @inheritdoc
     */
    public function viewFile()
    {
    	$id = Yii::$app->request->get('id');
    	
    	$memberID = false;
    	$authKey = false;
    	
    	if(Yii::$app->request->get('memberid')){
    		$memberID = Yii::$app->request->get('memberid');
    		$authKey = ymoUser::findOne($memberID)->auth_key;
    	}
    	
    	$mode = (Yii::$app->request->get('mode')) ? Yii::$app->request->get('mode') : 'safe';
    
    	$files = ymoClientsFiles::find()
	        ->where(['id'=>$id,'clients_id'=>($memberID) ? $memberID : ymoClients::find()->where(['user_id'=>Yii::$app->user->id])->one()->user_id,'status'=>1])
	        ->one();
    
    	if($files){
	    	if($mode=='safe'){
	    		$file = base64_decode($files->filecontent);
	    	}else{
	    		$protect = new \ymobiz\helpers\Password();
	    		$file = $protect->decryptByKey(base64_decode($files->filecontent),($authKey) ? $authKey : Yii::$app->user->identity->auth_key);
	    	}
	    
	    	header('Pragma: public');
	    	header('Expires: 0');
	    	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    	header('Content-Transfer-Encoding: binary');
	    	header('Content-length: '.$files->size);
	    	header('Content-Type: '.$files->mimetype);
	    	header('Content-Disposition: inline; filename='.$files->name);
	    
	    	echo $file;
    	}else{
        	throw new NotFoundHttpException(Yii::t('yii', 'This doc not exist.'));
        }
    }
}