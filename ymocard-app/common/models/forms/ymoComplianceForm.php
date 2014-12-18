<?php

namespace common\models\forms;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoPaymentMethods;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoPaymentTypes;
use common\models\ymoClientsFiles;
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
class ymoComplianceForm extends ymoClientsFiles
{
	public $compliances;

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'compliances'
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['compliances', 'in', 'range' => array_keys(self::complianceSendersSupervisor()),'on'=>['SupervisorSaveCompliance']],
            [['clients_id','status_code'], 'required','on'=>['SupervisorSaveCompliance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'default' => ['compliances','clients_id','status_code'],
        	'SupervisorSaveCompliance' => ['compliances','clients_id','status_code'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function saveComplianceSupervisor()
    {
    	$cardID = Yii::$app->request->post('cardid');
    	 
    	$model = ymoOrders::findOne(['card_id'=>$cardID]);
    	$model->status_compliance = 'confirmed compliance';
    	
    	if($model->validate())
    	{
    		if($model->save()){
    			
    			/*$groups = $this->clearFalseValues($this->compliances);
    			 
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
    public static function complianceSendersSupervisor()
    {
    	return [
    		'drive-license' => 'drive license',
    		'id-compliance' => 'id compliance',
    		'residence-compliance' => 'residence compliance',
    	];
    }
}
