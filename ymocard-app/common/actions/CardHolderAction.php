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

class CardHolderAction extends BaseAction
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
						'custom' => Yii::$app->controller->renderPartial('@card-holder-popups/block-ymocard'),
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
						'custom' => Yii::$app->controller->renderPartial('@card-holder-popups/unblock-ymocard'),
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
						'custom' => Yii::$app->controller->renderPartial('@card-holder-popups/plafond-edition'),
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
	
	/**
	 * @inheritdoc
	 */
	public function newCardHolder()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			$cards = new ymoNewCardHolderForm;
			$cards->scenario = 'NewCardHolder';
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	
			if($cards->newCardHolder())
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
				];;
	
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
}