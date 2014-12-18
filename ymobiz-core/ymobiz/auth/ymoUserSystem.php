<?php

namespace ymobiz\auth;

use Yii;
use yii\base\Model;
use common\models\ymoClients;
use ymobiz\helpers\Password;
use yii\db\ActiveRecord;
use ymobiz\components\ymoMailer;

/**
 * This is the model class for User Requests.
 */
class ymoUserSystem extends ActiveRecord
{
	protected $_security;
	
    /*Attributes for recovery password*/
    public $pass_recovery_input;
    public $pass_recovery_choice;
    
    /*Attributes for password reset*/
    public $new_password;
    public $repeat_new_password;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ymo_user';
	}

    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        return \Yii::$app->get('authdb');
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->_security = new Password;
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
        	'pass_recovery_input','pass_recovery_choice','verifyCode',
        	'new_password','repeat_new_password',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	/*Rules for PasswordRecovery*/
        	[['email'],'email','on' => ['PasswordRecovery']],
    		[['pass_recovery_input','pass_recovery_choice'], 'required',
    				'message' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','please choose one of the options to recover your password'),
    				'on' => ['PasswordRecovery']],
        		
        	/*Rules for PasswordReset*/
        	[['new_password','repeat_new_password'], 'required',
        		'on' => ['PasswordReset']],
			[['new_password','repeat_new_password'], 'string', 'min' => 6, 'on' => ['PasswordReset']],
            ['repeat_new_password', 'compare', 'compareAttribute' => 'new_password','message'=> \Yii::t('app','These passwords don\'t match. Try again?.'),
            		'on' => ['PasswordReset']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
    	return [
    			'default' => ['email','recovery_token','recovery_sent_at'],
    			'PasswordRecovery' => ['pass_recovery_input','pass_recovery_choice'],
    			'PasswordReset' => ['new_password','repeat_new_password'],
    		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pass_recovery_input' => Yii::t('app', 'password recovery choice'),
        	'new_password' => Yii::t('app', 'new password*'),
        	'repeat_new_password' => Yii::t('app', 'repeat new password*'),
        ];
    }

    /**
     * @inheritdoc
     */
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
    public function PasswordRecovery()
    {	
    	$this->attributes = $this->load(Yii::$app->request->post());

        if ($this->validate()) {
        	
        	$client = new ymoClients;
        	$email = false;
        	
        	if($this->pass_recovery_choice=='email'){
        		if($client->findClientsByEmail($this->pass_recovery_input)==true){
        			$email = $client->findClientsByEmail($this->pass_recovery_input)->email;
        		}
        	}else if($this->pass_recovery_choice=='mobile number'){
        		if($client->findClientsByPhoneNumber($this->pass_recovery_input)==true){
        			$email = $client->findClientsByPhoneNumber($this->pass_recovery_input)->email;
        		}
        	}
        	
        	if($email){
        		
    			$model = $this->find()->where(['email'=>$email])->one();
	        	$model->recovery_token = $this->_security->generateRandomString();
	        	$model->recovery_sent_at = time();
	        	$model->save(false);
	        	
	        	/*Send recovery message here*/
	        	
	        	$sender = $this->find()->where(['email'=>$email])->one();
	        	
	        	$mail = new ymoMailer;
	        	$mail->sendPasswordRecovery($sender,[
	        		'template' => ($this->pass_recovery_choice=='mobile number') ? 'password-recovery-mobile' : []
	        	]);
	        	
	        	return true;
        	}
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function ResetUserPassword()
    {	
    	$this->attributes = $this->load(Yii::$app->request->post());

        if ($this->validate()) {
        	
        	$token = Yii::$app->request->post('token');
        	 
        	if($token && $token!=null){
        		
	        	$userToken = User::findUserByRecoveryToken($token);
		    	
		    	if($userToken!=false){
		    	
			    	if(User::findByConfirmTime($userToken->recovery_sent_at)==true){
	        			$userToken->resetPassword($this->new_password);
	        			return true;
			    	}
		    	}
	        }
        }

        return false;
    }
}
