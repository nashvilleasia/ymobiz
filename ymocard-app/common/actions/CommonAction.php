<?php

namespace common\actions;

use Yii;
use yii\helpers\ArrayHelper;
use ymobiz\actions\BaseAction;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use common\models\ymoContactUs;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;

class CommonAction extends BaseAction
{
    public function ContactUs()
    {
        $model = new ymoContactUs;
        
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
            		
            	$model->contact();
            		
	            return [
	                'status' => 200,
            		'message' => 'Successful.',	
	            	'content' =>  Yii::$app->controller->renderAjax('@site-popups/contact-success'),
	            ];
            }
        }else{
        	throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }
}
