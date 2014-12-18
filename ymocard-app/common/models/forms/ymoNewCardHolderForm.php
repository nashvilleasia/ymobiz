<?php

namespace common\models\forms;

use Yii;
use yii\base\Model;
use common\models\ymoClients;
use yii\db\ActiveRecord;
use ymobiz\helpers\Password;
use common\models\ymoCards;
use common\models\ymoClientsAddresses;
use common\models\ymoOrders;
use ymobiz\models\common\ymoPaymentTypes;
use yii\helpers\Inflector;

class ymoNewCardHolderForm extends ActiveRecord
{

    /*Attributes for cards*/
    public $card_title;
    public $card_name;

    /*Attributes for new shipping address*/
    public $shipping_firstname;
    public $shipping_lastname;
    public $shipping_address;
    public $shipping_city;
    public $shipping_zipcode;
    public $shipping_state;
    public $shipping_country;

    /*Attributes for payment*/
    public $payment_method;
    public $payment_credit_card_number;
    public $payment_credit_card_expirate;
    public $payment_credit_card_security;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_cards';
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
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'shipping_firstname','shipping_lastname','shipping_address','shipping_city','shipping_zipcode','shipping_state','shipping_country',
        	'card_title','card_name',
        	'payment_method','payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security',
        ]);
    }
    
    /**
     * @inheritdoc
    */
    public function rules()
    {
        return [
        	/*Rules for NewCardHolder*/
        	[['card_title', 'card_name'], 'string', 'on' => ['NewCardHolder']],
        	[['card_title', 'card_name'], 'required', 'on' => ['NewCardHolder']],
        	[['card_name'], 'string', 'max' => 20, 'on' => ['NewCardHolder']],
        		
        	[['cardnumber','security','name'], 'unique', 'on' => ['NewCardHolder']],
        		
        	[['dateissue', 'dateexpiration'], 'safe', 'on' => ['NewCardHolder']],
        		
        	['dateissue', 'filter', 'filter' => function ($value) {
        		return strtotime(str_replace('/', '-',$value));
        	}, 'on' => ['NewCardHolder']],
        	
        	['dateexpiration', 'filter', 'filter' => function ($value) {
        		return strtotime(str_replace('/', '-',gmdate('d/m/Y',strtotime('01/' . $value))));
        	}, 'on' => ['NewCardHolder']],
        	
        	/*Rules for PaymentCardHolder*/
        	[['payment_method'], 'required', 'on' => ['PaymentCardHolder']],
        	[['payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security'], 'common\validators\PaymentMethodsValidator','on' => ['PaymentCardHolder']],
        	[['payment_method_credit_card_number','payment_method_credit_card_security'], 'number','on' => ['PaymentCardHolder']],
        	[['payment_method_credit_card_number'], 'string','max' => 16,'on' => ['PaymentCardHolder']],
        	[['payment_method_credit_card_security'], 'string','max' => 3,'on' => ['PaymentCardHolder']],
        	[['payment_method_credit_card_security'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['PaymentCardHolder']],
        	
        	['card_expirate', 'filter', 'filter' => function ($value) {
        		return strtotime(str_replace('/', '-',gmdate('d/m/Y',strtotime('01/' . $value))));
        	}, 'on' => ['PaymentCardHolder']],

        	/*Rules for ShippingCardHolder*/
        	['shipping_country', 'common\validators\StateCodeValidator', 'model' => $this,
        		'fieldsReplace' => 'shipping_state', 'tagDisplay' => 'shipping_state_countriesid','stateWhere' => ['BRA','CAN','USA'],
        		'scenario'=>'NewCardHolder','on' => ['ShippingCardHolder']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shipping_firstname' => Yii::t('app', 'first name'),
            'shipping_lastname' => Yii::t('app', 'last name'),
            'shipping_address' => Yii::t('app', 'address'),
            'shipping_city' => Yii::t('app', 'city'),
            'shipping_zipcode' => Yii::t('app', 'postal / zip code'),
            'shipping_state' => Yii::t('app', 'state'),
            'shipping_country' => Yii::t('app', 'country'),
        		
            'card_title' => Yii::t('app', 'title'),
            'card_name' => Yii::t('app', 'card name'),
        		
            'payment_method' => Yii::t('app', 'select payment method'),
            'payment_method_credit_card_number' => Yii::t('app', 'credit card nº'),
            'payment_method_credit_card_expirate' => Yii::t('app', 'credit card expiration date'),
            'payment_method_credit_card_security' => Yii::t('app', 'security code'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
        	'NewCardHolder' => [
        		'card_title','card_name','dateissue', 'dateexpiration','cardpin',
        	],
        	'ShippingCardHolder' => [
        		'shipping_firstname','shipping_lastname','shipping_address',
        		'shipping_city','shipping_zipcode','shipping_state','shipping_country',
        	],
        	'PaymentCardHolder' => [
        		'payment_method','payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security',
        		'card_number','card_expirate','card_security'
        	],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getListCountries()
    {
    	$countries = [];
    	foreach (\ymobiz\models\common\ymoCountries::find()->all() as $key=>$value){
    		$countries[$value->id] = /*'(+'.$value->phone_code.') ' . */$value->name;
    	}
    	
    	return $countries;
    }

    /**
     * @inheritdoc
     */
    public function saveCard()
    {
    	$protect = new Password;
    	
    	$model = new self;
    	$model->scenario = 'NewCardHolder';
    	
    	$model->attributes = $model->load(Yii::$app->request->post());
    
    	$date_start = strtotime('1 January 2016');
    	$date_end = strtotime('1 December 2022');
    	$rand_date = rand($date_start, $date_end);
    	
    	$saveCard = new self;
    	$saveCard->scenario = 'NewCardHolder';
    	
    	$saveCard->attributes = $saveCard->load(Yii::$app->request->post());
    	
    	$saveCard->client_id = ymoClients::findClientId();
    	$saveCard->title = $model->card_title;
    	$saveCard->name = $model->card_name;
    	$saveCard->cardnumber = $protect->generateInt(16);
    	$saveCard->cardpin = $protect->generateInt(10);
    	$saveCard->security = $protect->generateInt(3);

    	$saveCard->plafond = '0';
    	$saveCard->dateissue = date('d/m/Y', $rand_date);
		$saveCard->dateexpiration = date('d', $rand_date) . '/' . date('Y', $rand_date);
    	$saveCard->status_code = 'pendent';
    	$saveCard->status = 0;
    	
    	if($saveCard->validate()){
    		return $saveCard;
    	}else{
    		return $saveCard->errors;
    		exit;
    	}
    }
    
    /**
     * @inheritdoc
     */
    public function saveShipping()
    {
    	$model = new self;
    	$model->scenario = 'ShippingCardHolder';
    	 
    	$model->attributes = $model->load(Yii::$app->request->post());
    	
   		$saveShipping = new ymoClientsAddresses;
    	 
    	$saveShipping->client_id = ymoClients::findClientId();
	    $saveShipping->countries_id = $model->shipping_country;
	    $saveShipping->firstname = $model->shipping_firstname;
	    $saveShipping->lastname = $model->shipping_lastname;
	    $saveShipping->address = $model->shipping_address;
	    $saveShipping->city = $model->shipping_city;
	    $saveShipping->zipcode = $model->shipping_zipcode;
	    $saveShipping->state = $model->shipping_state;
    	$saveShipping->status = 1;
    	
    	if($saveShipping->validate()){
    		return $saveShipping;
    	}else{
    		return $saveShipping->errors;
    		exit;
    	}
    }
    
    /**
     * @inheritdoc
     */
    public function savePayment($cardID=false)
    {
    	$model = new self;
    	$model->scenario = 'PaymentCardHolder';
    	 
    	$model->attributes = $model->load(Yii::$app->request->post());
    	
   		$savePayment = new ymoOrders;
   		
   		$savePayment->client_id = ymoClients::findClientId();
    	$savePayment->card_id = @$cardID;
    	if($model->payment_method){
    		$savePayment->payment_id = ymoPaymentTypes::find()->where(['name'=>Inflector::slug($model->payment_method,' ')])->one()->id;
    	}else{
    		$savePayment->payment_id = 0;
    	}
    	
    	if(@$model->payment_method=='credit-card'){
    		$savePayment->card_number = $model->payment_method_credit_card_number;
    		$savePayment->card_expirate = $model->payment_method_credit_card_expirate;
    		$savePayment->card_security = $model->payment_method_credit_card_security;
    	}
    	
    	$savePayment->status = 0;
    	$savePayment->status_treasury = 'pendent payment';
    	$savePayment->status_compliance = 'pendent compliance';
    	$savePayment->status_emission = 'pendent emission';
    	
    	if($savePayment->validate()){
    		return $savePayment;
    	}else{
    		return $savePayment->errors;
    		exit;
    	}
    }
    
    /**
     * @inheritdoc
     */
    public function newCardHolder()
    {	
    	if($this->saveCard()){
    		$this->saveCard()->save(false);
    	}else{
    		return $this->saveCard();
    	}
    	
    	$cardID = Yii::$app->db->createCommand('SELECT id FROM ymo_cards WHERE client_id="'.ymoClients::findClientId().'" ORDER BY id DESC LIMIT 1')->queryScalar();
    	
    	if($this->savePayment($cardID)){
    		$this->savePayment($cardID)->save(false);
    	}else{
    		return $this->savePayment($cardID);
    	}
    	
    	if($this->saveShipping()){
    		$this->saveShipping()->save(false);
    	}else{
    		return $this->saveShipping();
    	}
    	
    	return true;
    }
    
   /* public function saveClientCard($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	$cardAttributes = $form['OrderCard'][$this->formName()];
    	$client = self::find()->where(['email'=>$formAttributes['email']])->one();
    	 
    	$model = new ymoCards;
    	$model->generateCard(@$client->id,$cardAttributes['card_title'],$cardAttributes['card_name'],$checkSave);
  
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	$paymentAttributes = $form['OrderPayment'][$this->formName()];
    	$client = self::find()->where(['email'=>$formAttributes['email']])->one();
    
    	$model = new ymoOrders;
    	$model->generateOrder(@$client->id,$paymentAttributes,$checkSave);
    }*/
    
}
