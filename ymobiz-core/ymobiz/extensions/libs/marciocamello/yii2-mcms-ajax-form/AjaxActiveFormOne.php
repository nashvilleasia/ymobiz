<?php

namespace mcms\ajaxform;

use yii\base\Component;
use yii\base\Widget;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\ActiveFormAsset;
use yii\base\InvalidConfigException;
use ymobiz\components\ymoArray;
use ymobiz\components\ymoActiveForm;

class AjaxActiveFormOne extends ymoActiveForm
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
    public $target = '.ymo-json-response';

    /**
     * @see AjaxForm
     * @var string
     */
    public $targetPosition = 'before';

    /**
     * @see AjaxForm
     * @var string
     */
    public $returnForm = 'return false;';

    /**
     * @see AjaxForm
     * @var string
     */
    public $responseClass = 'response-ajax-active-form';

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
    public $model = null;

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
     * @var string
     */
    public $beforeJs = '';

    /**
     * @see AjaxForm
     * @var string
     */
    public $afterJs = '';

    /**
     * @see AjaxForm
     * @var string
     */
    public $localStorage = false;
    public $customLocalStorage = '';

    /**
     * @see AjaxForm
     * @var string
     */
    public $protectedData = null;

	/**
	 * @see AjaxForm
	 * @see Init extension default
	 */
	public function init()
	{
		parent::init();
		$this->registerAssets();

        $this->jsCallbacks();
        $this->localStorage();
        $this->registerScript();
	}

    public function run()
    {
        if (!empty($this->attributes)) {
            $options = Json::encode(ArrayHelper::merge($this->getClientOptions(),$this->getCallbacksOptions()));
            $attributes = Json::encode($this->attributes);
            $view = $this->getView();
            ActiveFormAsset::register($view);
            $view->registerJs($this->beforeJs);
            $view->registerJs("jQuery('#$this->id').yiiActiveForm($attributes, $options);");
            $view->registerJs($this->afterJs);
            echo "<div class='.$this->responseClass' id='response-$this->id'></div>";
        }
        echo Html::endForm();
    }

    public function registerScript()
    {
        $this->paramsOptions = [
            'dataType' => 'html',
            'resetForm' => false,
            'target' => '.' . implode('.', preg_split('/\s+/', $this->responseClass, -1, PREG_SPLIT_NO_EMPTY)) . '#response-'.$this->id,
			'async' => 'true',
        ];

        $options = ArrayHelper::merge(
            $this->paramsOptions,
            $this->pluginOptions,
            $this->callbacks
        );

        $this->beforeSubmit = new \yii\web\JsExpression("
            function(event){
                ".Json::encode(ArrayHelper::getValue($this->customCallbacks,'callbacks'))."
                jQuery(event.currentTarget).ajaxSubmit(".Json::encode($options).");
                $this->returnForm
            }
        ");
    }

    public function jsTarget()
    {
        $target = (ArrayHelper::keyExists('target',$this->options)) ? $this->options['target'] : $this->target;

        preg_match('@^(?:#)?([^/]+)@i',
            $target, $targetMatch);

        return @$targetMatch[1];
    }

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

    public function localStorage()
    {
        $this->view = \Yii::$app->getView();
        if($this->localStorage==true)
        {
        	
        	$steps = \Yii::$app->session->get('steps');
        	$formName = $this->model->formName();
        	$scenario = $this->model->getScenario();
        	
        	if(@$steps){
	        	if(@$scenario!='default')
	        	{
		        	if(@$steps[$this->model->getScenario()]){
			        	$sessionForm = @$steps[$scenario][$formName];

			        	if($sessionForm){

				        	foreach($sessionForm as $key=>$value)
				        	{
				        		if(!is_array($value))
			        			{
		        					$this->model->$key = $value;
			        			}

			        			if($this->model->disableFields==true){
			        				$fieldId = strtolower($formName)."-$key";
			        				$view = \Yii::$app->getview();
			        				$view->registerJs("
			        					jQuery(':input#$fieldId').prop('disabled',true);		
			        				",$view::POS_READY);
			        			}
			        			
				        		if($this->model->protectedData()!=false){
				        			$this->protectedData = $this->model->protectedData();
					        		foreach ($this->protectedData['data'] as $attribute){
				        				if($attribute==$key){
				        					$protect = new $this->protectedData['class'];
				        					$this->model->$attribute = $protect->securityProtect($this->protectedData['method'],$value,$this->protectedData['params']);
				        				}
				        			}
				        		}
				        	}
			        	}
		        	}
	        	}else{
	        		$sessionForm = $this->array_rfind($formName,$steps);
	        		
	        		if($sessionForm){
		        		foreach ($sessionForm as $models)
		        		{
			        		foreach((object)$models as $key=>$value)
			        		{
			        			if(!is_array($value))
			        			{
		        					$this->model->$key = $value;
			        			}
			        			
			        			if($this->model->disableFields==true){
			        				$fieldId = strtolower($formName)."-$key";
			        				$view = \Yii::$app->getview();
			        				$view->registerJs("
			        					jQuery(':input#$fieldId').prop('disabled',true);		
			        				",$view::POS_READY);
			        			}
			        			
			        			if($this->model->protectedData()!=false){
				        			$this->protectedData = $this->model->protectedData();
					        		foreach ($this->protectedData['data'] as $attribute){
				        				if($attribute==$key){
				        					$protect = new $this->protectedData['class'];
				        					$this->model->$attribute = $protect->securityProtect($this->protectedData['method'],$value,$this->protectedData['params']);
				        				}
				        			}
				        		}
			        		}
		        		}
	        		}
	        	}
        	}
        	
        }else if($this->customLocalStorage!=''){
            $this->view->registerJs($this->customLocalStorage);
        }
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
	
	private function array_rfind($find, $arr) {
		$found = array();
		foreach($arr as $key => $val) {
			if($key == $find)
				$found[] = $val;
			elseif(is_array($val))
			$found = array_merge($found, $this->array_rfind($find, $val));
		}
		return $found;
	}
	
	private function recursive_array_search($needle,$haystack) {
		foreach($haystack as $key=>$value) {
			$current_key=$key;
			if($needle===$value OR (is_array($value) && $this->recursive_array_search($needle,$value))) {
				return $current_key;
			}
		}
		return false;
	}
	
	private function search($array, $key, $value)
	{
		$results = array();
	
		if (is_array($array))
		{
			if (isset($array[$key]) && $array[$key] == $value)
				$results[] = $array;
	
			foreach ($array as $subarray)
				$results = array_merge($results, $this->search($subarray, $key, $value));
		}
	
		return $results;
	}
}


/*'beforeSubmit' => new \yii\web\JsExpression("
    function(form){
        jQuery(form).ajaxSubmit({
            dataType:'html',
            resetForm:false,
            target:'#modal-response',
            success: function(responseText, statusText, xhr, \$form)
            {
                setTimeout( function(){
                    $.isLoading('hide');

                    jQuery('#modal-response').html(responseText);
                }, 500 );
            },
            complete: function(event, xhr, settings){
               setTimeout( function(){
                    $.isLoading('hide');

                    if(jQuery('body').find('.error-summary ul li').size()===0) {
                        jQuery(form).resetForm();
                    }

                }, 500 );
            },
            beforeSend: function(xhr){
                $.isLoading(
                    {
                        text: 'Loading',
                        'class': 'fa fa-cog fa-spin fa-lg',
                    }
                );
            },
            error:function(jqXHR, exception){
                setTimeout( function(){
                    $.isLoading('hide');

                    console.debug(jqXHR);
                    console.debug(exception);
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

                    jQuery('#modal-response').html('<div class=\"has-error\"><div class=\"help-block\">'+ data +'</div></div>');
                }, 500 );
            }
        });

        return false;
    }
"),
'beforeValidate' => new \yii\web\JsExpression("
    function (\$form, attribute, messages) {
        console.log('form:' + \$form + ', attribute:' + attribute + ', messages:' + messages);
        return false;
    }
"),
'afterValidate' => new \yii\web\JsExpression("
    function (\$form, attribute, messages) {
        console.log('form:' + \$form + ', attribute:' + attribute + ', messages:' + messages);
    }
")*/
