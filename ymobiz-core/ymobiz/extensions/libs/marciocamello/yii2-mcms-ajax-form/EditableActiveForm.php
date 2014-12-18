<?php

namespace mcms\ajaxform;

use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use mcms\isloading\Isloading;
use common\models\ymoClientsCompany;
use common\models\forms\ymoClientsCompanyForm;
use common\models\auth\ymoAccountSettings;

class EditableActiveForm extends Widget
{
    protected $_view;

    public $activeForm = [
        'class' => 'mcms\ajaxform\AjaxActiveFormOne',
    ];

    public $activeFieldClass = '\yii\widgets\ActiveField';

    public $formOptions;

    public $pluginOptions = [];
    
    public $customResponse= false;

    public $callbacks = [];

    public $events = [];

    public $formTemplate = '<div class="form-objects {displaylabel}" id="{formid}">{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></div>';

    public $responseTemplate = '<div class="form-response-{formid}"></div>';

    public $tagTemplate = '<div class="col-md-12">{activeform}</div>';
    
    public $fieldDisplay = true;
    
    public $buttomTemplate = '{edit}{save}{cancel}';
	
    public $buttomOptions = [];
    
    public $editButtom = null;
    public $editName = false;
    public $editButtomAction = 'activeform-edit';
    public $editButtomClass = 'btn btn-primary';

    public $saveButtom = null;
    public $saveName = false;
    public $saveButtomAction = 'activeform-save';
    public $saveButtomClass = 'btn btn-success';

    public $cancelButtom = null;
    public $cancelName = false;
    public $cancelButtomAction = 'activeform-cancel';
    public $cancelButtomClass = 'btn btn-danger';

    public $objectClass = 'form-objects';

    public $editableClass = 'value-editable';

    public $fieldClass = 'col-md-8 form-group';

    public $displaylabel = false;

    public $model = false;

    public $scenario = false;

    public $attributes = [];

    public function run()
    {
        $this->jsOptions();
        return $this->renderForm();
    }

    public function init()
    {
        parent::init();
        $this->_view = $this->getView();
        $this->registerAssets();
    }

    public function pluginOptionsSetup()
    {
        $options = false;

        $this->pluginOptions = ArrayHelper::merge(
            [
                'id' => $this->id,
            ],
            $this->pluginOptions
        );

        foreach($this->pluginOptions as $name => $value)
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

        return $options;
    }

