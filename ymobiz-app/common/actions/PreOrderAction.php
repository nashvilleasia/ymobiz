<?php

namespace common\actions;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use ymobiz\actions\BaseAction;
use yii\web\NotFoundHttpException;
use yii\web\JsExpression;
use common\models\forms\ymoPreOrder;

class PreOrderAction extends BaseAction
{
    
	/**
	 * @inheritdoc
	 */
	public function savePreOrder()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$register = new ymoPreOrder;
			$register->scenario = 'PreOrderClient';	
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			return [
					'name' => 'validationError',
					'message' => 'Validation fix errors.',
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => print_r($register->savePreOrder(),true),
					]),
					'status' => 500,
				];
	
			if($register->savePreOrder())
			{
			  
				return [
					'name' => 'success',
					'message' => 'Successfull.',
					'content' =>  Yii::$app->controller->render('@common/errors/popup',[
						'custom' => Yii::$app->controller->renderPartial('@card-holder-popups/order-done'),
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
					'content' => Yii::$app->controller->render('@common/errors/popup',[
						'id' => 'form-company-details',
						'header' => Yii::t('app','Validation errors!'),
						'body' => Html::errorSummary($register,['class'=>'error-summary']),
					]),
					'status' => 500,
				];
			  
			}
		}else{
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}
}