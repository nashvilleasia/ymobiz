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

class StaffCallCenterAction extends BaseAction
{
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
							'custom' => Yii::$app->controller->renderPartial('@staff-call-popups/send-message'),
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