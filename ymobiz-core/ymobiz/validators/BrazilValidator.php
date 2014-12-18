<?php
namespace ymobiz\validators;

use Yii;
use yii\validators\RequiredValidator;
use yii\validators\ValidationAsset;

class BrazilValidator extends RequiredValidator
{
    public function clientValidateAttribute($object, $attribute, $view)
    {
        $options = [];
        if ($this->requiredValue !== null) {
            $options['message'] = Yii::$app->getI18n()->format($this->message, [
                'requiredValue' => $this->requiredValue,
            ], Yii::$app->language);
            $options['requiredValue'] = $this->requiredValue;
        } else {
            $options['message'] = $this->message;
        }
        if ($this->strict) {
            $options['strict'] = 1;
        }

        $options['message'] = Yii::$app->getI18n()->format($options['message'], [
            'attribute' => $object->getAttributeLabel($attribute),
        ], Yii::$app->language);

        ValidationAsset::register($view);

        return '
            if(!brazilCheck.find(\':input\').prop(\'disabled\')){
                yii.validation.required(value, messages, ' . json_encode($options) . ');
            }
            ';
    }
}