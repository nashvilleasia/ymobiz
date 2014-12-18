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

class PartnerAccountAction extends BaseAction
{
    
	/**
	 * @inheritdoc
	 */
	public function savePayment()
	{
		/*Check is Ajax Request*/
		if(Yii::$app->request->isAjax){
	
			/*Model Dev*/
			//$cards = new ymoPartnerNewCardHolderForm();
			//$cards->scenario = 'NewCardHolder';
	
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
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
}