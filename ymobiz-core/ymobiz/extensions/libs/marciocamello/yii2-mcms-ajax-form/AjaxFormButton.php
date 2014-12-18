<?php

namespace mcms\ajaxform;

use kartik\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class AjaxFormButton extends AjaxForm
{
	/**
	 * @see AjaxFormButton
	 * @var object
	 * #see Get AjaxFormButton Html
	 */
	public $button;

	/**
	 * @see AjaxFormButton
	 * @var boolean
	 * #see Get AjaxFormButton Model
	 */
	public $model;

	/**
	 * @see AjaxFormButton
	 * @var object
	 * #see Get ActiveForm options
	 */
	public $form;

	/**
	 * @see AjaxFormButton
	 * @var string
	 */
	public $target = '#ajax-msg';

	/**
	 * @see AjaxFormButton
	 * @var string
	 */
	public $var;

	/**
	 * @see AjaxForm
	 * @see Load extension with all settings
	 */
	public function run()
	{
		$this->_id = $this->form->getId();
		$view = $this->getView();
		$this->jsOptions();
		$this->jsCallbacks();
		$this->registerScript();
		return $this->htmlOptions();
	}

	public function registerScript()
	{
		$options = false;
		$target = $this->jsTarget();
		$buttonId = ArrayHelper::getValue($this->button, 'id');

		foreach($this->options as $name => $value)
		{
			$options .= $name.":".Json::encode($value).",";
		}

		foreach($this->callbacks as $name => $value)
		{
			$options .= $name.":".$value.",";
		}

		$this->view->registerJs("jQuery('#$buttonId').on('click',function(){
			jQuery('#$this->_id').ajaxForm({".$options."});
		});");

		if($this->modal==false)
		{	if($this->replaceTarget==false)
			{
				$this->view->registerJs("jQuery('#$this->_id').before('<div id=\"$target\"></div>');");
			}
		}else{

			$this->modal = ArrayHelper::merge(['id' => $this->modalPrefix.'-'.$this->_id],$this->modalOptions);
			Modal::begin($this->modal);
			if(!in_array('remote',$this->modalOptions))
			{
				echo "<div id=\"$target\"></div>";
			}
			Modal::end();
		}

	}

	/**
	 * @see AjaxFormButton
	 * @see Default Options
	 */
	public function htmlOptions()
	{
		$id = (ArrayHelper::keyExists('id', $this->button)) ? ArrayHelper::getValue($this->button, 'id') : 'ajax-form-button';
		$name = ArrayHelper::keyExists('name', $this->button) ? ArrayHelper::getValue($this->button, 'name') : 'Ajax Form Button';
		$type = ArrayHelper::keyExists('type', $this->button) ? ArrayHelper::getValue($this->button, 'type') : 'button';
		$options = ArrayHelper::keyExists('options', $this->button) ? ArrayHelper::getValue($this->button, 'options') : [];

		if($type)
		{
			$htmlOptions = ArrayHelper::merge([
				'id' => $id
			],$options);

			echo Html::$type($name,$htmlOptions);
		}else{
			echo $this->button;
		}
	}
}
