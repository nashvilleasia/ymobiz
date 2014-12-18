<?php

namespace mcms\ajaxform;

use kartik\widgets\AlertAsset;
use kartik\widgets\GrowlAsset;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsExpression;
use ymobiz\components\ymoActiveForm;

class AjaxForm extends ymoActiveForm
{
	/**
	 * @see AjaxForm
	 * @var boolean
	 * #see Get ActiveForm ID
	 */
	protected $_id;

	/**
	 * @see AjaxForm
	 * @var object
	 * #see Get ActiveForm options
	 */
	public $form;

	/**
	 * @see AjaxForm
	 * @var array
	 */
	public $paramsOptions = [];

	/**
	 * @see AjaxForm
	 * @var array
	 */
	public $pluginOptions = [];

	/**
	 * @see AjaxForm
	 * @var array
	 * #see Set AjaxForm callbacks
	 */
	public $callbacks = [];

	/**
	 * @see AjaxForm
	 * @var array
	 * #see Set AjaxForm success
	 */
	public $success = [];

	/**
	 * @see AjaxForm
	 * @var array
	 * #see Set AjaxForm complete
	 */
	public $complete = [];

	/**
	 * @see AjaxForm
	 * @var array
	 * #see Set AjaxForm error
	 */
	public $error = [];

	/**
	 * @see AjaxForm
	 * @var object
	 */
	public $options = [];

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $target = '#ajax-msg';

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $targetPosition = 'before';

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $replaceTarget = false;

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $modal = false;

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $modalOptions = [];

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $modalPrefix = 'modal';

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $resetForm = null;

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $loadingOptions = "{
		text: \"Loading\",
		'class': \"fa fa-refresh fa-spin\",    // loader CSS class
		'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
	}";

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $timeoutForm = 500;

	/**
	 * @see AjaxForm
	 * @var ActiveForm settings
	 */
	public $enableClientValidation = true;
	public $enableAjaxValidation = false;
	public $validateOnChange = false;
	public $validationDelay = 500;

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $var;

	/**
	 * @see AjaxForm
	 * @see Init extension default
	 */
	public function init()
	{
		parent::init();
		$this->registerAssets();
	}

	/**
	 * @see AjaxForm
	 * @see Load extension with all settings
	 */
	public function run()
	{
		$this->_id = $this->form->getId();
		$view = $this->getView();
		$this->registerAssets();
		$this->jsOptions();
		$this->jsCallbacks();
		$this->registerScript();
	}

	public function registerScript()
	{
		$options = false;
		$target = $this->jsTarget();

		$view = $this->getView();

		foreach($this->options as $name => $value)
		{
			$options .= $name.":".Json::encode($value).",";
		}

		foreach($this->callbacks as $name => $value)
		{
			$options .= $name.":".$value.",";
		}

		$view->registerJs("jQuery('#$this->_id').ajaxForm({".$options."});",$view::POS_READY);

		if($this->modal==false)
		{
			if($this->replaceTarget==false)
			{
				$view->registerJs("jQuery('#$this->_id').$this->targetPosition('<div id=\"$target\"></div>');",$view::POS_READY);
			}
		}else{

			$this->modalOptions = ArrayHelper::merge([
				'header' => '<h2>Ajax Response</h2>',
				'closeButton' => [],
			],$this->modalOptions);

			$this->modal = ArrayHelper::merge(['id' => $this->modalPrefix.'-'.$this->_id],$this->modalOptions);
			Modal::begin($this->modal);
			if(!in_array('remote',$this->modalOptions))
			{
				echo "<div id=\"$target\"></div>";
			}
			Modal::end();

			$view->registerJs("
				jQuery('body').append(jQuery('#$this->modalPrefix-$this->_id'));
			",$view::POS_READY);
		}
	}

	public function jsTarget()
	{
		$target = (ArrayHelper::keyExists('target',$this->options)) ? $this->options['target'] : $this->target;

		preg_match('@^(?:#)?([^/]+)@i',
			$target, $targetMatch);

		return @$targetMatch[1];
	}

	public function jsOptions()
	{
		/**
		 * @see AjaxForm
		 * @see set default params
		 */
		$this->paramsOptions['default'] = [
			'dataType' => 'html',
			'resetForm' => true,
			'async' => 'true',
		];

		$this->options = ArrayHelper::merge(
			$this->paramsOptions['default'],
			$this->pluginOptions
		);
	}

	public function jsCallbacks()
	{
		$target = $this->jsTarget();

		if($this->replaceTarget==false)
		{
			$successResponse = "jQuery('#$target').html(data);";
			$errorResponse = "jQuery('#$target').html('<div class=\"alert alert-danger\">data</div>');";
		}else{
			$successResponse = "jQuery('#$this->_id').html(data);";
			$errorResponse = "jQuery('#$this->_id').html('<div class=\"alert alert-danger\">data</div>');";
		}

		/**
		 * @see AjaxForm
		 * @see set default callbacks
		 */
		$this->beforeSubmit = [
			'beforeSubmit' => new JsExpression("
				function(arr, form, options)
				{
					$.isLoading($this->loadingOptions);
				}
			")
		];

		$this->success = [
			'success' => new JsExpression("
				function(data)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
						$successResponse
						jQuery('#$this->modalPrefix-$this->_id').modal('show');
						$this->resetForm
					}, $this->timeoutForm );
				}
			")
		];

		$this->complete = [
			'complete' => new JsExpression("
				function(form)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
						jQuery('#$this->modalPrefix-$this->_id').modal('show');
					}, $this->timeoutForm );
				}
			")
		];

		$this->error = [
			'error' => new JsExpression("
				function(XMLHttpRequest, textStatus, errorThrown)
				{
					$.isLoading(\"hide\");
					$errorResponse
				}
			")
		];

		$this->callbacks = ArrayHelper::merge(
			$this->complete,
			$this->beforeSubmit,
			$this->success,
			$this->error,
			$this->callbacks
		);
	}

	/**
	 * @see AjaxForm
	 * @see Register assets from this extension and yours types
	 */
	public function registerAssets()
	{
		$this->view = \Yii::$app->getView();
		AjaxFormAsset::register($this->view);
	}
}
