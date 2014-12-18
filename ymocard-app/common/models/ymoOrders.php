<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use ymobiz\models\common\ymoPaymentMethods;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoPaymentTypes;

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
class ymoOrders extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_orders';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'payment_id', 'card_number', 'status', 'created_at', 'updated_at'], 'integer'],
            [['card_expirate'], 'string', 'max' => 100],
            [['card_security'], 'string', 'max' => 3],
            [['client_id', 'payment_id', 'card_number', 'status', 'created_at', 'updated_at'], 'integer','on'=>['RegisterOrder']],
            [['card_expirate'], 'string', 'max' => 100,'on'=>['RegisterOrder']],
            [['card_security'], 'string', 'max' => 3,'on'=>['RegisterOrder']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'default' => [],
        	'RegisterOrder' => ['client_id', 'payment_id', 'card_number', 'status', 'created_at', 'updated_at','card_expirate','card_security'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'payment_id' => Yii::t('app', 'Payment ID'),
            'card_number' => Yii::t('app', 'Card Number'),
            'card_expirate' => Yii::t('app', 'Card Expirate'),
            'card_security' => Yii::t('app', 'Card Security'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

	/**
	 * @inheritdoc
	 */
	public function getCardsMany()
	{
		return $this->hasMany(ymoCards::className(), ['id' => 'card_id']);
	}

	/**
	 * @inheritdoc
	 */
	public function getCardsOne()
	{
		return $this->hasOne(ymoCards::className(), ['id' => 'card_id']);
	}

	/**
	 * @inheritdoc
	 */
	public function getClientsMany()
	{
		return $this->hasMany(ymoClients::className(), ['user_id' => 'client_id']);
	}

	/**
	 * @inheritdoc
	 */
	public function getClientsOne()
	{
		return $this->hasOne(ymoClients::className(), ['user_id' => 'client_id']);
	}

	/**
	 * @inheritdoc
	 */
	public function getComplianceMany()
	{
		return $this->hasMany(ymoClientsFiles::className(), ['clients_id' => 'client_id']);
	}

	/**
	 * @inheritdoc
	 */
	public function getComplianceOne()
	{
		return $this->hasOne(ymoClientsFiles::className(), ['clients_id' => 'client_id']);
	}

    /**
     * @inheritdoc
     */
    public function generateOrder($id,$paymentAttributes,$checkSave=false,$scenario=false)
    {
    	if($scenario){
    		$this->scenario = 'RegisterOrder';
    	}
    	
    	$cardID = Yii::$app->db->createCommand('SELECT id FROM ymo_cards WHERE client_id="'.$id.'" ORDER BY id DESC LIMIT 1')->queryScalar();
    	
    	$this->client_id = $id;
    	$this->card_id = $cardID;
    	$this->payment_id = ymoPaymentTypes::find()->where(['name'=>Inflector::slug($paymentAttributes['payment_method'],' ')])->one()->id;
    	
    	if(@$paymentAttributes['payment_method']=='credit card'){
    		$this->card_number = $paymentAttributes['payment_method_credit_card_number'];
    		$this->card_expirate = $paymentAttributes['payment_method_credit_card_expirate'];
    		$this->card_security = $paymentAttributes['payment_method_credit_card_security'];
    	}
    	
    	$this->status_compliance = 'pendent compliance';
    	$this->status_treasury = 'pendent payment';
    	$this->status_emission = 'pendent emission';
    	$this->status = 0;
    	
    	return $this->attributes;
    	
    	if(!$this->validate()){
    		if($checkSave==false){
    			return $this;
    		}
    	}else{
    		return $this->errors;
    		exit;
    	}
    }
}
