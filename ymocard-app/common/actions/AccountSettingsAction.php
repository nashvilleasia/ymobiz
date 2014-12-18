<?php

namespace common\actions;

use Yii;
use ymobiz\components\Upload;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use ymobiz\actions\BaseAction;
use common\models\auth\ymoAccountSettings;
use common\models\ymoClientsCompany;
use common\models\forms\ymoClientsCompanyForm;
use yii\web\NotFoundHttpException;
use ymobiz\modules\mcms\helpers\Password;
use common\models\ymoClientsFiles;
use yii\web\JsExpression;
use common\models\ymoClients;

class AccountSettingsAction extends BaseAction
{
    /**
     * @inheritdoc
     */
    public function accountDetails()
    {

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        	
	        /*Model Dev*/
		    $account = new ymoAccountSettings;
		    	
		    $model = $account->accounts;
		    $model->scenario = 'updateAccount';
		    
	        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
            	
            	$model->attributes = $model->load(Yii::$app->request->post());
            	
                /*Return save method in model ymoClients, this method default is save()*/
                if($model->updateAccountDetail())
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

    public function contactDetails()
    {
    	/*Check is Ajax Request*/
    	if(Yii::$app->request->isAjax){
    		
	    	/*Model Dev*/
	    	$account = new ymoAccountSettings;
	    	
	    	$model = new $account->contact;
	        $model->scenario = 'updateContact';
	    	
	    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    	
	    	if ($model->load(Yii::$app->request->post())) {
	    	
	    		$model->attributes = $model->load(Yii::$app->request->post());
	    	
		    	if($model->updateContact())
		    	{
		    	
			    	return [
			    		'name' => 'success',
			    		'message' => 'Successfull.',
			    		'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@popups/contact-details-done'),
			    		]),
			    		'status' => 200,
			    	];
		    	
		    	}else{
		    		return [
		    			'name' => 'validationError',
		    			'message' => 'Validation fix errors.',
		    			'errors' => $model->getErrors(),
		    			'content' => Yii::$app->controller->render('@common/errors/popup',[
		    				'id' => 'form-company-details',
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

    public function companyDetails()
    {
    	/*Check is Ajax Request*/
    	if(Yii::$app->request->isAjax){
    		
	    	/*Model Dev*/
	    	$account = new ymoAccountSettings;
	    	
	    	$company = new $account->company;
	        $company->scenario = 'updateCompany';
	    	
	    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    	
	    	if ($company->load(Yii::$app->request->post())) {
	    	
	    		$company->attributes = $company->load(Yii::$app->request->post());
	    	
		    	if($company->updateCompany())
		    	{
		    	
			    	return [
			    		'name' => 'success',
			    		'message' => 'Successfull.',
			    		'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@popups/company-details-done'),
			    		]),
			    		'status' => 200,
			    	];
		    	
		    	}else{
		    		return [
		    			'name' => 'validationError',
		    			'message' => 'Validation fix errors.',
		    			'errors' => $company->getErrors(),
		    			'content' => Yii::$app->controller->render('@common/errors/popup',[
		    				'id' => 'form-company-details',
		    				'header' => Yii::t('app','Validation errors!'),
		    				'body' => Html::errorSummary($company,['class'=>'error-summary']),
		    			]),
		    			'status' => 500,
		    		];
		    	}
	    	}
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

    public function shippingDetails()
    {
    	/*Check is Ajax Request*/
    	if(Yii::$app->request->isAjax){
    		
	    	/*Model Dev*/
	    	$account = new ymoAccountSettings;
	    	
	    	$shipping = new $account->shipping;
	        $shipping->scenario = 'updateShipping';
	    	
	    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    	
	    	if ($shipping->load(Yii::$app->request->post())) {
	    	
	    		$shipping->attributes = $shipping->load(Yii::$app->request->post());
	    	
		    	if($shipping->updateShipping())
		    	{
		    	
			    	return [
			    		'name' => 'success',
			    		'message' => 'Successfull.',
			    		'content' =>  Yii::$app->controller->render('@common/errors/popup',[
							'custom' => Yii::$app->controller->renderPartial('@popups/shipping-details-done'),
			    		]),
			    		'status' => 200,
			    	];
		    	
		    	}else{
		    		return [
		    			'name' => 'validationError',
		    			'message' => 'Validation fix errors.',
		    			'errors' => $shipping->getErrors(),
		    			'content' => Yii::$app->controller->render('@common/errors/popup',[
		    				'id' => 'form-company-details',
		    				'header' => Yii::t('app','Validation errors!'),
		    				'body' => Html::errorSummary($shipping,['class'=>'error-summary']),
		    			]),
		    			'status' => 500,
		    		];
		    	}
	    	}
	    }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

    public function documentsSettings()
    {
    	$upload = new ymoClientsFiles;
        $upload->scenario = 'uploadDocument';

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
	        $ymoFiles->saveFile();
	        
	        $responseFiles = new ymoClientsFiles;
	        $listFiles = json_encode($responseFiles->getListFiles(['limit'=>5],(Yii::$app->request->post('userID') ? Yii::$app->request->post('userID') : false)));
	
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
    	if(Yii::$app->request->get('memberid')){
    		$memberID = Yii::$app->request->get('memberid');
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
	    		$file = $protect->decryptByKey(base64_decode($files->filecontent),Yii::$app->user->identity->auth_key);
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