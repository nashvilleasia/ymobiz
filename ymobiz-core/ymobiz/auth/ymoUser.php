<?php

namespace ymobiz\auth;

use Yii;
use ymobiz\helpers\Password;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use common\models\ymoClients;
use common\models\ymoClientsCompany;
use common\models\ymoClientsAddresses;
use common\models\ymoOrders;
use yii\helpers\ArrayHelper;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class ymoUser extends ActiveRecord implements UserInterface
{
    protected $_security;

    /**
     * @var bool Custom attributes for save.
     */
	const COST = 10;
	
	const STATUS_DELETED = 0;
	
	const STATUS_ACTIVE = 1;
	
	const STATUS_CODE = 'active';
	
	const ROLE_USER = 10;

	/**
	 * @var int The time before a confirmation token becomes invalid.
	 */
	const CONFIRM_WITHIN =  3000; // 5 minutes

	/**
	 * @var bool Whether to allow login without confirmation.
	 */
	public $allowUnconfirmedLogin = false;

	/**
	 * @var int The time you want the user will be remembered without asking for credentials.
	 */
	public $rememberFor = 1209600; // two weeks

	/**
	 * @var bool Whether user have to confirm his account.
	 */
	public $confirmable = true;

	/**
	 * @var int The time before a recovery token becomes invalid.
	 */
	public $recoverWithin = 21600; // 6 hours

	/**
	 * @var int Cost parameter used by the Blowfish hash algorithm.
	 */
	public $cost = 10;

	/**
	 * @var string|null Role that will be assigned to user on creation.
	 */
	public $defaultRole = null;

	/**
	 * @var array An array of administrator's usernames.
	 */
	public $admins = [];

	/**
	 * @var string Plain password. Used for model validation.
	 */
	public $password;

	/**
	 * @var string Current user's password.
	 */
	public $current_password;

	/**
	 * @var string Current user's password.
	 */
	public $repeat_password;

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
        $this->_security = new Password();
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
            'username','password','repeat_password','status'
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasOne(ymoClients::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllClients()
    {
        return $this->hasMany(ymoClients::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'ymo_orders';
    }

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['access_token' => $token]);
	}

	/**
	 * Finds a user by id and confirmation token
	 *
	 * @param integer $id
	 * @param string  $token
	 *
	 * @return null|models\User
	 */
	public static function findUserByRecoveryToken($token)
	{
		return static::findOne(['recovery_token' => $token]);
	}

	/**
	 * Finds a user by recovery token
	 */
	public function findUserByIdAndRecoveryToken($id, $token)
	{
		return  static::findOne(['id' => $id, 'recovery_token' => $token]);
	}

	/**
	 * Finds user by password reset token
	 */
	public static function findByConfirmTime($timestamp)
	{
		$expire = self::CONFIRM_WITHIN;

		if ($timestamp + $expire < time()) {
			return false;
		}

		return true;
	}

	/**
	 * Finds a user by id and confirmation token
	 *
	 * @param integer $id
	 * @param string  $token
	 *
	 * @return null|models\User
	 */
	public function findUserByIdAndConfirmationToken($id, $token)
	{
		return static::findOne(['id' => $id, 'confirmation_token' => $token]);
	}

	/**
	 * Finds a user by id and confirmation token
	 *
	 * @param integer $id
	 * @param string  $token
	 *
	 * @return null|models\User
	 */
	public static function findUserByConfirmationToken($token)
	{
		return static::find()->where(['confirmation_token' => $token]);
	}

	/**
	 * Finds user by username
	 *
	 * @param  string      $username
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * Finds user by username
	 *
	 * @param  string      $username
	 * @return static|null
	 */
	public static function findByEmail($email)
	{
		return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param  string      $token password reset token
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		$expire = self::CONFIRM_WITHIN;

		$parts = explode('_', $token);
		$timestamp = (int) end($parts);
		if ($timestamp + $expire < time()) {
			// token expired
			return null;
		}

		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param  string  $password password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return $this->_security->validatePassword($password, $this->password_hash);
	}

	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password_hash = $this->_security->generatePasswordHash($password);
	}

	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey()
	{
		$this->auth_key = $this->_security->generateRandomString();
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = $this->_security->generateRandomString() . '_' . time();
	}

	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
				
			[['status_code','cluster_id'], 'safe'],

			['role', 'default', 'value' => self::ROLE_USER],
			['role', 'in', 'range' => [self::ROLE_USER]],

			['username', 'filter', 'filter' => 'trim'],
			['username', 'required'],
			['username', 'unique'],
			['username', 'string', 'min' => 2, 'max' => 255],
				
			['group_id', 'string','on' => ['create', 'update_password']],

			['email', 'filter', 'filter' => 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'unique'],

            // current password rules
            /*['current_password', 'required', 'on' => ['update_email', 'update_password']],
            ['current_password', function ($attr) {
                if (!empty($this->$attr) && !Password::validate($this->$attr, $this->password_hash)) {
                    $this->addError($attr, \Yii::t('user', 'Current password is not valid'));
                }
            }, 'on' => ['update_email', 'update_password']],*/

			// password rules
            [['password','repeat_password'], 'required', 'on' => ['create', 'update_password']],
			[['password','repeat_password'], 'string', 'min' => 6, 'on' => ['create', 'update_password']],
            ['repeat_password', 'compare', 'compareAttribute' => 'password','message'=> \Yii::t('app','These passwords don\'t match. Try again?.'),'on' => ['create', 'update_password']],

            [['confirmation_token'], 'required', 'on' => ['activation']],
        ];
	}

	public function beforeSave($insert)
	{
		if ($insert) {
			$this->setAttribute('auth_key', $this->_security->generateRandomString());
        
	        $this->setAttribute('cluster_id', \Yii::$app->params['cluster_name']);
	        $this->setAttribute('status_code', self::STATUS_CODE);
		}

		if (!empty($this->password)) {
			$this->setAttribute('password_hash', Password::hash($this->password));
		}

        if ($this->confirmable==true) {
            $this->setAttribute('confirmed_at', time());
        }

		return parent::beforeSave($insert);
	}

	public function scenarios()
	{
		return [
			'activation' 		=> ['email','confirmed_at','unconfirmed_email','confirmation_token','confirmation_sent_at'],
			'register'       	=> ['username', 'email', 'password'],
			'connect'         	=> ['username', 'email'],
			'create'          	=> ['username', 'email', 'password', 'status','group_id','repeat_password'],
			'update'          	=> ['username', 'email', 'status'],
			'update_password' 	=> ['password', 'current_password','repeat_password'],
			'update_email'    	=> ['unconfirmed_email', 'current_password'],
			'request_password'  => ['email', 'status'],
			'updateMember'		=> ['group_id']	
		];
	}

	public function register()
	{
		if (!$this->getIsNewRecord()) {
			throw new \RuntimeException('Calling "'.__CLASS__.'::register()" on existing user');
		}

		if ($this->validate()) {
			if ($this->save(false)) {
				
				if(\Yii::$app->params['cluster_name']=='YMC'){
					
		        	$checkUser = self::findOne(['email'=>$this->email]);
		        	
		        	$role = Yii::$app->authManager->createRole('Guest Role');
    				\Yii::$app->authManager->assign($role, $checkUser->id);
		        			
		        	$client = new ymoClients();
		        	$client->user_id = $checkUser->id;
		        	$client->email = $checkUser->email;
		        	$client->status = 1;
		        	$client->save(false);
		        	
		        	$checkClient = ymoClients::findOne(['email'=>$checkUser->email]);
		        			
		        	$company = new ymoClientsCompany();
		        	$company->client_id = $checkClient->id;
		        	$company->status = 1;
		        	$company->save(false);
		        			
		        	$address = new ymoClientsAddresses();
		        	$address->client_id = $checkClient->id;
		        	$address->status = 1;
		        	$address->save(false);
		        }
		        
				return true;
			}
		}

		return false;
	}


    public function updateUser()
    {
        if ($this->validate()) {
            if ($this->save()) {
                return true;
            }
        }

        return false;
    }

	/**
	 * Confirms a user by setting it's "confirmation_time" to actual time
	 *
	 * @param  bool $runValidation Whether to check if user has already been confirmed or confirmation token expired.
	 * @return bool
	 */
	public function confirm($runValidation = true)
	{
		if ($runValidation) {
			if ($this->getIsConfirmed()) {
				return true;
			} elseif ($this->getIsConfirmationPeriodExpired()) {
				return false;
			}
		}

		if (empty($this->unconfirmed_email)) {
			$this->confirmed_at = time();
		} else {
			$this->email = $this->unconfirmed_email;
			$this->unconfirmed_email = null;
		}

		$this->confirmation_token = null;
		$this->confirmation_sent_at = null;
		$this->status = 1;

		return $this->save(false);
	}
	/**
	 * Generates confirmation data.
	 */
	protected function generateConfirmationData()
	{
		$this->confirmation_token = \Yii::$app->security->generateRandomString();
		$this->confirmation_sent_at = time();
		$this->confirmed_at = null;
	}

	/**
	 * Verifies whether a user is confirmed or not.
	 *
	 * @return bool
	 */
	public function getIsConfirmed()
	{
		return $this->confirmed_at !== null;
	}

	/**
	 * Checks if the user confirmation happens before the token becomes invalid.
	 *
	 * @return bool
	 */
	public function getIsConfirmationPeriodExpired()
	{
		return $this->confirmation_sent_at != null && ($this->confirmation_sent_at + self::CONFIRM_WITHIN) < time();
	}

	/**
	 * Resets password and sets recovery token to null
	 *
	 * @param  string $password
	 * @return bool
	 */
	public function resetPassword($password)
	{
		$this->password = $password;
		$this->setAttributes([
			'recovery_token'   => null,
			'recovery_sent_at' => null
		], false);

		return $this->save(false);
	}

	/**
	 * Blocks the user by setting 'blocked_at' field to current time.
	 */
	public function block()
	{
		$this->blocked_at = time();

		return $this->save(false);
	}

	/**
	 * Blocks the user by setting 'blocked_at' field to null.
	 */
	public function unblock()
	{
		$this->blocked_at = null;

		return $this->save(false);
	}

	/**
	 * @return bool Whether user is blocked.
	 */
	public function getIsBlocked()
	{
		return !is_null($this->blocked_at);
	}

	/**
	 * Generates recovery data and sends recovery message to user.
	 */
	public function sendRecoveryMessage()
	{
		$this->recovery_token = $this->_security->generateRandomString();
		$this->recovery_sent_at = time();
		$this->save(false);

		//return $this->module->mailer->sendRecoveryMessage($this);
	}

	/**
	 * @return string Recovery url
	 */
	public function getRecoveryUrl()
	{
		return Url::toRoute(['/site/reset',
			'id' => $this->id,
			'token' => $this->password_reset_token
		], true);
	}

	/**
	 * Checks if the password recovery happens before the token becomes invalid.
	 *
	 * @return bool
	 */
	public function getIsRecoveryPeriodExpired()
	{
		return ($this->recovery_sent_at + $this->module->recoverWithin) < time();
	}

	/**
	 * @return string Confirmation url.
	 */
	public function getConfirmationUrl()
	{
		if (is_null($this->confirmation_token)) {
			return null;
		}

		return Url::toRoute(['/user/confirm', 'id' => $this->id, 'token' => $this->confirmation_token], true);
	}

	/**
	 * Generates confirmation data and re-sends confirmation instructions by email.
	 *
	 * @return bool
	 */
	public function resend()
	{
		$this->generateConfirmationData();
		$this->save(false);

		return $this->module->mailer->sendConfirmationMessage($this);
	}
	/**
	 * Finds a user by id.
	 *
	 * @param integer $id
	 *
	 * @return null|models\User
	 */
	public function findUserById($id)
	{
		return $this->findUser(['id' => $id])->one();
	}

	/**
	 * Finds a user by username.
	 *
	 * @param string $username
	 *
	 * @return null|models\User
	 */
	public function findUserByUsername($username)
	{
		return $this->findUser(['username' => $username])->one();
	}

	/**
	 * Finds a user by email.
	 *
	 * @param string $email
	 *
	 * @return null|models\User
	 */
	public function findUserByEmail($email)
	{
		return $this->findUser(['email' => $email])->one();
	}

	/**
	 * Finds a user either by email, or username.
	 *
	 * @param string $value
	 *
	 * @return null|models\User
	 */
	public function findUserByUsernameOrEmail($value)
	{
		if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
			return $this->findUserByEmail($value);
		}

		return $this->findUserByUsername($value);
	}

	/**
	 * Finds a user
	 *
	 * @param  $condition
	 * @return \yii\db\ActiveQuery
	 */
	public function findUser($condition)
	{
		return $this->find()->where($condition);
	}

    /**
     * @inheritdoc
     */
    public function getRoleTypes()
    {
    	return [
			'Admin' => 'Admin',
			'Staff' => 'Staff',
			'Partner' => 'Partner',
			'Call Center' => 'Call Center',
			'Seller' => 'Seller',
			'Account' => 'Account',
		];
    }

    /**
     * @inheritdoc
     */
    public function getPermissionsGroup()
    {
    	return ArrayHelper::toArray(ArrayHelper::map(Yii::$app->authManager->getRoles(),'name', 'name'));
    }
    
    public function getPermissionsByMember($user=false)
    {
    	return ArrayHelper::toArray(ArrayHelper::map(Yii::$app->authManager->getRolesByUser($user),'name', 'name'));
    }
}