<?php

namespace common\models\forms;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoPaymentMethods;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoPaymentTypes;
use common\models\ymoOrders;
use common\models\ymoClients;
use common\models\ymoClientsMessages;
use common\models\grid\ymoCardsSupervisor;

/**
 * This is the model class for table "ymo_orders".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $payment_id
 * @property integer $card_number
 * @property string $card_expirate
 * @property string $card_security
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class ymoEmissionForm extends ymoOrders
{
	public $group;

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'group'
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['group', 'in', 'range' => array_keys(self::emissionSendersSupervisor()),'on'=>['SupervisorSaveEmission']],
            [['status_code'], 'required','on'=>['SupervisorSaveEmission']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'default' => ['group','client_id','status_code'],
        	'SupervisorSaveEmission' => ['group','card_id','client_id','status_code'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function saveEmissionSupervisor()
    {
    	$cardID = Yii::$app->request->post('cardid');
    	
    	$model = ymoOrders::findOne(['card_id'=>$cardID]);
    	$model->status_emission = 'confirmed emission';
    	$model->status = 1;
    	
    	if($model->validate())
    	{
    		if($model->save()){
    			
    			$groups = $this->clearFalseValues($this->group);
    			
    			if($groups){
    				foreach ($groups as $groupID){
    					$extraMessage = new ymoClientsMessages();
    					$extraMessage->scenario = 'SupervisorSendMessages';
    					$extraMessage->mode = 'cc';
    					$extraMessage->module = 'emission';
    					$extraMessage->title = Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment confirmed');
    					$extraMessage->message = Yii::$app->getModule('site')->ymoTranslate->t('site','app','your payment has confirmed, please check your status card.');
    					$extraMessage->card_id = $model->card_id;
    					$extraMessage->user_id = $model->client_id;
    					$extraMessage->group = $groupID;
    					if($extraMessage->validate()){
    						$extraMessage->save(false);
    					}else{
    						return $extraMessage->errors;
    					}
    				}
    			}
    			
    			$cards = ymoCardsSupervisor::findOne($cardID);
    			$cards->status_code = 'active';
    			$cards->status = 1;
    			$cards->save();
    			
    			return true;
    		}
    	}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public static function emissionSendersSupervisor()
    {
    	return [
    		'partner' => 'notify partner',
    		'user' => 'notify user',
    	];
    }

    /**
     * @inheritdoc
     */
    public function clearFalseValues($array=false)
    {
    	if($array){
	    	foreach ($array as $key=>$value){
	    		if($value==false){
	    			unset($array[$key]);
	    		}
	    	}
	    	 
	    	sort($array);
    	}
    	
    	return $array;
    	
    }
}
