<?php

namespace ymobiz\actions;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use ymobiz\components\UserCheckPermission;
use ymobiz\activeforms\ymoLoginForm;
use ymobiz\auth\ymoUser;
use yii\web\NotFoundHttpException;

class LoginAction extends BaseAction
{
	
    /**
     * @inheritdoc
     */
    public function loginAuth()
    {	

        /*Model Dev*/
        if (!\Yii::$app->user->isGuest) {
        	$roles = array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id));
        	if(UserCheckPermission::userCan($roles)){
        		UserCheckPermission::redirectUser();
        	}
        }

        /*Check is Ajax Request*/
        if(Yii::$app->request->isAjax){
        
       		\Yii::$app->response->format = Response::FORMAT_JSON;

        	$model = new ymoLoginForm();

            $model->attributes = $model->load(Yii::$app->request->post());
            
            /*Check is Post Request*/
            if ($model->load(Yii::$app->request->post())) {
                
            	$checkCluster = ymoUser::findByEmail($model->ymo_email);
            	
            	if($checkCluster->cluster_id==Yii::$app->params['cluster_name'] || $checkCluster->cluster_id=='MASTER'){
            		 
            		if($model->login())
            		{
            			return [
            				'status' => 200,
            				'message' => 'Successfull.',
            				'content' =>  Yii::$app->controller->render('@site-popups/login-success',[
            					'htmlResponse'=>true,
            				]),
            			];
            			 
            		}else{
            			 
            			return [
            				'name' => 'validationError',
            				'message' => 'Validation fix errors.',
            				'content' => Yii::$app->controller->render('@common/errors/popup',[
            					'htmlResponse'=>true,
            					'header' => Yii::t('app','Validation errors!'),
            					'body' => Html::errorSummary($model,['class'=>'error-summary']),
            				]),
            				'status' => 500,
            			];
            		}
            		
            	}else{
            		
            		return [
            			'name' => 'validationError',
            			'message' => 'Validation fix errors.',
            			'content' => Yii::$app->controller->render('@common/errors/popup',[
            				'htmlResponse'=>true,
            				'header' => Yii::t('app','Validation errors!'),
            				'body' => Yii::t('app','This user don\'t has permission for access this cluster'),
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
    public function userAuth()
    {

        /*Model Dev*/
        if (!\Yii::$app->user->isGuest) {
        	$roles = array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id));
        	if(UserCheckPermission::userCan($roles)){
        		UserCheckPermission::redirectUser();
        	}else{
        		return Yii::$app->controller->redirect('/site');
        	}
        }
    }
}