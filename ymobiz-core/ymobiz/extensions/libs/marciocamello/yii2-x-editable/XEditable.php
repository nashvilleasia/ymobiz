<?php

/**
 * XEditable class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\xeditable;

use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\View;
use yii\widgets\ActiveForm;

\Yii::setAlias('@xeditable', dirname(__FILE__));

class XEditable extends \yii\base\Widget
{

    /**
     * @var string editable template default
     */
    public $templateCustom = false;
    public $formClass = 'form-inline';
    public $templateForm = "
        $.fn.editableform.template = '<form class=\"editableform\">'+
        '<div class=\"control-group\">' +
        '<div><div class=\"editable-input\"></div><div class=\"editable-buttons\"></div></div>'+
        '<div class=\"editable-error-block\"></div>' +
        '</div>' +
        '</form>';
    ";

    /**
     * @var string editable container type: popup or inline
     */
    public $mode = 'inline';
	/**
	 * @see Xeditable
	 * @var object
	 * Additional options for submit ajax request. List of values: http://api.jquery.com/jQuery.ajax
	 *
	 * ajaxOptions: {
	 * 		type: 'put',
	 * 		dataType: 'json'
	 * }
	 */
	public $ajaxOptions = null;

	/**
	 * @see Xeditable
	 * @var string
	 * Animation speed (inline mode only)
	 */
	public $anim = false;

	/**
	 * @see Xeditable
	 * @var string
	 * Allows to automatically set element's text based on it's value. Can be auto|always|never. Useful for select and date.
	 * For example, if dropdown list is {1: 'a', 2: 'b'} and element's value set to 1, it's html will be automatically set to 'a'.
	 * auto - text will be automatically set only if element is empty.
	 * always|never - always(never) try to set element's text.
	 */
	public $autotext = 'auto';

	/**
	 * @see Xeditable
	 * @var string|object
	 * Value that will be displayed in input if original field value is empty (null|undefined|'').
	 */
	public $defaultValue = null;

	/**
	 * @see Xeditable
	 * @var boolean
	 * Sets disabled state of editable
	 */
	public $disabled = false;

	/**
	 * @see Xeditable
	 * @var function|boolean
	 * Callback to perform custom displaying of value in element's text.
	 * If null, default input's display used.
	 * If false, no displaying methods will be called, element's text will never change.
	 * Runs under element's scope.
	 * Parameters:
	 *
	 * value current value to be displayed
	 * response server response (if display called after ajax submit), since 1.4.0
	 * For inputs with source (select, checklist) parameters are different:
	 *
	 * value current value to be displayed
	 * sourceData array of items for current input (e.g. dropdown items)
	 * response server response (if display called after ajax submit), since 1.4.0
	 * To get currently selected items use $.fn.editableutils.itemsByValue(value, sourceData).
	 *
	 * display: function(value, sourceData) {
	 * //display checklist as comma-separated values
	 * var html = [],
	 * checked = $.fn.editableutils.itemsByValue(value, sourceData);
	 *
	 * if(checked.length) {
	 * 		$.each(checked, function(i, v) { html.push($.fn.editableutils.escape(v.text)); });
	 * 			$(this).html(html.join(', '));
	 * 		} else {
	 * 			$(this).empty();
	 * 		}
	 * }
	 */
	public $display = null;

	/**
	 * @see Xeditable
	 * @var string
	 * Css class applied when editable text is empty.
	 */
	public $emptyclass = 'editable-empty';

	/**
	 * @see Xeditable
	 * @var string
	 * Text shown when element is empty.
	 */
	public $emptytext = '';

	/**
	 * @see Xeditable
	 * @var function
	 * Error callback. Called when request failed (response status != 200).
	 * Usefull when you want to parse error response and display a custom message. Must return string - the message to be displayed in the error block.
	 *
	 * error: function(response, newValue) {
	 * if(response.status === 500) {
	 * 		return 'Service unavailable. Please try later.';
	 * } else {
	 * 		return response.responseText;
	 * }
	 * }
	 */
	public $error = null;

	/**
	 * @see Xeditable
	 * @var string|boolean
	 * Color used to highlight element after update. Implemented via CSS3 transition, works in modern browsers.
	 */
	public $highlight = '#FFFF80';

	/**
	 * @see Xeditable
	 * @var string
	 * Name of field. Will be submitted on server. Can be taken from id attribute
	 */
	public $name = null;

	/**
	 * @see Xeditable
	 * @var string
	 * Action when user clicks outside the container. Can be cancel|submit|ignore.
	 * Setting ignore allows to have several containers open.
	 */
	public $onblur = 'cancel';

	/**
	 * @see Xeditable
	 * @var object|function
	 * Additional params for submit. If defined as object - it is appended to original ajax data (pk, name and value).
	 * If defined as function - returned object overwrites original ajax data.
	 *
	 * params: function(params) {
	 * 		//originally params contain pk, name and value
	 * 		params.a = 1;
	 * 		return params;
	 * }
	 */
	public $params = null;

	/**
	 * @see Xeditable
	 * @var string|object|function
	 * Primary key of editable object (e.g. record id in database).
	 * For composite keys use object, e.g. {id: 1, lang: 'en'}. Can be calculated dynamically via function.
	 */
	public $pk = null;

	/**
	 * @see Xeditable
	 * @var string
	 * Placement of container relative to element. Can be top|right|bottom|left. Not used for inline container.
	 */
	public $placement = 'top';

	/**
	 * @see Xeditable
	 * @var boolean
	 * Whether to save or cancel value when it was not changed but form was submitted
	 */
	public $savenochange = false;

	/**
	 * @see Xeditable
	 * @var string
	 * If selector is provided, editable will be delegated to the specified targets.
	 * Usefull for dynamically generated DOM elements.
	 * Please note, that delegated targets can't be initialized with emptytext and autotext options, as they actually become editable only after first click.
	 * You should manually set class editable-click to these elements.
	 * Also, if element originally empty you should add class editable-empty, set data-value="" and write emptytext into element:
	 *
	 * <div id="user">
	 * 		<!-- empty -->
	 * 		<a href="#" data-name="username" data-type="text" class="editable-click editable-empty" data-value="" title="Username">Empty</a>
	 * 		<!-- non-empty -->
	 * 		<a href="#" data-name="group" data-type="select" data-source="/groups" data-value="1" class="editable-click" title="Group">Operator</a>
	 * </div>
	 *
	 * <script>
	 * $('#user').editable({
	 * 		selector: 'a',
	 * 		url: '/post',
	 * 		pk: 1
	 * });
	 * </script>
	 */
	public $selector = null;

	/**
	 * @see Xeditable
	 * @var string
	 * Strategy for sending data on server. Can be auto|always|never. When 'auto' data will be sent on server only
	 * if pk and url defined, otherwise new value will be stored locally.
	 */
	public $send = 'auto';

	/**
	 * @see Xeditable
	 * @var boolean|string
	 * Where to show buttons: left(true)|bottom|false
	 * Form without buttons is auto-submitted.
	 */
	public $showbuttons = 'bottom';

	/**
	 * @see Xeditable
	 * @var function
	 * Success callback. Called when value successfully sent on server and response status = 200.
	 * Usefull to work with json response. For example, if your backend response can be {success: true} or {success: false, msg: "server error"} you can check it inside this callback.
	 * If it returns string - means error occured and string is shown as error message.
	 * If it returns object like {newValue: <something>} - it overwrites value, submitted by user.
	 * Otherwise newValue simply rendered into element.
	 *
	 * success: function(response, newValue) {
	 * 		if(!response.success)
	 * 		return response.msg;
	 * }
	 */
	public $success = null;

	/**
	 * @see Xeditable
	 * @var string
	 * How to toggle editable. Can be click|dblclick|mouseenter|manual.
	 * When set to manual you should manually call show/hide methods of editable.
	 * Note: if you call show or toggle inside click handler of some DOM element, you need to apply e.stopPropagation() because containers are being closed on any click on document.
	 *
	 * $('#edit-button').click(function(e) {
	 * 		e.stopPropagation();
	 * 		$('#username').editable('toggle');
	 * });
	 */
	public $toggle = 'click';
    public $toggleCustom = false;
    public $toggleUrl = '#';
    public $toggleTemplate = '<i class="glyphicon glyphicon-pencil" style="padding-right: 5px"></i>[edit]';
    public $toggleOptions = [
        'class' => 'btn-editable',
    ];
    public $toggleFunction = false;

	/**
	 * @see Xeditable
	 * @var string
	 * Type of input. Can be text|textarea|select|date|checklist and more
	 */
	public $type = 'text';

	/**
	 * @see Xeditable
	 * @var string
	 * Css class applied when value was stored but not sent to server (pk is empty or send = 'never').
	 * You may set it to null if you work with editables locally and submit them together.
	 */
	public $unsavedclass = 'editable-unsaved';

	/**
	 * @see Xeditable
	 * @var string|function
	 * Url for submit, e.g. '/post'
	 * If function - it will be called instead of ajax. Function should return deferred object to run fail/done callbacks.
	 *
	 * url: function(params) {
	 * 		var d = new $.Deferred;
	 * 		if(params.value === 'abc') {
	 * 			return d.reject('error message'); //returning error via deferred object
	 * 		} else {
	 * 		//async saving data in js model
	 * 			someModel.asyncSaveMethod({
	 * 				...,
	 * 				success: function(){
	 * 					d.resolve();
	 * 				}
	 * 			});
	 * 			return d.promise();
	 * 		}
	 * }
	 */
	public $url = null;

	/**
	 * @see Xeditable
	 * @var function
	 * Function for client-side validation. If returns string - means validation not passed and string showed as error.
	 * Since 1.5.1 you can modify submitted value by returning object from validate: {newValue: '...'} or {newValue: '...', msg: '...'}
	 *
	 * validate: function(value) {
	 * 		if($.trim(value) == '') {
	 * 			return 'This field is required';
	 * 		}
	 * }
	 */
	public $validate = null;

	/**
	 * @see Xeditable
	 * @var mixed
	 * Initial value of input. If not set, taken from element's text.
	 * Note, that if element's text is empty - text is automatically generated from value and can be customized (see autotext option).
	 * For example, to display currency sign:
	 *
	 * <a id="price" data-type="text" data-value="100"></a>
	 * <script>
	 * $('#price').editable({
	 * 		...
	 * 		display: function(value) {
	 * 			$(this).text(value + '$');
	 * 		}
	 * })
	 * </script>
	 */
	public $value = null;

	/**
	 * @see Xeditable
	 * @var array
	 */
	public $paramsOptions = [];

	/**
	 * @see Xeditable
	 * @var array
	 */
	public $options = [];

	/**
	 * @see Xeditable
	 * @var array
	 */
	public $htmlOptions = [];

	/**
	 * @see Xeditable
	 * @var array
	 */
	public $pluginOptions = [];

	/**
	 * @see Xeditable
	 * @var function
	 */
	public $method = null;

	/**
	 * @see Xeditable
	 * @var string
	 */
	public $title = null;

	/**
	 * @see Xeditable
	 * @var object
	 */
	public $model = null;

    /**
     * @see Xeditable
     * @var object
     */
    public $scenario = null;

	/**
	 * @see Xeditable
	 * @var array
	 */
	public $source = null;

	/**
	 * DOM id of target where afterAjaxUpdate handler will call
	 * live update of editable element
	 *
	 * @var string
	 */
	public $liveTarget = null;
	/**
	 * jQuery selector of elements to wich will be applied editable.
	 * Usefull in combination of `liveTarget` when you want to keep field(s) editble
	 * after ajaxUpdate
	 *
	 * @var string
	 */
	public $liveSelector = null;

	protected $_prepareToAutotext = false;

	/**
	 * @see Xeditable
	 * @var object
	 */
	public $callbacks = [];

	/**
	 * @see Xeditable
	 * @var object
	 */
	public $events = [];

	/**
	 * @see Xeditable
	 * @var string
	 */
	public $button = null;

	/**
	 * @see Xeditable
	 * @var boolean
	 */
	public $access = null;
    public $accessRule = null;

	/**
	 * @see Xeditable
	 * @var string
	 */
	public $html = true;

    /**
     * @see Xeditable
     * @var string
     */
    public $multilanguage = false;

    /**
     * @see Xeditable
     * @var string
     */
    public $tagReplace = false;

    /**
     * @see Xeditable
     * @var string
     */
    public $tpl = '<input type="text">';

	/**
	 * @see Xeditable
	 * @var string
	 */
	public $var = null;


	/**
	 * @see Xeditable
	 * @see Init extension default
	 */
	public function init()
	{
		parent::init();
		$this->registerAssets();

        $this->templateForm = "
            $.fn.editableform.template = '<form class=\"".$this->formClass." editableform\">'+
            '<div class=\"control-group\">' +
            '<div><div class=\"editable-input\"></div><div class=\"editable-buttons\"></div></div>'+
            '<div class=\"editable-error-block\"></div>' +
            '</div>' +
            '</form>';
        ";
	}

	/**
	 * @see Xeditable
	 * @see Load extension with all settings
	 */
	public function run()
	{
		$this->jsOptions();
		$this->registerScript();
		return $this->htmlOptions();
	}

	public function registerScript()
	{
		$options = false;

		foreach($this->options as $name => $value)
		{
			$options .= $name.":".Json::encode($value).",";
		}

		foreach($this->callbacks as $name => $value)
		{
			$options .= $name.":".$value.",";
		}

		foreach($this->events as $name => $value)
		{
			$options .= $name.":".$value.",";
		}

		$this->view->registerJs("$('#$this->id').editable({".$options."});");
        $this->view->registerJs("if($.fn.editable)".$this->templateForm.$this->button);

        if($this->toggleFunction==true){
            $this->view->registerJs($this->toggleFunction);
        }
	}

	public function htmlOptions()
	{
		if(ArrayHelper::getValue($this->pluginOptions,'toggle')=='manual')
		{
			$editBtn = null;

            $this->view->registerJs("
						$('#edit-".$this->id."').click(function(e) {
							e.stopPropagation();
							e.preventDefault();
							$('#".$this->id."').editable('toggle');
						});",View::POS_READY);

			if($this->access==true)
			{
				if (!\Yii::$app->user->isGuest)
				{
                    /*\Yii::$app->user->can('admin')*/
					if($this->accessRule)
					{

                        if($this->toggleCustom==false)
                        {
						    $editBtn = Html::a($this->toggleTemplate, $this->toggleUrl, ArrayHelper::merge(['id' => "edit-".$this->id],$this->toggleOptions));
                        }else{
                            $editBtn = $this->toggleTemplate;
                        }
					}
				}

			}else if($this->access==false){

                if($this->toggleCustom==false)
                {
                    $editBtn = Html::a($this->toggleTemplate, $this->toggleUrl, ArrayHelper::merge(['id' => "edit-".$this->id],$this->toggleOptions));
                }else{
                    $editBtn = $this->toggleTemplate;
                }
            }

			$htmlOptions = $editBtn.Html::tag('div',$this->value,ArrayHelper::merge($this->dataHtmlOptions(),[
					'style' => 'display:inline;'
			]));

		}else{

			$htmlOptions =  Html::a($this->value, '#', $this->dataHtmlOptions());
		}

		if($this->html==true)
		{
            return $htmlOptions;
		}else{
			return $editBtn;
		}
	}

	public function dataHtmlOptions()
	{

		foreach($this->paramsOptions['default'] as $name => $value)
		{
			if($name!='id')
			{
				$dataOptions['data-'.$name] = $value;
			}else{
				$dataOptions[$name] = $value;
			}
		}

		return ($this->htmlOptions) ? ArrayHelper::merge($dataOptions,$this->htmlOptions) : $dataOptions;
	}

	public function jsOptions()
	{

		/**
		 * @see Xeditable
		 * @see set default params
		 */
		$this->paramsOptions['default'] = [
            'mode' => $this->mode,
			'id' => $this->id,
			'type' => $this->type,
			'url' => $this->url,
			'placement' => $this->placement,
			'emptytext' => $this->emptytext,
			'showbuttons' => $this->showbuttons,
			'send' => $this->send,
            'tpl' => $this->tpl
		];

		/**
		 * @see Xeditable
		 * @see get data with model
		 */
		if($this->model)
		{
			$name = $this->pluginOptions['name'];

            if($this->multilanguage==true)
            {
                $model = new $this->model->modelClass;
                $value = $this->model->one()->$name;

                $this->paramsOptions['model'] = [
                    'url' => 'editable',
                    'value' => ($this->model->one()==false) ? null : $this->model->one()->$name,
                    'pk' => [
                        'id' => ($this->model->one()==false) ? null : $this->model->one()->id,
                        'slug' => @($this->model->one()==false) ? @$this->model->where['slug'] : @$this->model->one()->slug,
                        'lang' => ($this->model->one()==false) ? Yii::$app->language : $this->model->one()->lang,
                        'scenario' => $this->scenario,
                    ],
                    'send' => 'always',
                ];
            }else{

                $value = $this->model->$name;
                $this->paramsOptions['model'] = [
                    'url' => 'editable',
                    'value' => $this->model->$name,
                    'pk' => [
                        'id' => $this->model->id,
                        'scenario' => $this->scenario,
                    ],
                ];
            }

			$this->options = ArrayHelper::merge(
				$this->paramsOptions['default'],
				$this->paramsOptions['model'],
				$this->pluginOptions
			);

		}else{

            $this->options = ArrayHelper::merge(
                $this->paramsOptions['default'],
                $this->pluginOptions
            );
		}

		/**
		 * @see Xeditable
		 * @see i18n for `clear` in date and datetime
		 */
		if($this->type == 'date' || $this->type == 'datetime') {
			if(!isset($this->options['clear'])) {
				$this->options['clear'] = \Yii::t('app', 'x clear');
			}
		}
	}

	public function saveAction($data)
	{
        if($this->type=='file'){

            $model = ArrayHelper::getValue($data,'model');
            $name = ArrayHelper::getValue($data,'name');
            $value = ArrayHelper::getValue($data,'value');
            $scenario = ArrayHelper::getValue($data,'scenario');

            if ($scenario !== null) {
                $model->scenario = $scenario;
            }

            if($model===null)
                throw new NotFoundHttpException();
            if(!is_array($value)){
                if (strtotime($value))
                {
                    $model->$name = strtotime($value);
                }else{
                    $model->$name = $value;
                }
            }else{
                $model->$name = implode(',', $value);
            }

            if ($model->validate()){
                $model->update();
            }else{
                VarDumper::dump($model->getErrors(),10);
            }

        }else{

            $class = ArrayHelper::getValue($data,'model');
            $attribute = ArrayHelper::getValue($data,'attribute');
            $value = ArrayHelper::getValue($data,'value');
            $pk = ArrayHelper::getValue($data,'pk');
            $scenario = ArrayHelper::getValue($data,'scenario');
            $preProcess = ArrayHelper::getValue($data,'preProcess');
            $forceCreate = ArrayHelper::getValue($data,'forceCreate');

            if ($attribute === null) {
                throw new BadRequestHttpException(Yii::t('app','\'name\' parameter cannot be empty.'));
            }
            if ($value === null) {
                throw new BadRequestHttpException(Yii::t('app','\'value\' parameter cannot be empty.'));
            }

            if(is_array($pk)){
            	if($pk['id']!='null'){
                	$model = $class::findOne($pk['id']);
            	}
            }else{
            	$model = $class::findOne($pk);
            }

            if (!$model) {
                if ($forceCreate) { // only useful for models with one editable attribute or no validations
                    $model = new $class;
                } else {
                    throw new BadRequestHttpException(Yii::t('app','Entity not found by primary key ') . $pk);
                }
            }

            // do we have a preProcess function
            if ($preProcess && is_callable($preProcess, true)) {
                call_user_func($preProcess, $model);
            }

           if ($scenario !== null) {
                $model->scenario = $scenario;
           }

        	$model->$attribute = $value;
            	
            if ($model->validate([$attribute])) {
                return $model->save(false);
            } else {
                throw new BadRequestHttpException($model->getFirstError($attribute));
            }   
        }
	}

	/**
	 * @see Xeditable
	 * @see Register assets from this extension and yours types
	 */
	public function registerAssets()
	{

		$config = new XEditableConfig();

		if(isset($this->pluginOptions['mode']) && is_array($this->pluginOptions)){
			$config->mode = $this->pluginOptions['mode'];
		}

		if(isset($this->pluginOptions['form']) && is_array($this->pluginOptions)){
			$config->form = $this->pluginOptions['form'];
		}

		$config->registerDefaultAssets();

		if($this->type == 'select2') {
			Select2Asset::register($this->view);
		}

		if($this->type == 'datetime') {
			DateTimePickerAsset::register($this->view);
            if(isset($this->pluginOptions['datetimepicker'])){
                $datetimepicker_json=  json_encode($this->pluginOptions['datetimepicker']);
                if(isset($datetimepicker_json->language)){
                    XEditableAsset::register($this->view)->js[]='bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.'.$datetimepicker_json->language.'.js';
                }
            }
		}

		if($this->type == 'date') {
			DatePickerAsset::register($this->view);
		}

		if($this->type == 'typeaheadjs') {
			TypeaheadAsset::register($this->view);
		}

		if($this->type == 'combodate') {
			ComboDateAsset::register($this->view);
		}

		if($this->type == 'wysihtml5') {
			WysiHtml5Asset::register($this->view);
		}

		$view = $this->getView();
		XEditableAsset::register($this->view);
	}
}