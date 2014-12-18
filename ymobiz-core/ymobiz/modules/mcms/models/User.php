<?php

namespace ymobiz\modules\mcms\models;

use ymobiz\modules\mcms\helpers\Password;
use yii\db\ActiveRecord;
use yii\helpers\Url;
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
class User extends ActiveRecord implements UserInterface
{
    protected $_security;

    /**
     * @var bool Custom attributes for save.
     */
	const COST = 10;
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 1;
	const ROLE_USER = 10;

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
	 * @var int The time before a confirmation token becomes invalid.
	 */
	public $confirmWithin = 86400; // 24 hours

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
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['access_token' => $token]);
	}

	/**
	 * Finds a user by id and recovery token
	 *
	 * @param integer $id
	 * @param string  $token
	 *
	 * @return null|models\User
	 */
	public function findUserByIdAndRecoveryToken($id, $token)
	{
		return  static::findOne(['id' => $id, 'recovery_token' => $token]);
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
		$expire = \Yii::$app->params['user.passwordResetTokenExpire'];

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
		$this->auth_key = $this->_security->generateRandomKey();
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = $this->_security->generateRandomKey() . '_' . time();
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

			['role', 'default', 'value' => self::ROLE_USER],
			['role', 'in', 'range' => [self::ROLE_USER]],

			['username', 'filter', 'filter' => 'trim'],
			['username', 'required'],
			['username', 'unique'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['email', 'filter', 'filter' => 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'unique'],

			// password rules
			['password', 'required', 'on' => 'register'],
			['password', 'string', 'min' => 6, 'on' => ['create', 'update', 'update_password']],

			// current password rules
			['current_password', 'required', 'on' => ['update_email', 'update_password']],
			['current_password', function ($attr) {
				if (!empty($this->$attr) && !Password::validate($this->$attr, $this->password_hash)) {
					$this->addError($attr, \Yii::t('user', 'Current password is not valid'));
				}
			}, 'on' => ['update_email', 'update_password']],
		];
	}

	public function beforeSave($insert)
	{
		if ($insert) {
			$this->setAttribute('auth_key', $this->_securit->generateRandomKey());
		}

		if (!empty($this->password)) {
			$this->setAttribute('password_hash', Password::hash($this->password));
		}

		return parent::beforeSave($insert);
	}

	public function scenarios()
	{
		return [
			'register'        => ['username', 'email', 'password'],
			'connect'         => ['username', 'email'],
			'create'          => ['username', 'email', 'password', 'status','cluster_id','group_id'],
			'update'          => ['username', 'email', 'password', 'status','cluster_id','group_id'],
			'update_password' => ['password', 'current_password'],
			'update_email'    => ['unconfirmed_email', 'current_password'],
			'request_password'    => ['email', 'status'],
		];
	}


	public function register()
	{
		if (!$this->getIsNewRecord()) {
			throw new \RuntimeException('Calling "'.__CLASS__.'::register()" on existing user');
		}

		if ($this->validate()) {
			if ($this->save(false)) {
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

		return $this->save(false);
	}
	/**
	 * Generates confirmation data.
	 */
	protected function generateConfirmationData()
	{
		$this->confirmation_token = \Yii::$app->security->generateRandomKey();
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
		return $this->confirmation_sent_at != null && ($this->confirmation_sent_at + $this->confirmWithin) < time();
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
		$this->recovery_token = $this->_securit->generateRandomKey();
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
}