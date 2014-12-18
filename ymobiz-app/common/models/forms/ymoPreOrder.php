<?php

namespace common\models\forms;

use Yii;
use yii\base\Model;
use common\models\ymoBizClients;

class ymoPreOrder extends ymoBizClients
{
	/*Attributes from ymoBizClients*/
	public $user_company_id;
	public $user_fname;
	public $user_lname;
	public $user_email;
	public $user_repeat_email;
	public $user_password;
	public $user_repeat_password;
	public $user_gender;
	public $user_dob;
	public $user_dob_day;
	public $user_dob_month;
	public $user_dob_year;
	public $user_terms;
	public $user_newsletter;
	
	/*Attributes from ymoCompanies*/
	public $company_name;
	public $company_taxcode;
	public $company_business_area;
	public $company_address;
	public $company_city;
	public $company_zipcode;
	public $company_country;
	public $company_email;
	public $company_phone;
	
	
	/**
	 * @inheritdoc
	 */
	public function attributes()
	{
		return array_merge(parent::attributes(), [
			/*Attributes from ymoBizClients*/
			'user_company_id','user_fname','user_lname','user_email','user_repeat_email','user_password','user_repeat_password','user_gender',
			'user_dob','user_dob_day','user_dob_month','user_dob_year','user_terms','user_newsletter',
				
			/*Attributes from ymoCompanies*/
			'company_name','company_taxcode','company_business_area','company_address','company_city','company_zipcode','company_country','company_email','company_phone',
		]);
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['user_fname','user_lname','user_email','user_repeat_email','user_password','user_repeat_password'],'required','on'=>['default','PreOrderClient']],	
			
			[['user_password','user_repeat_password'], 'string','length' => [8, 24],'on' => ['PreOrderClient']],
            //['password', StrengthValidator::className(), 'preset'=>'normal', 'userAttribute'=>'email'],
            ['user_repeat_email', 'compare', 'compareAttribute' => 'user_email','on' => ['PreOrderClient']],
            ['user_repeat_password', 'compare', 'compareAttribute' => 'user_password', 'message'=> Yii::t('app','These passwords don\'t match. Try again?.'),'on' => ['PreOrderClient']],
            
        	[['user_email','user_repeat_email'], 'email','on' => ['PreOrderClient']],
        	
            ['user_terms','required', 'requiredValue' => true, 'message' => Yii::t('app','You should accept term to use our service'),'on' => ['PreOrderClient']],
            
            //['verifyCode', '\ymobiz\components\ymoCaptchaValidator', 'captchaAction' => 'site/default/captcha' ,'on' => ['PreOrderClient']],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			/*Labels from ymoBizClients*/
			'user_fname' => Yii::t('app', 'first name *'),
			'user_lname' => Yii::t('app', 'last name *'),
			'user_email' => Yii::t('app', 'your email *'),
			'user_repeat_email' => Yii::t('app', 're-enter email *'),
			'user_password' => Yii::t('app', 'password *'),
			'user_repeat_password' => Yii::t('app', 're-enter password *'),
			'user_dob' => Yii::t('app', 'date of birth'),
			'user_terms' => Yii::t('app', 'id'),
			'user_newsletter' => Yii::t('app', 'id'),
				
			/*Labels from ymoCompanies*/
			'company_name' => Yii::t('app', 'company name'),
			'company_taxcode' => Yii::t('app', 'tax number'),
			'company_business_area' => Yii::t('app', 'business areas'),
			'company_address' => Yii::t('app', 'address'),
			'company_city' => Yii::t('app', 'city'),
			'company_zipcode' => Yii::t('app', 'zip code'),
			'company_country' => Yii::t('app', 'country'),
			'company_email' => Yii::t('app', 'company email'),
			'company_phone' => Yii::t('app', 'company phone number'),
				
		];
	}

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default' => [
				'user_company_id','user_fname','user_lname','user_email','user_repeat_email','user_password','user_repeat_password','user_gender',
				'user_dob','user_dob_day','user_dob_month','user_dob_year','user_terms','user_newsletter',
            	'company_name','company_taxcode','company_business_area','company_address','company_city','company_zipcode','company_country','company_email','company_phone',
            ],
        	'PreOrderClient' => [
				'user_company_id','user_fname','user_lname','user_email','user_repeat_email','user_password','user_repeat_password','user_gender',
				'user_dob','user_dob_day','user_dob_month','user_dob_year','user_terms','user_newsletter',
            	'company_name','company_taxcode','company_business_area','company_address','company_city','company_zipcode','company_country','company_email','company_phone',
        	],
        ];
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

    /**
     * @inheritdoc
     */
    public function getNewsletterForm()
    {
        return [
            'yes' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','yes, please'),
            'no' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','no, thank you'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function savePreOrder()
    {
    	$this->attributes = $this->load(Yii::$app->request->post());
    	 
    	if($this->validate()){
    		
    		
    		
    		return $this->attributes;
    		//return true;
    	}
    	
    	return false;
    }
}