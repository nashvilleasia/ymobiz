<?php

namespace ymobiz\validators;

use Yii;
use yii\validators\Validator;
use yii\validators\ValidationAsset;

class PhoneNumberValidator extends Validator
{

	public $pattern = '/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/';
	
	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		if ($this->message === null) {
			$this->message = Yii::t('yii', "{attribute} phone number dont' valid.");
		}
	}

    /**
     * @inheritdoc
     */
    protected function validateValue($value)
    {
        $valid = true;
        
        if(!preg_match($this->pattern, $value)) {
        	$valid = false;
        }
        
        return ($valid) ? [] : [$this->message, []];
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($object, $attribute, $view)
    {
        $options = [
            'message' => Yii::$app->getI18n()->format($this->message, [
                'attribute' => $object->getAttributeLabel($attribute),
            ], Yii::$app->language)
        ];

        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        ValidationAsset::register($view);
        return 'yiibr.validation.phoneNumber(value, messages, ' . Json::encode($options) . ');';
    }
}