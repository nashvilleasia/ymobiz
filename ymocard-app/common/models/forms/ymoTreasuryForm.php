<?php

namespace common\models\forms;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoPaymentMethods;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoPaymentTypes;
use common\models\ymoOrders;
use common\models\ymoClientsMessages;

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
class ymoTreasuryForm extends ymoOrders
{
	public $receipt;

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'receipt'
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['receipt', 'in', 'range' => array_keys(self::treasurySendersSupervisor()),'on'=>['SupervisorSaveTreasury']],
            [['status_code'], 'required','on'=>['SupervisorSaveTreasury']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'default' => ['receipt','client_id','status_code'],
        	'SupervisorSaveTreasury' => ['receipt','card_id','client_id','status_code'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function saveTreasurySupervisor()
    {
    	
    	$cardID = Yii::$app->request->post('cardid');
    	
    	$model = self::findOne(['card_id'=>$cardID]);
    	$model->status_treasury = 'confirmed payment';
    	
    	if($model->validate())
    	{
    		if($model->save()){
    			
    			/*$groups = $this->clearFalseValues($this->group);
    			
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
    			}*/
    			
    			return true;
    		}
    	}
    	return false;
    }

    /**
     * @inheritdoc
     */
    public static function treasurySendersSupervisor()
    {
    	return [
    		'sent-receipt' => 'sent receipt',
    		'sent-receipt' => 'sent receipt',
    	];
    }
}
