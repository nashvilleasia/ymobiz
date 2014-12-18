<?php

namespace common\actions;

use Yii;
use common\models\ymoCards;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use ymobiz\actions\BaseAction;
use ymobiz\components\Upload;
use ymobiz\modules\mcms\helpers\Password;
use yii\helpers\Inflector;
use yii\web\Session;
use ymobiz\components\ymoArray;
use yii\helpers\Json;
use ymobiz\components\FormWizard;
use ymobiz\components\ymoMailer;
use ymobiz\auth\ymoUser;
use common\models\forms\ymoPartnerClientsForm;

class PartnerSupervisorOrderAction extends BaseAction
{
    public function OrderCreate()
    {
        $model = new ymoPartnerClientsForm();

        $result = [];

        $ymoClientFiles = [];

        $data = false;

        $step = Yii::$app->request->get('step');
        $stepForm = ($step) ? $step : 'OrderSignup';

        if(Yii::$app->request->isAjax){
        	
        	$session = new Session;
        	$session->open();
        	
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if($step=='OrderSignup'){
                $model->scenario = 'OrderSignup';
            }else if ($step=='OrderCard'){
                $model->scenario = 'OrderCard';
            }else if ($step=='OrderPayment'){
                $model->scenario = 'OrderPayment';
            }else if ($step=='OrderFinish'){
                $model->scenario = 'OrderFinish';
            }else if ($step=='OrderSave'){
            	//$model->scenario = 'OrderSave';
            }

            if(@$_FILES)
            {
            	if(ymoArray::searchKey(Yii::$app->session['steps'], 'OrderFiles')){
            		$session->set('steps', [
            			'OrderFiles' => [
            				'card_compliance' => []
            			]
            		]);
	            }
	            
            	$files = Upload::multipleUpload($model, 'card_compliance', []);
            
            	if (isset($files) && count($files) > 0) {
            		
            		foreach ($files as $key=>$file) {
            			if($file->size!=0)
            			{
	            			$_SESSION['steps']['OrderFiles']['card_compliance'][uniqid(time())] = [
	            				'encrypt'=>false,
	            				//'clients_id'=>Yii::$app->user->id,
	            				'name'=>$file->name,
	            				'size'=>$file->size,
	            				'mimetype'=>$file->type,
	            				'extension'=>$file->extension,
	            				'filecontent'=>base64_encode(file_get_contents($file->tempName)),
	            			];
            			}
            		}
            	}
            }

            if($step!='OrderSave' && $step!='OrderFinish')
            {	
            	/*return [
            		'name' => 'success',
            		'message' => 'Successfull.',
            		'content' =>  Yii::$app->controller->render('@common/errors/popup',[
            			'header' => Yii::t('app','Well done!'),
            			'body' => '<pre style="text-align: left; font-size: 12px;">' . print_r($model->verifyCode,true) . '</pre>',
            			'footer' => Yii::t('app','ok'),
            		]),
            		'status' => 500,
            	];*/
            	
            	$_SESSION['steps'][$step] = FormWizard::saveDataSession(Yii::$app->request->post(),
            		[
            			'model' => $model,		
			        	'class' => 'ymobiz\helpers\Password',
				   		'method' => 'base64_encode',
				   		'params' => [
				   			'securityAction' => 'encode',
				   			'compression' => true,
				   		],
				   		'data' => [
				   			'password','repeat_password'
					 	],
					]
				);
            }
            
            $model->attributes = $model->load(Yii::$app->request->post());
            
            if($step=='OrderSignup'){
            	
            	$validate = ['email'];
            	
            	if(!$model->validate($validate)) {
            		
            		return [
            			'name' => 'error',
            			'message' => 'Error.',
            			'content' =>  Yii::$app->controller->render('@common/errors/popup',[
            					'header' => Yii::t('app','Well done!'),
            					'body' => Html::errorSummary($model,['class'=>'error-summary']),
            					'footer' => Yii::t('app','ok'),
            				]),
            			'status' => 500,
            		];
            		
            	}else{
            		
	                return [
	                    'status' => 200,
	                    'redirect' => '/partner-supervisor/order-signup?step=OrderCard',
	                ];
	                
            	}
            }else if($step=='OrderCard' && !$model->validate()){
            	
                return [
                    'status' => 200,
                    'redirect' => '/partner-supervisor/order-signup?step=OrderPayment',
                ];
                
            }else if($step=='OrderPayment' || $step=='OrderFinish'){
            	
            	/*Check validators inline*/
            	if(Yii::$app->request->post('payment_method_credit_card_number') 
            			&& Yii::$app->request->post('payment_method_credit_card_expirate') 
            			&&  Yii::$app->request->post('payment_method_credit_card_security')){
            		$validate = [
            			'payment_method','payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security'
            		];
            	}else{
            		$validate = ['payment_method'];
            	}
            	
            	if(!$model->validate($validate)) {
            		
            		return [
            			'name' => 'error',
            			'message' => 'Error.',
            			'content' =>  Yii::$app->controller->render('@common/errors/popup',[
            					'header' => Yii::t('app','Well done!'),
            					'body' => Html::errorSummary($model,['class'=>'error-summary']),
            					'footer' => Yii::t('app','ok'),
            				]),
            			'status' => 500,
            		];
            		
            	}else{
            		
	                return [
	                    'status' => 200,
	                    'redirect' => '/partner-supervisor/order-signup?step=OrderFinish',
	                ];
	                
            	}
            	
            }else if($step=='OrderSave'){	
            	
            	$register = $model->registerClient();
            	
            	if(is_array($register)) {
            	
            		return [
            			'name' => 'error',
            			'message' => 'Error.',
            			'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
            				'header' => Yii::t('app','Well done!'),
            				'body' => print_r($register,true),
            				'footer' => Yii::t('app','ok'),
            			]),
            			'status' => 500,
            		];
            	
            	}else if($register==true){
            		
            		return [
            			'status' => 200,
            			'message' => 'Successful.',	
	            		'content' =>  Yii::$app->controller->render('@partner-supervisor-popups/registration-success'),
            		];
            		 
            	}
            	
            }else{
                return [
                    'status' => 500,
                    'message' => 'This page contain error',
                ];
            }
        }
        
        if($step=='OrderMailerTest'){
        	
        	//$protect = new \ymobiz\helpers\Password;
        	//echo $protect->generateInt(16);
        	
        	/*$user = new ymoUser;
        	$users = $user->find()->where(['email'=>'banda20segundos@hotmail.com'])->one();
        	
        	$mail = new ymoMailer;
        	$mail->sendRegistrationSuccess($users,[
        		'template' =>'registration-success-email'
        	]);*/
	        
	        exit;
        }
        
        if($step=='OrderSaveTest'){
        
        	$register = $model->registerClient(true);
        
        	if(is_array($register)) {
        		 
        		echo '<pre>';
        		print_r($register);
        		 
        	}else if($register==true){
        		echo '<pre>';
        		print_r($register);
        		 
        	}
        	 
        	exit;
        }

	    return Yii::$app->controller->render('page',[
	       'page' => Yii::$app->controller->renderPartial('pages/order',[
	            'orderModel' => $model,
	            'orderPage' => Inflector::camel2id($stepForm)	
	        ]),
	    ]);
    }
}