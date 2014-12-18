<?php
namespace ymobiz\modules\mcms\models;

use yii\base\Model;
use Yii;
use ymobiz\auth\ymoUser;

/**
 * Signup form
 */
class UserForm extends Model
{
	public $username;
	public $email;
	public $password;
	public $status;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['username', 'filter', 'filter' => 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['email', 'filter', 'filter' => 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been taken.'],

			['password', 'required'],
			['password', 'string', 'min' => 6],

			['status', 'integer'],
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function register()
	{
		if ($this->validate()) {
			return ymoUser::create($this->attributes);
		}

		return null;
	}
}
