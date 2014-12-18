<?php

namespace ymobiz\actions;

use Yii;
use yii\helpers\ArrayHelper;
use ymobiz\actions\BaseAction;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\validators\EmailValidator;
use ymobiz\validators\PhoneNumberValidator;
use ymobiz\auth\ymoUserSystem;
use common\models\ymoClients;
use yii\web\BadRequestHttpException;
use ymobiz\auth\ymoUser;
use common\models\ymoClientsAddresses;
use common\models\ymoClientsCompany;
use common\models\ymoOrders;
use common\models\ymoCards;
use common\models\ymoClientsFiles;

class AuthAction extends BaseAction
{
	
    public function PasswordRecovery()
    {
        $model = new ymoUserSystem;
		$model->scenario = 'PasswordRecovery';
        
        if(Yii::$app->request->isAjax){

        	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        	
        	$model->attributes = $model->load(Yii::$app->request->post());
        	
            if(!$model->validate()) {
            	
            	return [
            		'name' => 'error',
            		'message' => 'Error.',
            		'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
	            		'header' => Yii::t('app','done'),
	            		'body' => Html::errorSummary($model,['class'=>'error-summary']),
	            		'footer' => Yii::t('app','ok'),
	            	]),
            		'status' => 500,
            	];
           }else{

           		if($model->pass_recovery_choice=='email')
           		{
					$validator = new EmailValidator();
           		}else if($model->pass_recovery_choice=='mobile number'){
           			$validator = new PhoneNumberValidator();
           		}
	           	
	           	if (!$validator->validate($model->pass_recovery_input, $error)) {
	           		
	           		return [
	            		'name' => 'error',
	            		'message' => 'Error.',
	            		'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
		            		'header' => Yii::t('app','done'),
		            		'body' => $error,
		            		'footer' => Yii::t('app','ok'),
	            			'modalOptions' => [
	            				'size' => 'modal-sm'
	            			]	
		            	]),
	            		'status' => 500,
	            	];
	           		
	           	} else {
	           		
	           		
	           		if($model->pass_recovery_choice=='email'){
	           		 	if(!ymoUser::findByEmail($model->pass_recovery_input)==true){
	           				$validateUserError = \Yii::t('app', 'There were no matching Ymocard accounts found with the information you provided.');
	           			}
	           		}else if($model->pass_recovery_choice=='mobile number'){
		           		if(!ymoUser::findByEmail($model->pass_recovery_input)==true){
		           			$validateUserError = \Yii::t('app', 'There were no matching Ymocard accounts found with the information you provided.');
		           		}
	           		}
	           		
	           		if(@$validateUserError){
	           		  
		           		return [
	           				'name' => 'error',
	           				'message' => 'Error.',
	           				'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
	           					'header' => Yii::t('app','done'),
	           					'body' => $validateUserError,
	           					'footer' => Yii::t('app','ok'),
	           					'modalOptions' => [
	           						'size' => 'modal-sm'
	           					]
	           				]),
	           				'status' => 500,
	           			];
	           		 
	           		}else{
            		
		            	$model->PasswordRecovery();
		            		
			            return [
			                'status' => 200,
		            		'message' => 'Successful.',	
			            	'content' =>  Yii::$app->controller->render('@site-popups/password-recovery-success'),
			            ];
	           		}
	           	}
            }
        }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
    
    public function UserLogout()
    {
    	if(Yii::$app->request->isAjax){
    	
    		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    		
    		if (!Yii::$app->request->post('logoutConfirm')) {
    		
    			return [
    				'name' => 'error',
    				'message' => 'Error.',
    				'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
    					'header' => Yii::t('app','done'),
    					'body' => Yii::t('app','logout error, please contact administrator, or close your browser and try again.'),
    					'footer' => Yii::t('app','ok'),
    					'modalOptions' => [
    						'size' => 'modal-sm'
    					]
    				]),
    				'status' => 500,
    			];
    		
    		} else {
    		
    			Yii::$app->user->logout();
    			
    			return [
		            'status' => 200,
	            	'message' => 'Successfull.',	
		            'content' =>  Yii::$app->controller->render('@site-popups/logout-success',[
            			'htmlResponse'=>true,
            		]),
		        ];
    		}
    	}else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
    
    public function CheckTokenRecoveryPassword()
    {
    	$token = Yii::$app->request->get('token');
    	
    	if($token && $token!=null){
	    	
	    	$userToken = ymoUser::findUserByRecoveryToken($token);
	    	
	    	if($userToken!=false){
	    	
		    	if(ymoUser::findByConfirmTime($userToken->recovery_sent_at)==false){
		    		throw new BadRequestHttpException(Yii::t('yii', 'Token has expired.'));
		    	}else{
		    		$page = Yii::$app->controller->render('@ymobiz/views/auth/change-password');
		    		return Yii::$app->controller->render('page',[
		    			"page"=>$page
		    		]);
		    	}
		    	
	    	}else{
	    		throw new BadRequestHttpException(Yii::t('yii', 'This token don\'t valid.'));
	    	}
	    	
    	}else{
        	throw new BadRequestHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
    	}
    }
    
    public function ResetPassword()
    {
    	$model = new ymoUserSystem;
    	$model->scenario = 'PasswordReset';
    	
    	if(Yii::$app->request->isAjax){
    		 
    		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	
    		$model->attributes = $model->load(Yii::$app->request->post());
        	
            if($model->validate()) {
    	
            	$model->ResetUserPassword();
            	
    			return [
    				'status' => 200,
    				'message' => 'Successful.',
    				'content' =>  Yii::$app->controller->render('@site-popups/password-reset-success',[
            			'htmlResponse'=>true,
            		]),
    			];
    	
    		} else {
    			
    			return [
    				'name' => 'error',
    				'message' => 'Error.',
    				'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
    					'header' => Yii::t('app','done'),
    					'body' => Yii::t('app','Error has found, please enter contact at administrator.'),
    					'footer' => Yii::t('app','ok'),
    					'modalOptions' => [
    						'size' => 'modal-sm'
    					]
    				]),
    				'status' => 500,
    			];
    			
    		}
    	}else{
    		throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
    	}
    }
    


    public function CheckTokenActivation()
    {
    	$token = Yii::$app->request->get('token');
    	 
    	if($token && $token!=null){
    
    		$activateUser = ymoUser::findUserByConfirmationToken($token)->one();
    		
    		if($activateUser!=false){
    			
    			$activateUser->setScenario('activation');
    			
    			if(ymoUser::findByConfirmTime($activateUser->confirmation_sent_at)==false){
    				throw new BadRequestHttpException(Yii::t('yii', 'Token has expired.'.time()));
    			}else{
    				
    				$activateUser->confirm();
    				
    				$user = ymoUser::find()->where(['email'=>$activateUser->email])->one();
    				
    				if($user){
    				
    					$addresses = ymoClientsAddresses::find()->where(['client_id'=>$user->id])->all();
    					if($addresses){
    						foreach ($addresses as $address){
    							$address->status = 1;
    							$address->update();
    						}
    					}
    					 
    					$companies = ymoClientsCompany::find()->where(['client_id'=>$user->id])->all();
    					if($companies){
    						foreach ($companies as $company){
    							$company->status = 1;
    							$company->update();
    						}
    					}
    					 
    					$orders = ymoOrders::find()->where(['client_id'=>$user->id])->all();
    					if($orders){
    						foreach ($orders as $order){
    							$order->status = 1;
    							$order->update();
    						}
    					}
    				
    					$cards = ymoCards::find()->where(['client_id'=>$user->id])->all();
    					if($cards){
    						foreach ($cards as $card){
    							$card->status = 1;
    							$card->update();
    						}
    					}
    				
    					$files = ymoClientsFiles::find()->where(['clients_id'=>$user->id])->all();
    					if($files){
    						foreach ($files as $file){
    							$file->status = 1;
    							$file->update();
    						}
    					}
    				
    					$clients = ymoClients::find()->where(['email'=>$user->email])->all();
    					if($clients){
    						foreach ($clients as $client){
    							$client->status = 1;
    							$client->update();
    						}
    					}
    				}
    				
    				if(!$activateUser->validate()){
    					
	    				return Yii::$app->controller->render('page',[
	    					"page"=> Yii::$app->controller->renderPartial('@site-popups/activation-success'),
	    					"htmlResponse" => true	
	    				]);
    				}else{
    					throw new BadRequestHttpException(Yii::t('yii', 'Exist same error for activate account, please enter contact us.'));
    				}
    			}
    		  
    		}else{
    			throw new BadRequestHttpException(Yii::t('yii', 'This token don\'t valid.'));
    		}
    
    	}else{
    		throw new BadRequestHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
    	}
    }
}