<?php

namespace common\models\forms;

use Yii;
use ymobiz\models\common\ymoDoctypes;
use kartik\password\StrengthValidator;
use ymobiz\auth\User;
use ymobiz\models\common\ymoCountries;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yiibr\brvalidator\CpfValidator;
use yii\base\DynamicModel;
use yii\helpers\Inflector;
use ymobiz\auth\ymoUser;
use ymobiz\helpers\Password;
use ymobiz\models\common\ymoClusters;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use ymobiz\models\common\ymoPaymentMethods;
use ymobiz\models\common\ymoPaymentTypes;
use ymobiz\components\ymoMailer;
use yii\web\Session;
use ymobiz\models\common\ymoStates;
use common\models\auth\ymoAccountSettings;
use common\models\ymoClientsFiles;
use common\models\ymoOrders;
use common\models\ymoCards;
use common\models\ymoClientsAddresses;
use common\models\ymoClientsCompany;
use common\models\grid\ymoCardsPartner;

/**
 * This is the model class for table "ymo_clients".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ufirstname
 * @property string $ulastname
 * @property string $email
 * @property string $dob
 * @property integer $gender
 * @property string $phone
 * @property string $mobile
 * @property string $taxcode
 * @property string $zipcode
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $countries_id
 * @property integer $countryob_id
 * @property integer $countrynat_id
 * @property integer $countrydoctype_id
 * @property integer $termsconditions
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cards[] $cards
 * @property User $user
 * @property Countries $countries
 * @property ClientsAddresses[] $clientsAddresses
 * @property ClientsDriverslicence[] $clientsDriverslicences
 * @property ClientsFiles[] $clientsFiles
 * @property ClientsNationality[] $clientsNationalities
 * @property ClientsPassport[] $clientsPassports
 */
class ymoPartnerClientsForm extends \yii\db\ActiveRecord
{
	/*Params to form*/
	public $disableFields = false;
	
    /*Attributes for auth*/
    public $repeat_email;
    public $password;
    public $repeat_password;

    /*Attributes for check country is Brazil*/
    public $brazil_rg;
    public $brazil_cpf;

    /*Attributes for new shipping address*/
    public $shipping_shoice;
    public $shipping_firstname;
    public $shipping_lastname;
    public $shipping_address;
    public $shipping_city;
    public $shipping_zipcode;
    public $shipping_state;
    public $shipping_country;

    /*Attributes for cards*/
    public $card_title;
    public $card_name;
    public $card_client_id;
    public $card_cardpin;
    public $card_status;
    public $card_compliance;
    public $card_dateissue;

    /*Attributes for payment*/
    public $payment_method;
    public $payment_credit_card_number;
    public $payment_credit_card_expirate;
    public $payment_credit_card_security;

    /*Attributes for recovery password*/
    public $pass_recovery_input;
    public $pass_recovery_choice;
    
   /*Attributes for captcha*/
    public $verifyCode;
    