    public function jsOptions()
    {
        $idJs = Inflector::camelize($this->id);
		$view = $this->_view;
        $view->registerJs("
            $('#$this->id').editableActiveForm({".$this->pluginOptionsSetup()."});
            var activeFormPlugin$idJs = $('#$this->id').data('editableActiveForm');
        ",$view::POS_LOAD);

    }

    public function renderForm()
    {
        $renderForm = false;
        $formComplete = false;

        $idJs = Inflector::camelize($this->id);
		$view = $this->_view;
        
        if($this->scenario){
    		$this->model->scenario = $this->scenario;
        }else if($this->scenario=='default'){
        	$this->scenario = 'default';
        }

        $this->formOptions =[
            'options'=>[
                'enctype'=>'multipart/form-data'
            ],
            'pluginOptions' => ArrayHelper::merge($this->pluginOptions,[
                'dataType' => 'json',
                'resetForm' => false,	
            ]),
            'customCallbacks' => [
            	'complete' => new \yii\web\JsExpression("
		             var obj = JSON.parse(event.responseText);
		             if(obj.status === 200){
		        		 jQuery('.ymo-json-response').html(obj.content);
            			 $this->customResponse
            			 activeFormPlugin$idJs.updateForm();
		             }else if(obj.status === 500){
		        		jQuery('.ymo-json-response').html(obj.content);
		             }
		             activeFormPlugin$idJs.clearModal();
            		 return false;
		        ")	
            ],
	      	'loadingOptions' => "
	    	{
	        	text: '".\Yii::t('app','Loading')."',
	        	'class': \"fa fa-cog fa-spin fa-lg\",
	        	'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
	    	}"
        ];

        $formClass = ArrayHelper::getValue($this->activeForm,'class');
        $form = $formClass::begin(ArrayHelper::merge([
            'id' => $this->id
        ],ArrayHelper::merge($this->formOptions,(ArrayHelper::getValue($this->activeForm,'options')) ?
            ArrayHelper::getValue($this->activeForm,'options') : [])));

        if($this->editButtom==null){
            $editButtom = Html::a(($this->editName==true) ? $this->editName : \Yii::t('app','edit'),'#',['class'=> $this->id.'-'.$this->editButtomAction.' '.$this->editButtomClass,'style' => 'display:none; margin-right:5px;']);
        }else{
            $editButtom = $this->editButtom;
        }

        if($this->saveButtom==null){
            $saveButton = Html::submitButton(($this->saveName==true) ? $this->saveName : \Yii::t('app','save'), ['class' => $this->id.'-'.$this->saveButtomAction.' '.$this->saveButtomClass,'style' => 'display:none; margin-right:5px;']);
        }else{
            $saveButton = $this->saveButtom;
        }

        if($this->cancelButtom==null){
            $cancelButtom = Html::tag('span',($this->cancelName==true) ? $this->editName : \Yii::t('app','cancel'), ['class' => $this->id.'-'.$this->cancelButtomAction.' '.$this->cancelButtomClass,'style' => 'display:none;']);
        }else{
            $cancelButtom = $this->cancelButtom;
        }

        $buttons = strtr($this->buttomTemplate, [
        	'{edit}' => $editButtom,
        	'{save}' => $saveButton,
        	'{cancel}' => $cancelButtom,
        ]);
        
        $formComplete .= Html::tag('div',Html::tag('span',$buttons, $this->buttomOptions), ['style'=>'position:relative;']);

        $formComplete .= strtr($this->responseTemplate, [
            '{formid}' => $this->id,
        ]);

        foreach($this->attributes as $attribute => $options)
        {
            $fieldId = BaseHtml::getInputId($this->model,$attribute);

            if(ArrayHelper::getValue($options,'displayLabel')=='none'){
                $this->displaylabel = 'displaylabel';
                $this->_view->registerJs("
                    $('#$this->id .form-objects.$this->displaylabel-$fieldId').css('display','none');
                ",$view::POS_LOAD);
            }else{
                $this->displaylabel = false;
            }
            if(ArrayHelper::getValue($options,'clearInput')==true){
                $this->_view->registerJs("
                    //$('#$this->id .form-objects.$this->displaylabel-$fieldId').css('display','none');
                ",$view::POS_LOAD);
            }

            if(is_array($options)){

                $label = (ArrayHelper::getValue($options,'label')) ? ArrayHelper::getValue($options,'label') : $this->model->getAttributeLabel($attribute);
                $value = (ArrayHelper::getValue($options,'value')) ? ArrayHelper::getValue($options,'value') : $this->model->$attribute;

                if(ArrayHelper::getValue($options,'type')=='field'){
                    if(ArrayHelper::getValue($options,'options')==true){

                        $inputType = ArrayHelper::getValue($options['options'],'inputType');
                        $fieldOptions = ArrayHelper::getValue($options['options'],'fieldOptions');
                        $inputOptions = ArrayHelper::getValue($options['options'],'inputOptions');
                        $inputWidget = ArrayHelper::getValue($options['options'],'widget');
                        $inputItems = ArrayHelper::getValue($options['options'],'inputItems');

                        $input = new $this->activeFieldClass(ArrayHelper::merge($fieldOptions,[
                            'model' => $this->model,
                            'attribute' => ($inputType=='fileInput' && ArrayHelper::getValue($inputWidget['config']['options'],'multiple')==true) ? $attribute.'[]' : $attribute,
                            'form' => $form
                        ]));

                        $field = $input->$inputType(($inputItems) ? $inputItems : $inputOptions, $inputOptions);

                        if($inputWidget){
                            $field->widget($inputWidget['class'],$inputWidget['config']);
                            if(ArrayHelper::getValue($inputWidget,'caption')){
                                $field .= ArrayHelper::getValue($inputWidget,'caption');
                            }
                        }

                    }else{
                        $field = $form->field($this->model, $attribute);
                    }
                }else{
                    $field = $options;
                }

                $renderForm .= strtr($this->formTemplate, [
                    '{formid}' => $this->id,
                    '{label}' => $label,
                    '{field}' => $field,
                    '{fieldid}' => $fieldId,
                    '{displaylabel}' => ($this->displaylabel==false) ? false : $this->displaylabel . '-' .$fieldId,
                    '{value}' => $value
                ]);

                if(ArrayHelper::getValue($options,'options')==true){
                    if(ArrayHelper::getValue($options['options'],'customResponse')){
                        $renderForm .= ArrayHelper::getValue($options['options'],'customResponse');
                    }
                }

            }else{

                $attribute = $options;
                $label = false;
                $value = $this->model->$attribute;
                $field = $form->field($this->model, $attribute);

                $renderForm .= strtr($this->formTemplate, [
                    '{formid}' => $this->id,
                    '{label}' => $label,
                    '{field}' => $field,
                    '{fieldid}' => $fieldId,
                    '{displaylabel}' => ($this->displaylabel==false) ? false : $this->displaylabel . '-' .$fieldId,
                    '{value}' => $value
                ]);
            }
        }
        
        

        $formComplete .= strtr($this->tagTemplate, [
            '{activeform}' => $renderForm,
        ]);

       	echo $formComplete;
       	
        $formClass::end();
    }

    public function registerAssets()
    {
        $this->view = \Yii::$app->getView();
        EditableActiveFormAsset::register($this->view);
    }
}