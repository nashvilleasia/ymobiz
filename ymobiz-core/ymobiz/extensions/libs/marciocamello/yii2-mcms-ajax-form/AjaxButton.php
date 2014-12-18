<?php

namespace mcms\ajaxform;

use kartik\widgets\ActiveForm;
use yii\base\View;
use yii\base\Widget;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class AjaxButton extends Widget
{
	/**
	 * @see AjaxButton
	 * @var object
	 * #see Get AjaxButton Html
	 */
	public $button;
	public $buttonOptions = [];
    public $buttonType = 'inline';
    public $buttonClass;
    /**
     * @see AjaxButton
     * @var object
     * #see Get AjaxButton Html
     */
    public $name = 'default';
	/**
	 * @see AjaxButton
	 * @var boolean
	 * #see Get AjaxButton Model
	 */
	public $model;

	/**
	 * @see AjaxButton
	 * @var object
	 * #see Get ActiveForm options
	 */
	public $form = false;

	/**
	 * @see AjaxButton
	 * @var array
	 */
	public $paramsOptions = [];

	/**
	 * @see AjaxForm
	 * @var array
	 */
	public $pluginOptions = [];

	/**
	 * @see AjaxButton
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
	 * @see AjaxButton
	 * @var object
	 */
	public $options = [];

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $target = '.ymo-json-response';

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $targetPosition = 'before';

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $replaceTarget = false;

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $modal = false;

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $modalOptions = [];

	/**
	 * @see AjaxForm
	 * @var string
	 */
	public $modalPrefix = 'modal';

    /**
     * @see AjaxButton
     * @var array
     * #see Set AjaxButton beforeSend
     */
    public $beforeSend = [];

    /**
     * @see AjaxButton
     * @var array
     * #see Set AjaxButton beforeSend
     */
    public $beforeSubmit = [];

	/**
	 * @see AjaxButton
	 * @var array
	 * #see Set AjaxButton complete
	 */
	public $complete = [];

	/**
	 * @see AjaxButton
	 * @var array
	 * #see Set AjaxButton success
	 */
	public $success = [];

	/**
	 * @see AjaxButton
	 * @var array
	 * #see Set AjaxButton error
	 */
	public $error = [];

	/**
	 * @see AjaxButton
	 * @var string
	 */
    public $loadingOptions = "{
		text: \"Loading\",
		'class': \"fa fa-refresh fa-spin\",    // loader CSS class
		'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
	}";

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $timeoutForm = 500;

    /**
     * @see AjaxForm
     * @var string
     */
    public $responseClass = 'response-ajax-active-form';

	/**
	 * @see AjaxButton
	 * @var string
	 */
	public $dataId;

	/**
	 * @see AjaxButton
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

		$view = $this->getView();

		foreach($this->options as $name => $value)
		{
			$options .= $name.":".Json::encode($value).",";
		}

		foreach($this->callbacks as $name => $value)
		{
			$options .= $name.":".$value.",";
		}
		
		$view->registerJs("jQuery(document).on('click','#$this->id',function(e){
			e.preventDefault();	
			jQuery.ajax({".$options."});
		});",$view::POS_READY);

		if($this->modal==false)
		{
            if($this->replaceTarget==false)
            {
			    $view->registerJs("jQuery('#$this->id').$this->targetPosition('<div id=\"$target\"></div>');",$view::POS_READY);
            }
		}else{

			$this->modalOptions = ArrayHelper::merge([
				'header' => '<h2>Ajax Response</h2>',
				'closeButton' => [],
			],$this->modalOptions);

			$this->modal = ArrayHelper::merge(['id' => $this->modalPrefix.'-'.$this->id],$this->modalOptions);
			Modal::begin($this->modal);
			if(!in_array('remote',$this->modalOptions))
			{
				echo "<div id=\"$target\"></div>";
			}
			Modal::end();

			$view->registerJs("
				jQuery('body').append(jQuery('#$this->modalPrefix-$this->id'));
			",$view::POS_READY);
		}

	}

	public function jsTarget()
	{
		$target = (in_array('target',$this->options)) ? $this->options['target'].'-'.$this->id : $this->target;

		preg_match('@^(?:#)?([^/]+)@i',
			$target, $targetMatch);

		return $targetMatch[1];
	}

	/**
	 * @see AjaxButton
	 * @see Default Options
	 */
	public function htmlOptions()
	{
		if($this->buttonType=='ajax'){
			
		}else{
			echo ($this->buttonClass!=false) ?
	            Html::button(\Yii::t('app',$this->name),[
	                'id' => $this->id,
	                'class' => $this->buttonClass
	            ]) :
	            Html::tag($this->button,\Yii::t('app',$this->name),
	            	ArrayHelper::merge($this->buttonOptions,[
	            		'id' => $this->id,
	               	 	'class' => $this->buttonClass
	            	])
	            );
		}
	}

	/**
	 * @see AjaxButton
	 * @see Default Options
	 */
	public function jsOptions()
	{
		/**
		 * @see AjaxButton
		 * @see set default params
		 */
		$this->paramsOptions['default'] = [
			'async' => 'true',
			'cache' => false,
			'type' => 'post',
			'dataType' => 'html',
		];

		$this->options = ArrayHelper::merge(
			$this->paramsOptions['default'],
			$this->pluginOptions
		);
	}

	/**
	 * @see AjaxButton
	 * @see Default Callbacks
	 */
	public function jsCallbacks()
	{
		$target = $this->jsTarget();
		$events = false;

		if($this->replaceTarget==true)
        {
            $successResponse = (ArrayHelper::getValue($this->customCallbacks,'success')) ? ArrayHelper::getValue($this->customCallbacks,'success') : "jQuery('#$target').html(responseText);";
            $errorResponse = (ArrayHelper::getValue($this->customCallbacks,'error')) ? ArrayHelper::getValue($this->customCallbacks,'error') : "jQuery('#response-$this->id').html('<div class=\"has-error\"><div class=\"help-block\">'+ data +'</div></div>');";
        }else{
            $successResponse = (ArrayHelper::getValue($this->customCallbacks,'success')) ? ArrayHelper::getValue($this->customCallbacks,'success') : "jQuery('#response-$this->id').html(responseText);";
            $errorResponse = (ArrayHelper::getValue($this->customCallbacks,'error')) ? ArrayHelper::getValue($this->customCallbacks,'error') : "jQuery('#response-$this->id').html('<div class=\"has-error\"><div class=\"help-block\">'+ data +'</div></div>');";
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
				}
			")
        ];

		$this->beforeSend = [
			'beforeSend' => new JsExpression("
				function(xhr)
				{
					$events".Json::encode(ArrayHelper::getValue($this->customCallbacks,'beforeSend'))."
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
						//jQuery('#$this->modalPrefix-$this->id').modal('show');
					}, $this->timeoutForm );
				}
			")
		];

		$this->success = [
			'success' => new JsExpression("
				function(responseText, statusText, xhr, \$form)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
					    $successResponse
						//jQuery('#$this->modalPrefix-$this->id').modal('show');
					}, $this->timeoutForm );
				}
			")
		];

		$this->error = [
            'error' => new JsExpression("
				function(jqXHR, exception)
				{
					setTimeout( function(){
						$.isLoading(\"hide\");
						var data = '';
					    if (jqXHR.status === 0) {
                           var data = 'Not connect. Verify Network.';
                        } else if (jqXHR.status == 404) {
                            var data = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            var data = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            var data = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            var data = 'Time out error.';
                        } else if (exception === 'abort') {
                            var data = 'Ajax request aborted.';
                        } else {
                            var data = 'Uncaught Error.' + jqXHR.responseText;
                        }
                        $errorResponse
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