   /*Attributes for company*/
    public $company_choice;
    public $company_name;
    public $company_address;
    public $company_countries_id;
    public $company_city;
    public $company_zipcode;
    public $company_state;
    public $company_phone;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ymo_clients';
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
            'password','repeat_email','repeat_password',
            'brazil_rg','brazil_cpf','phone_prefix','mobile_prefix',
            'shipping_shoice','shipping_firstname','shipping_lastname','shipping_address','shipping_city','shipping_zipcode','shipping_state','shipping_country',
        	'card_title','card_name','card_client_id','card_cardpin','card_compliance','card_status','card_dateissue',
        	'payment_method','payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security',
        	'pass_recovery_input','pass_recovery_choice','verifyCode',
        	'company_choice','company_name','company_address','company_countries_id','company_city','company_zipcode','company_state','company_phone','company_phone_prefix'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'city', 'zipcode', 'state', 'country', 'phone', 'mobile'], 'string','on' => ['OrderSignup']],
            [['countries_id','created_at','updated_at'], 'integer','on' => ['OrderSignup']],
            [['address', 'city', 'zipcode', 'country', 'mobile','mobile_prefix'], 'required','on' => ['OrderSignup']],
        	[['mobile','phone','company_phone'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['OrderSignup']],
        	[['zipcode','company_zipcode'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){4,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['OrderSignup']],

            /*Rules for OrderSignup*/
            [['ufirstname', 'ulastname','gender'], 'string','on' => ['OrderSignup']],
            [['countryob_id','countrynat_id','countrydoctype_id','company_countries_id','countries_id','termsconditions'], 'integer','on' => ['OrderSignup']],
        		
        	[['countries_id'], 'common\validators\CountryPhoneCodeValidator', 'model' => '\common\models\forms\ymoPartnerClientsForm', 'fieldsReplace' => ['mobile_prefix','phone_prefix'], 'on' => ['OrderSignup']],
        	[['company_countries_id'], 'common\validators\CountryPhoneCodeValidator', 'model' => $this, 'fieldsReplace' => ['company_phone_prefix'], 'on' => ['OrderSignup']],
        		
        	['countries_id', 'common\validators\StateCodeValidator', 'model' => $this, 
        			'fieldsReplace' => 'state', 'tagDisplay' => 'states_countriesid','stateWhere' => ['BRA','CAN','USA'], 
        			'scenario'=>'OrderSignup','on' => ['OrderSignup']],
        		
        	['company_countries_id', 'common\validators\StateCodeValidator', 'model' => $this,
        		'fieldsReplace' => 'company_state', 'tagDisplay' => 'company_state_countriesid','stateWhere' => ['BRA','CAN','USA'],
        		'scenario'=>'OrderSignup','on' => ['OrderSignup']],
        		
        	['shipping_country', 'common\validators\StateCodeValidator', 'model' => $this,
        		'fieldsReplace' => 'shipping_state', 'tagDisplay' => 'shipping_state_countriesid','stateWhere' => ['BRA','CAN','USA'],
        		'scenario'=>'OrderSignup','on' => ['OrderSignup']],
        		
            [['dob'], 'safe','on' => ['OrderSignup']],
        	[['dob'], 'date','format' => 'php:d-M-Y','on' => ['OrderSignup']],
        	[['dob'], 'filter','filter' => function ($value) {
       		 	return strtotime($value);
    		},'on' => ['OrderSignup']],
        		
            [['ufirstname', 'ulastname','dob','countryob_id','countrynat_id','countrydoctype_id',
                'email','repeat_email','password','repeat_password'
            ], 'required','on' => ['OrderSignup']],

            [['password','repeat_password'], 'string','length' => [8, 24],'on' => ['OrderSignup']],
            //['password', StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'email'],
            ['repeat_email', 'compare', 'compareAttribute' => 'email','on' => ['OrderSignup']],
            ['repeat_password', 'compare', 'compareAttribute' => 'password', 'message'=> Yii::t('app','These passwords don\'t match. Try again?.'),'on' => ['OrderSignup']],
            
        	[['email','repeat_email'], 'email','on' => ['OrderSignup']],
        	[['email'], 'unique', 'on' => ['OrderSignup']],
        	
            ['termsconditions','required', 'requiredValue' => true, 'message' => Yii::t('app','You should accept term to use our service'),'on' => ['OrderSignup']],
            ['company_choice','boolean', 'on' => ['OrderSignup']],

            //[['brazil_rg','brazil_cpf'], 'common\validators\BrazilValidator','on' => ['OrderSignup']],
            ['brazil_cpf', CpfValidator::className()],
            
            ['verifyCode', '\ymobiz\components\ymoCaptchaValidator', 'captchaAction' => 'partner-supervisor/default/captcha' ,'on' => ['OrderSignup']],
        	      	
        	/*Rules for OrderCard*/
        	[['card_title', 'card_name','card_cardpin'], 'string'],
        	[['card_dateissue','card_client_id','card_status'], 'integer'],
        	[['card_title', 'card_name'], 'required', 'on' => ['OrderCard']],
        	[['card_name'], 'string', 'max' => 20, 'on' => ['OrderCard']],

            [['card_compliance'], 'string','on' => ['OrderCard'], 'skipOnEmpty' => true],
            [['card_compliance'], 'file', 'mimeTypes' => 'image/jpeg, image/jpg, image/png, application/pdf','maxFiles' => 10,'on' => ['OrderCard'], 'skipOnEmpty' => true],

			/*Rules for OrderPayment*/
    		//[['payment_method'],'required', 'message' => Yii::t('app','You heed choice one payment method'),'on' => ['OrderPayment']],
        	[['payment_method'], 'required', 'on' => ['OrderPayment']],
        	[['payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security'], 'common\validators\PaymentMethodsValidator','on' => ['OrderPayment']],
        	[['payment_method_credit_card_number','payment_method_credit_card_security'], 'number','on' => ['OrderPayment']],
        	[['payment_method_credit_card_number'], 'string','max' => 16,'on' => ['OrderPayment']],
        	[['payment_method_credit_card_security'], 'string','max' => 3,'on' => ['OrderPayment']],
        	[['payment_method_credit_card_security'], 'match', 'pattern' => '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/',
        			'message'=> Yii::t('app','{attribute} number dont\' valid.'),
        			'on' => ['updateContact','OrderSignup']],
        	
        	/*Rules for Default*/
    		[['status','phone_id', 'mobile_id'], 'string'],
    		
    		/*Rules for Register ymoClient*/
        	/*[['ufirstname','ulastname','email','dob','gender','phone','phone_id','mobile','mobile_id','taxcode',
        		'zipcode','address','city','state','countries_id','countryob_id','countrynat_id','countrydoctype_id',
        		'termsconditions','status'],'safe','on'=> ['RegisterClient']],*/
    		
    		/*Rules for Register ymoClient Address*/
        	/*[['shipping_shoice','shipping_firstname','shipping_lastname','shipping_address',
        			'shipping_city','shipping_zipcode','shipping_state','shipping_country',],'safe','on'=> ['RegisterAddress']],*/
    		
    		/*Rules for Register ymoClient Company*/
        	/*[['company_choice','company_name','company_address','company_countries_id',
        			'company_city','company_zipcode','company_state','company_phone','company_phone_prefix'],'safe','on'=> ['RegisterCompany']],*/
    		
    		/*Rules for Register ymoUser*/
        	/*[['email','repeat_email','password','repeat_password'],'safe','on'=> ['RegisterUser']],*/
        		
    		
            /*[['ufirstname', 'ulastname','email'], 'filter', 'filter' => 'trim'],
			[['ufirstname', 'ulastname','email','countries_id'], 'required'],

            ['email', 'email'],

            [['user_id', 'countries_id'], 'required'],
            [['ufirstname', 'ulastname', 'zipcode', 'state'], 'string', 'max' => 45],
            [['id', 'user_id', 'gender', 'countries_id', 'countryob_id', 'countrynat_id', 'countrydoctype_id', 'termsconditions', 'status', 'created_at', 'updated_at'], 'integer'],
            [['email', 'address', 'city'], 'string', 'max' => 255],
            [['phone', 'mobile'], 'string', 'max' => 30],
            [['taxcode'], 'string', 'max' => 20],
            [['dob'], 'safe'],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'uploaddoc' => false,
            'user_id' => Yii::t('app', 'user id'),
            'ufirstname' => Yii::t('app', 'first name*'),
            'ulastname' => Yii::t('app', 'last name*'),
            'country' => Yii::t('app', 'country*'),
            'email' => Yii::t('app', 'email*'),
            'dob' => Yii::t('app', 'date of birth*'),
            'gender' => Yii::t('app', 'gender*'),
            'phone' => Yii::t('app', 'phone'),	
        	'phone_prefix' => Yii::t('app', 'code'),
            'mobile' => Yii::t('app', 'mobile*'),	
        	'mobile_prefix' => Yii::t('app', 'code'),
            'taxcode' => Yii::t('app', 'tax code*'),
            'zipcode' => Yii::t('app', 'postal / zip code*'),
            'address' => Yii::t('app', 'address*'),
            'city' => Yii::t('app', 'city*'),
            'state' => Yii::t('app', 'state'),
            'countryob_id' => Yii::t('app', 'country of birth*'),
            'countrynat_id' => Yii::t('app', 'country of nationality*'),
            'countrydoctype_id' => Yii::t('app', 'choose a Government-issued ID*'),
            'termsconditions' => Yii::t('app','terms and conditions*'),
            'status' => Yii::t('app', 'status*'),
            'created_at' => Yii::t('app', 'created at'),
            'updated_at' => Yii::t('app', 'updated at'),
        	'verifyCode' => Yii::t('app','Verification Code*'),

            /*Extras attributes*/
            'brazil_rg' => Yii::t('app', 'RG*'),
            'brazil_cpf' => Yii::t('app', 'CPF*'),
            'repeat_email' => Yii::t('app', 'repeat email*'),
            'password' => Yii::t('app', 'password*'),
            'repeat_password' => Yii::t('app', 'repeat password*'),
            'countries_id' => Yii::t('app', 'country*'),

        	'shipping_shoice' => Yii::t('app','click here if your shipping address is diferent from the one above'),
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
        		
            'pass_recovery_input' => Yii::t('app', 'password recovery choice'),
        		
        	'company_choice' => Yii::t('app', 'Click here if you are a Company'),
        	'company_name' => Yii::t('app', 'company'),
        	'company_address' => Yii::t('app', 'address'),
        	'company_countries_id' => Yii::t('app', 'country'),
        	'company_city' => Yii::t('app', 'city'),
        	'company_zipcode' => Yii::t('app', 'postal / zip code'),	
        	'company_state' => Yii::t('app', 'state'),		
        	'company_phone' => Yii::t('app', 'phone'),			
        	'company_phone_prefix' => Yii::t('app', 'code'),	
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(ymoCards::className(), ['clients_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(ymoUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasOne(ymoCountries::className(), ['id' => 'countries_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsAddresses()
    {
        return $this->hasMany(ymoClientsAddresses::className(), ['clients_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsDriverslicences()
    {
        return $this->hasMany(ymoClientsDriverslicence::className(), ['clients_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsFiles()
    {
        return $this->hasMany(ymoClientsFiles::className(), ['clients_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsNationalities()
    {
        return $this->hasMany(ymoClientsNationality::className(), ['clients_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsPassports()
    {
        return $this->hasMany(ymoClientsPassport::className(), ['clients_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientsCompany()
    {
        return $this->hasMany(ymoClientsCompany::className(), ['client_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => ['email'],

            'OrderSignup' => [
                'ufirstname', 'ulastname','dob','gender','countryob_id','countrynat_id','countrydoctype_id',
                'email','repeat_email','password','repeat_password','address', 'city', 'zipcode', 'state',
                'countries_id', 'phone', 'mobile','phone_prefix','mobile_prefix','termsconditions','brazil_rg','brazil_cpf','created_at','updated_at','verifyCode',
            	'company_choice','company_name','company_address','company_countries_id','company_city','company_zipcode','company_state','company_phone','company_phone_prefix',
            ],

			'OrderCard' => [
        		'card_title','card_name','card_client_id','card_cardpin','card_compliance','card_status','card_dateissue'
        	],
        		
        	'OrderPayment' => [
        		'payment_method','payment_method_credit_card_number','payment_method_credit_card_expirate','payment_method_credit_card_security'
        	],	
        		
            'RegisterClient' => ['ufirstname','ulastname','email','dob','gender','phone','phone_id','mobile','mobile_id','taxcode',
        		'zipcode','address','city','state','countries_id','countryob_id','countrynat_id','countrydoctype_id',
        		'termsconditions','status'],
        		
        	'RegisterUser' => ['email','repeat_email','password','repeat_password',],
        		
        	'RegisterAddress' => ['shipping_shoice','shipping_firstname','shipping_lastname','shipping_address',
        			'shipping_city','shipping_zipcode','shipping_state','shipping_country',],
        		
        	'RegisterCompany' => ['company_choice','company_name','company_address','company_countries_id',
        			'company_city','company_zipcode','company_state','company_phone','company_phone_prefix'],
        ];
    }
    

    /**
     * @inheritdoc
     */
    public static function findClientId()
    {	
    	return ymoUser::findOne([Yii::$app->user->id, 'status' => 1])->clients->user_id;
    }
    
    public function fields()
    {
    	return [
    		'phone' => function () {
    			return $this->phone_prefix . ' ' . $this->phone;
    		},
    	];
    }

    /**
     * @inheritdoc
     */
    public function registerClient($checkSave=false)
    {
        $sessionForm = @Yii::$app->session['steps'];
        	
        if($sessionForm){
        	
        	if(is_array($this->saveUser($sessionForm,$checkSave))){
        		return $this->saveUser($sessionForm,$checkSave);
        	}else if(is_array($this->saveClient($sessionForm,$checkSave))){
        		return $this->saveClient($sessionForm,$checkSave);
        	}else if(is_array($this->saveClientFiles($sessionForm,$checkSave))){
        		return $this->saveClientFiles($sessionForm,$checkSave);
        	}else if(is_array($this->saveClientCard($sessionForm,$checkSave))){
        		return $this->saveClientCard($sessionForm,$checkSave);
        	}else if(is_array($this->saveClientPayment($sessionForm,$checkSave))){
        		return $this->saveClientPayment($sessionForm,$checkSave);
        	}else if(is_array($this->saveClientAddress($sessionForm,$checkSave))){
        		return $this->saveClientAddress($sessionForm,$checkSave);
        	}else if(is_array($this->saveClientCompany($sessionForm,$checkSave))){
        		return $this->saveClientCompany($sessionForm,$checkSave);
        	}else if(is_array($this->updateClient($sessionForm,$checkSave))){
        		return $this->updateClient($sessionForm,$checkSave);
        	}else if(is_array($this->saveClientActivation($sessionForm,$checkSave))){
        		return $this->saveClientActivation($sessionForm,$checkSave);
        	}else{
        		return true;
        	}
        	
        }else{
        	return ['Não existe form na sessão'];
        }
    }

    /**
     * @inheritdoc
     */
    public function saveUser($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	
    	if(!$this->validate()){
    		
    		$model = new ymoUser;
    		$model->scenario = 'create';
    		
    		$protect = new Password();
    		
    		$model->username = $formAttributes['ufirstname'] . ' ' . $formAttributes['ulastname'];
    		$model->email = $formAttributes['email'];
    		$model->password = $protect->encryptUncompress(base64_decode($formAttributes['password']));
    		$model->repeat_password = $protect->encryptUncompress(base64_decode($formAttributes['repeat_password']));
    		$model->confirmable = false;
    		$model->access_token = $protect->generateRandomString();
    		$model->confirmation_token = $protect->generateRandomString();
    		$model->confirmation_sent_at = time();
			$model->confirmed_at = null;
			$model->group_id = 'Account';
    		$model->status = 0;
    		
    		$model->attributes = $model->load($formAttributes);
    		
    		if ($model->validate()) {
    			if($checkSave==false){
    				$model->save();
    			}
    			return true;
    		}else{
    			return $model->errors;
    			exit;
    		}
    		
    	}else{
    		return $this->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public function saveClientCard($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	$cardAttributes = $form['OrderCard'][$this->formName()];
    	$user = ymoUser::find()->where(['email'=>$formAttributes['email']])->one();
    	
    	$model = new ymoCards;
    	$model->generateCard(@$user->id,$cardAttributes['card_title'],$cardAttributes['card_name'],$checkSave,'RegisterCard');
    	return $model->save(false);
    }

    /**
     * @inheritdoc
     */
    public function saveClientPayment($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	$paymentAttributes = $form['OrderPayment'][$this->formName()];
    	$user = ymoUser::find()->where(['email'=>$formAttributes['email']])->one();
    	 
    	$model = new ymoOrders;
    	$model->generateOrder(@$user->id,$paymentAttributes,$checkSave,'RegisterOrder');
    	return $model->save(false);
    }

    /**
     * @inheritdoc
     */
    public function saveClient($form,$checkSave=false)
    {
    	$model = new self;
    	$model->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$model->formName()];
    	 
    	if(!$model->validate()){
    		
    		$user = ymoUser::find()->where(['email'=>$formAttributes['email']])->one();
    		$model->user_id = @$user->id;
    		 
    		$attributes = [
    			'ufirstname','ulastname','email','dob','gender','phone','phone_id','mobile','mobile_id','taxcode',
    			'zipcode','address','city','state','countries_id','countryob_id','countrynat_id','countrydoctype_id',
    			'termsconditions','status'
    		];
    		 
    		foreach($formAttributes as $key => $value)
    		{
    			if(!is_array($value) && $value!='')
    			{
    				if(in_array($key,$attributes)){
    					$model->$key = $value;
    				}
    	
    				if($key=='phone' || $key=='phone_prefix'){
    					$model->phone = $formAttributes['phone_prefix'] . ' ' . $formAttributes['phone'];
    					$model->phone_id = preg_replace('/[^A-Za-z0-9_]/','',$formAttributes['phone_prefix'] . ' ' . $formAttributes['phone']);
    				}
    	
    				if($key=='mobile' || $key=='mobile_prefix'){
    					$model->mobile = $formAttributes['mobile_prefix'] . ' ' . $formAttributes['mobile'];
    					$model->mobile_id = preg_replace('/[^A-Za-z0-9_]/','',$formAttributes['mobile_prefix'] . ' ' . $formAttributes['mobile']);
    				}
    			}
    		}
    		
    		$model->partner_id = ymoCardsPartner::findPartnerId();
    		$model->status_code = 'blocked';
    		$model->taxcode = 0;
    		$model->status = 0;
    		
    		if($checkSave==false){
    			$model->save(false);
    		}
    		
    		return true;
    		 
    	}else{
    		return $model->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public function saveClientAddress($form,$checkSave=false)
    {
    	$model = new ymoClientsAddresses();
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	 
    	if(!$this->validate()){
    		
    		$attributes = [
    				'shipping_shoice','shipping_firstname','shipping_lastname','shipping_address',
    				'shipping_city','shipping_zipcode','shipping_state','shipping_country'
    				];
    		
    		$user = ymoUser::find()->where(['email'=>$formAttributes['email']])->one();
    		
    		if($formAttributes['shipping_shoice']=='1'){
    			
    			$model->client_id = @$user->id;
	    		$model->countries_id = $formAttributes['shipping_country'];
	    		$model->firstname = $formAttributes['shipping_firstname'];
	    		$model->lastname = $formAttributes['shipping_lastname'];
	    		$model->address = $formAttributes['shipping_address'];
	    		$model->city = $formAttributes['shipping_city'];
	    		$model->zipcode = $formAttributes['shipping_zipcode'];
	    		$model->state = $formAttributes['shipping_state'];
	    		$model->shipping_default = $formAttributes['shipping_shoice'];
	    		$model->status = 1;
	    		
	    		if($checkSave==false){
	    			$model->save(false);
	    		}
	    		
    		}else{
    			
    			$model->client_id = @$user->id;
	    		$model->status = 0;
	    		
    			if($checkSave==false){
    				$model->save(false);
    			}
    		}
    		
    		return true;
    		
    	}else{
    		return $this->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public function saveClientCompany($form,$checkSave=false)
    {
    	$model = new ymoClientsCompany();
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	 
    	if(!$this->validate()){
    		
    		if($formAttributes['company_choice']=='1'){
    			
    			$user = ymoUser::find()->where(['email'=>$formAttributes['email']])->one();
    			
    			$model->client_id = @$user->id;
	    		$model->countries_id = $formAttributes['company_countries_id'];
	    		$model->name = $formAttributes['company_name'];
	    		$model->phone = $formAttributes['company_phone_prefix'] . ' ' . $formAttributes['company_phone'];
	    		$model->phone_id = preg_replace('/[^A-Za-z0-9_]/','',$formAttributes['company_phone_prefix'] . ' ' . $formAttributes['company_phone']);
	    		$model->address = $formAttributes['company_address'];
	    		$model->city = $formAttributes['company_city'];
	    		$model->zipcode = $formAttributes['company_zipcode'];
	    		$model->state = $formAttributes['company_state'];
	    		$model->status = 1;
	    		
	    		if($checkSave==false){
	    			$model->save(false);
	    		}
	    		
    		}
    		
    		return true;
    		
    	}else{
    		return $this->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public function saveClientFiles($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form;
    	$formFiles = @$formAttributes['OrderFiles']['card_compliance'];
    	 
    	if(!$this->validate()){
    		
    		if(@$formFiles!=false){
    			
    			$user = ymoUser::find()->where(['email'=>$formAttributes['OrderSignup'][$this->formName()]['email']])->one();

    			$protect = new Password();
    			
    			foreach ($formFiles as $key=>$value){

    				$model = new ymoClientsFiles();
    				
	    			$model->clients_id = @$user->id;
		    		$model->system_id = ymoClusters::find()->where(['code'=>Yii::$app->id,'status'=>1])->one()->id;
		    		$model->name = $value['name'];
		    		$model->size = $value['size'];
		    		$model->filecontent = base64_encode($protect->encryptByKey(base64_decode($value['filecontent']),@$user->auth_key));
		    		$model->mimetype = $value['mimetype'];
		    		$model->extension = $value['extension'];
		    		$model->status_code = 'send';
		    		$model->status = 0;
		    		
		    		if($checkSave==false){
		    			$model->save(false);
		    		}
	    		
    			}
    			
    			return true;
		    	
    		}
    		
    	}else{
    		return $this->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public function updateClient($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	
    	if(!$this->validate()){
	
    		if($checkSave==false){
	    		$client = self::find()->where(['email'=>$formAttributes['email']])->one();
	    		$user = ymoUser::find()->where(['email'=>$formAttributes['email']])->one();
	    		
	    		$client->user_id = $user->id;
	    		$client->update();
	    		
	    		$roleCardHolder = \Yii::$app->authManager->createRole('Card Holder');
	    		\Yii::$app->authManager->assign($roleCardHolder, $user->id);
	    		
	    		$roleGuest = \Yii::$app->authManager->createRole('Guest Role');
	    		\Yii::$app->authManager->assign($roleGuest, $user->id);
    		}
    		
    		return true;
    		
    	}else{
    		return $this->errors;
    		exit;
    	}
    }

    /**
     * @inheritdoc
     */
    public function saveClientActivation($form,$checkSave=false)
    {
    	$this->setScenario('OrderSignup');
    	$formAttributes = $form['OrderSignup'][$this->formName()];
    	
    	if($checkSave==false){
	    	$user = new ymoUser;
	    	$users = $user->find()->where(['email'=>$formAttributes['email']])->one();
	    	 
	    	$mail = new ymoMailer;
	    	$mail->sendRegistrationSuccess($users,[
	    		'template' =>'registration-success-email'
	    	]);
	    	
	    	$session = new Session;
	    	$session->remove('steps');
    	}
    	
    	return true;
    }

    /**
     * @inheritdoc
     */
    public function updateContactDetail()
    {
        if ($this->validate()) {

            $this->countries_id = $this->CountriesName($_POST[$this->formName()]['country'])->id;

            if ($this->update()) {
                return true;
            }
        }

        return false;
    }
    
    /**
     * @inheritdoc
     */
    public function protectedData($data=false)
    {
    	if($data!=false){
    		return $data;
    	}else{
	    	return [
	    		'class' => 'ymobiz\helpers\Password',
	    		'method' => 'base64_decode',
	    		'params' => [
	    			'securityAction' => 'decode',
	    			'compression' => false,
	    		],
	    		'data' => [
	    			'password','repeat_password'
	    		],
	    	];
    	}
    }

    /**
     * @inheritdoc
     */
    public function Countries($id,$attribute)
    {
        $countries = ymoCountries::find()->where(['id' => $id])->one();
        if($countries!=false)
        {
        	return $countries->$attribute;
        }
    }

    /**
     * @inheritdoc
     */
    public function CountriesName($name)
    {
        return ymoCountries::find()->where(['name' => $name])->one();
    }

    /**
     * @inheritdoc
     */
    public function setCountry($value)
    {
        return $this->country = $value;
    }

    /**
     * @inheritdoc
     */
    public function getCountry()
    {
        return $this->Countries($this->countries_id,'name');
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
    public function getGender()
    {
        return ($this->gender==0) ? 'female' : 'male';
    }

    /**
     * @inheritdoc
     */
    public function getGenderForm()
    {
        return [
            'male' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','male'),
            'female' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','female'),
        ];
    }
    
    public function getMethodsForm()
    {
    	return [
    		//'paypal' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','paypal'),
    		'bank-transfer' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','bank-transfer'),
    		'credit-card' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit-card'),
    	];
    }

    /**
     * @inheritdoc
     */
    public function getClients()
    {
        return self::find()->where(['user_id' => Yii::$app->user->id]);
    }

    /**
     * @inheritdoc
     */
    public function getDoctypes()
    {
        return ArrayHelper::map(ymoDoctypes::find()->where(['status'=>'1'])->all(),'id','name');
    }
    
    public function getRecoveryType()
    {
    	return [
    		'email' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','email'), 
    		'mobile number' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','mobile number')
    	];
    }
    
    /**
     * @inheritdoc
     */
    public function findClientsByPhoneNumber($phone)
    {
    	return self::find()->where(['mobile_id' => $phone,'status' => 1])->one();
    }
    
    /**
     * @inheritdoc
     */
    public function findClientsByEmail($email)
    {
    	return self::find()->where(['email' => $email,'status' => 1])->one();
    }
    
    /**
     * @inheritdoc
     */
    public static function getClientFullName($client_id)
    {
    	return self::findOne($client_id)->ufirstname . ' ' . self::findOne($client_id)->ulastname;
    }

    /**
     * @inheritdoc
     */
    public function finishFormOrderSignup($data)
    {
    	if($data){
    		
	    	$arrayOrderSignup = [];
	    	$sessionSignup = $data[$this->formName()];
	    	
	    	foreach ($sessionSignup as $key => $value ){
	    			
	    		$newKey = $key;
	    		$newValue = $value;
	    			
	    		if($newKey=='countrydoctype_id'){
	    			$newValue = @\ymobiz\models\common\ymoDoctypes::findOne($newValue)->name;
	    		}else if($newKey=='countryob_id' || $newKey=='countrynat_id' || $newKey=='countries_id'
	    				|| $newKey=='shipping_country' || $newKey=='company_countries_id'){
	    			$newValue = \ymobiz\models\common\ymoCountries::findOne($newValue)->name;
	    		}else if(is_int($newKey) && $newKey=='state' || is_int($newKey) && $newKey=='shipping_state' 
	    				|| is_int($newKey) && $newKey=='company_state'){
	    			$newValue = \ymobiz\models\common\ymoStates::findOne($newValue)->name;
	    		}else if($newKey=='password' || $newKey=='repeat_password'){
	    			$newValue =  '**************';
	    		}else if($newValue=='1' || $newValue=='0'){
	    			$newValue = $newValue==1 ? Yii::t('app','yes') : Yii::t('app','no');
	    		}else if($newKey=='phone'){
	    			$newKey = 'full-phone';
	    			$newLabel = 'Phone';
	    		}else if($newKey=='mobile'){
	    			$newKey = 'full-mobile-phone';
	    			$newLabel = 'Mobile Phone';
	    		}else if($newKey=='company_phone'){
	    			$newKey = 'full-company-phone';
	    			$newLabel = 'Company Phone';
	    		}else if($newKey=='phone_prefix' || $newKey=='mobile_prefix' || $newKey=='company_phone_prefix'){
	    			$newKey = false;
	    		}
	    			
	    		if($newKey=='full-phone'){
	    			$newValue = $sessionSignup['phone_prefix'] . ' - ' . $sessionSignup['phone'];
	    		}else if($newKey=='full-mobile-phone'){
	    			$newValue = $sessionSignup['mobile_prefix'] . ' - ' . $sessionSignup['mobile'];
	    		}else if($newKey=='full-company-phone'){
	    			$newValue = $sessionSignup['company_phone_prefix'] . ' - ' . $sessionSignup['company_phone'];
	    		}
	    			
	    		if($newKey!=false && $newValue!=''){
	    			$arrayOrderSignup[$newKey] = $newValue;
	    		}
    		}
	    		
	    	return $arrayOrderSignup;
    	}
    }

    /**
     * @inheritdoc
     */
    public function finishFormOrderCard($data)
    {
    	if($data){
    		
	    	$arrayOrderCard = [];
	    	$sessionCard = $data[$this->formName()];
	    	
	    	foreach ($sessionCard as $key => $value ){
	    			
	    		$newKey = $key;
	    		$newValue = $value;
	    		
	    		if($newKey!=false && $newValue!=''){
	    			$arrayOrderCard[$newKey] = $newValue;
	    		}
    		}
    		
    		return $arrayOrderCard;
    	}
    }

    /**
     * @inheritdoc
     */
    public function finishFormOrderFiles($data)
    {
    	if($data){
    		
	    	$arrayOrderFiles = [];
	    	$sessionFiles = $data;
	    	
	    	foreach ($sessionFiles as $key => $value ){
	    			
	    		$newKey = $key;
	    		$newValue = $value;
	    		
	    		if($newKey!=false && $newValue!=''){
	    			$arrayOrderFiles[$newKey] = $newValue;
	    		}
    		}
    		
    		return $arrayOrderFiles;
    	}
    }

    /**
     * @inheritdoc
     */
    public function finishFormOrderPayment($data)
    {
    	if($data){
    		
	    	$arrayOrderPayment = [];
	    	$sessionPayment = $data[$this->formName()];
	    		    	
	    	foreach ($sessionPayment as $key => $value ){
	    			
	    		$newKey = $key;
	    		$newValue = $value;
	    		
	    		if($newKey!=false && $newValue!=''){
	    			$arrayOrderPayment[$newKey] = $newValue;
	    		}
    		}
    		
    		return $arrayOrderPayment;
    	}
    }
}
