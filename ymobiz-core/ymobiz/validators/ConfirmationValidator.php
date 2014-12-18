<?php
namespace ymobiz\validators;

use Yii;
use ymobiz\auth\User;
use yii\validators\Validator;

class ConfirmationValidator extends Validator
{

    public function validateAttribute($model, $attribute)
    {
        $user = User::findByEmail($model->ymo_email);

        if ($user !== null) {
            $confirmationRequired = $user->confirmable && !$user->allowUnconfirmedLogin;
            if ($confirmationRequired && !$user->isConfirmed) {

                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $model->addError($attribute, Yii::t('app','User not active yet.'));
            }

            if ($user->getIsBlocked()) {

                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $model->addError($attribute, Yii::t('app','User blocked.'));
            }
        }
    }
}