<?php

namespace ymobiz\components;

use Yii;
use kartik\widgets\ActiveForm;
use yii\base\InvalidCallException;
use yii\widgets\ActiveFormAsset;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\web\YiiAsset;

class ymoActiveForm extends ActiveForm
{
	
	/**
	 * @var string|JsExpression a JS callback that will be called when the form is being submitted.
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form) {
	 *     ...return false to cancel submission...
	 * }
	 * ~~~
	 */
	public $beforeSubmit;
	/**
	 * @var string|JsExpression a JS callback that is called before validating an attribute.
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form, attribute, messages) {
	 *     ...return false to cancel the validation...
	 * }
	 * ~~~
	 */
	public $beforeValidate;
	/**
	 * @var string|JsExpression a JS callback that is called before any validation has run (Only called when the form is submitted).
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form, data) {
	 *     ...return false to cancel the validation...
	 * }
	 * ~~~
	 */
	public $beforeValidateAll;
	/**
	 * @var string|JsExpression a JS callback that is called after validating an attribute.
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form, attribute, messages) {
	 * }
	 * ~~~
	 */
	public $afterValidate;
	/**
	 * @var string|JsExpression a JS callback that is called after all validation has run (Only called when the form is submitted).
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form, data, messages) {
	 * }
	 * ~~~
	 */
	public $afterValidateAll;
	/**
	 * @var string|JsExpression a JS pre-request callback function on AJAX-based validation.
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form, jqXHR, textStatus) {
	 * }
	 * ~~~
	 */
	public $ajaxBeforeSend;
	/**
	 * @var string|JsExpression a JS callback to be called when the request finishes on AJAX-based validation.
	 * The signature of the callback should be:
	 *
	 * ~~~
	 * function ($form, jqXHR, textStatus) {
	 * }
	 * ~~~
	 */
	public $ajaxComplete;
	
	/**
	 * Runs the widget.
	 * This registers the necessary javascript code and renders the form close tag.
	 * @throws InvalidCallException if `beginField()` and `endField()` calls are not matching
	 */
	public function run()
	{
		if (!empty($this->_fields)) {
			throw new InvalidCallException('Each beginField() should have a matching endField() call.');
		}
	
		$id = $this->options['id'];
		$options = Json::encode(ArrayHelper::merge($this->getClientOptions(),$this->getCallbacksOptions()));
		$attributes = Json::encode($this->attributes);
		$view = $this->getView();
		ActiveFormAsset::register($view);
		$view->registerJs("jQuery('#$id').yiiActiveForm($attributes, $options);");
	
		echo Html::endForm();
	}

    /**
     * Returns the options for the form JS widget.
     * @return array the options
     */
    protected function getCallbacksOptions()
    {
    	$id = $this->options['id'];
    	$view = $this->getView();
        //$view->registerJsFile('http://malsup.github.com/min/jquery.form.min.js',YiiAsset::className());
    	$options = [];
        foreach (['beforeSubmit', 'beforeValidate', 'beforeValidateAll', 'afterValidate', 'afterValidateAll', 'ajaxBeforeSend', 'ajaxComplete'] as $name) {
            if (($value = $this->$name) !== null) {
            	
            	if($name=='beforeSubmit'){
					$view->registerJs("
	            		/*$('#$id').submit(function (event) {
							event.preventDefault();
	            			return false;
						});*/
					",$view::POS_LOAD);
            	}
				
            	$jsValue = $value instanceof JsExpression ? $value : $value;
            	//$options[$name] = new JsExpression($jsValue);
            	$view->registerJs("$('#$id').on('$name', $jsValue).on('submit', function(e){
   				 	e.preventDefault();
				});",$view::POS_LOAD);
            }
        }

        return $options;
    }
}