<?php
namespace ymobiz\validators;

use Yii;
use ymobiz\auth\User;
use yii\validators\Validator;

class PasswordValidator extends Validator
{

    public function validateAttribute($model, $attribute)
    {
        $user = User::findByEmail($model->ymo_email);

        if (!$user || !$user->validatePassword($model->$attribute)) {
            $model->addError($attribute, Yii::t('app','Incorrect username or password.'));
        }
    }
}