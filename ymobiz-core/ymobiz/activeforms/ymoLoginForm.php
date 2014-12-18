<?php

namespace ymobiz\activeforms;

use Yii;
use yii\base\Model;
use ymobiz\auth\ymoUser;

/**
 * ymoLoginForm
 */
class ymoLoginForm extends Model
{
    public $ymo_email;
    public $ymo_password;
    public $remember = false;
    public $cluster_id = false;

	protected $user;

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'ymo_email'     => \Yii::t('app', 'login'),
			'ymo_password'      => \Yii::t('app', 'Password'),
			'remember'     => \Yii::t('app', 'keep me logged in'),
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['ymo_email', 'ymo_password'], 'required'],
			['ymo_email', 'trim'],
            ['ymo_password', 'ymobiz\validators\PasswordValidator'],
            ['ymo_email', 'ymobiz\validators\ConfirmationValidator'],
			['remember', 'boolean'],
		];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
			$this->user->setAttribute('logged_in_at', time());
			$this->user->save(false);
            return \Yii::$app->getUser()->login($this->user, $this->remember ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

	/**
	 * @inheritdoc
	 */
	public function formName()
	{
		return 'login-form';
	}

	/**
	 * @inheritdoc
	 */
	public function beforeValidate()
	{
		$user = new ymoUser();
		if (parent::beforeValidate()) {
			$this->user = $user->findUserByUsernameOrEmail($this->ymo_email);
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Finds user by [[username]]
	 *
	 * @return User|null
	 */
	public function getUser()
	{
		if ($this->user === null) {
			$this->user = ymoUser::findByEmail($this->ymo_email);
		}

		return $this->user;
	}
}
