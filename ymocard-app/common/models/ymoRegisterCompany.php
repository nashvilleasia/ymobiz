<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for register company.
 *
 */
class ymoRegisterCompany extends Model
{
	public $firs_name;
	public $last_name;
	public $email;
	public $subject;
	public $message;


	/**
	 * @inheritdoc
	 */
	public function attributes()
	{
		return array_merge(parent::attributes(), [
			'first_name', 'last_name', 'email', 'subject', 'message'
		]);
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'subject', 'message'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('app', 'first name'),
            'last_name' => Yii::t('app', 'last name'),
            'email' => Yii::t('app', 'your email'),
            'subject' => Yii::t('app', 'subject'),
            'message' => Yii::t('app', 'message'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function register()
    {

        if ($this->validate()) {

            return 'save success';
        }

        return false;
    }
}
