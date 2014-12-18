<?php

namespace mcms\ajaxform;

use kartik\widgets\ActiveForm;
use kartik\widgets\AlertAsset;
use kartik\widgets\GrowlAsset;
use yii\base\Component;
use yii\base\Widget;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsExpression;
use ymobiz\components\ymoActiveForm;

class AjaxActiveForm extends ymoActiveForm
{
	/**
	 * @see AjaxForm
	 * @var boolean
	 * #see Get ActiveForm ID
	 */
	protected $_id;

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
     * @see AjaxButton
     * @var array
     * #see Set AjaxForm callbacks
     */
    public $customCallbacks = [];

    /**
     * @see AjaxButton
     * @var string
     * #see Set AjaxForm events
     */
    public $events = [];

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
     * @see AjaxButton
     * @var array
     * #see Set AjaxButton beforeSend
     */
    public $beforeSend = [];

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
	public $beforeSubmit= false;

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
		$this->_id = $this->getId();
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
			'async' => 'true',
			'resetForm' => $this->resetForm,
		];

		$this->options = ArrayHelper::merge(
			$this->paramsOptions['default'],
			$this->pluginOptions
		);
	}

	public function jsCallbacks()
	{
		$target = $this->jsTarget();
        $events = false;

		if($this->replaceTarget==false)
		{
			$successResponse = "jQuery('#$target').html(responseText);";
			$errorResponse = "jQuery('#$target').html('<div class=\"alert alert-danger\">data</div>');";
		}else{
			$successResponse = "jQuery('#$this->_id').html(responseText);";
			$errorResponse = "jQuery('#$this->_id').html('<div class=\"alert alert-danger\">data</div>');";
		}

        if($this->events)
        {
            if(ArrayHelper::keyExists('message',$this->events['confirmation']))
            {
                $message = ArrayHelper::getValue($this->events['confirmation'],'message');
                $error = ArrayHelper::getValue($this->events['confirmation'],'error');

                $events = "
					if(confirm('$message')){
						$.isLoading($this->loadingOptions);
						return true;
					}else{
						return false;
					}
				";
            }else{
                $events = implode('',$this->events);
            }
        }else{

            $events = "$.isLoading($this->loadingOptions);";
        }

        /**
         * @see AjaxButton
         * @see set default callbacks
         */

        $this->beforeSubmit = [
            'beforeSubmit' => new JsExpression("
				function(arr, form, options)
				{
					".Json::encode(ArrayHelper::getValue($this->customCallbacks,'beforeSubmit'))."
					/*console.debug(arr);
					console.debug(form);
					console.debug(options);*/
				}
			")
        ];

        $this->beforeSend = [
            'beforeSend' => new JsExpression("

				function(xhr)
				{
					$events".Json::encode(ArrayHelper::getValue($this->customCallbacks,'beforeSend'))."
					/*console.debug(xhr);*/
				}
			")
        ];

        $this->complete = [
            'complete' => new JsExpression("
				function(event, xhr, settings)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
                        ".ArrayHelper::getValue($this->customCallbacks,'complete')."
						jQuery('#$this->modalPrefix-$this->id').modal('show');
					}, $this->timeoutForm );

					/*console.debug(event);
					console.debug(xhr);
					console.debug(settings);*/
				}
			")
        ];

        $this->success = [
            'success' => new JsExpression("
				function(responseText, statusText, xhr, \$form)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
					    ".ArrayHelper::getValue($this->customCallbacks,'success')."
						$successResponse
						jQuery('#$this->modalPrefix-$this->id').modal('show');
					}, $this->timeoutForm );

					/*console.debug(responseText);
					console.debug(statusText);
					console.debug(xhr);
					console.debug(\$form);*/
				}
			")
        ];

        $this->error = [
            'error' => new JsExpression("
				function(jqXHR, exception)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
					    ".ArrayHelper::getValue($this->customCallbacks,'error')."
					    $errorResponse
					    console.debug(jqXHR);
					    console.debug(exception);
					    if (jqXHR.status === 0) {
                            console.log('Not connect. Verify Network.');
                        } else if (jqXHR.status == 404) {
                            console.log('Requested page not found. [404]');
                        } else if (jqXHR.status == 500) {
                            console.log('Internal Server Error [500].');
                        } else if (exception === 'parsererror') {
                            console.log('Requested JSON parse failed.');
                        } else if (exception === 'timeout') {
                            console.log('Time out error.');
                        } else if (exception === 'abort') {
                            console.log('Ajax request aborted.');
                        } else {
                            console.log('Uncaught Error.' + jqXHR.responseText);
                        }
					}, $this->timeoutForm );
				}
			")
        ];

		$this->callbacks = ArrayHelper::merge(
			$this->complete,
            $this->beforeSubmit,
			$this->beforeSend,
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
