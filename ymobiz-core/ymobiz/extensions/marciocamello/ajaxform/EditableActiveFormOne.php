<?php

namespace ymobiz\extensions\marciocamello\ajaxform;

use mcms\ajaxform\EditableActiveForm;
use mcms\ajaxform\EditableActiveFormAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\helpers\Json;

class EditableActiveFormOne extends EditableActiveForm
{
    /*protected $_view;

    public $activeForm = [];

    public $formOptions;

    public $pluginOptions = [];

    public $callbacks = [];

    public $events = [];

    //public $formTemplate = '<li class="form-objects" id="{formid}"><strong>{label}</strong>{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></li>';

    public $formTemplate = '<div class="form-objects" id="{formid}">{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></div>';

    public $responseTemplate = '<div class="form-response"></div>';

    public $tagTemplate = '<div class="col-md-12">{activeform}</div>';

    //public $tagTemplate = '<ul class="col-md-12 ymo-Panel">{activeform}</ul>';

    public $editButtom = null;
    public $editButtomAction = 'activeform-edit';
    public $editButtomClass = 'btn btn-primary';

    public $saveButtom = null;
    public $saveButtomAction = 'activeform-save';
    public $saveButtomClass = 'btn btn-success';

    public $cancelButtom = null;
    public $cancelButtomAction = 'activeform-cancel';
    public $cancelButtomClass = 'btn btn-danger';

    public $objectClass = 'form-objects';

    public $editableClass = 'value-editable';

    public $fieldClass = 'form-group';

    public $model = false;

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
        $this->_view->registerJs("$('#$this->id').editableActiveForm({".$this->pluginOptionsSetup()."});");
    }

    public function renderForm()
    {
        $renderForm = false;
        $formComplete = false;

        $this->formOptions =[
            'options'=>[
                'enctype'=>'multipart/form-data'
            ],
            'pluginOptions' => [
                'dataType' => 'json',
                'target' => '#response-'.$this->id,
                'resetForm' => false,
            ],
            'customCallbacks' => [
                'complete' => new \yii\web\JsExpression("
                    var obj = JSON.parse(event.responseText);
                    console.log(obj);
                    jQuery('.form-response').html(obj.content);
                    if(obj.status===200){
                        $('#$this->id').editableActiveForm({".$this->pluginOptionsSetup()."});
                        var activeFormPlugin = $('#$this->id').data('editableActiveForm');
                        activeFormPlugin.updateForm(obj.response);
                    }
                ")
            ]
        ];

        $formClass = ArrayHelper::getValue($this->activeForm,'class');
        $form = $formClass::begin(ArrayHelper::merge([
            'id' => $this->id
        ],ArrayHelper::merge($this->formOptions,(ArrayHelper::getValue($this->activeForm,'options')) ?
            ArrayHelper::getValue($this->activeForm,'options') : [])));

        if($this->editButtom==null){
            $formComplete .= Html::a(\Yii::t('app','edit'),'#',['class'=> $this->id.'-'.$this->editButtomAction.' '.$this->editButtomClass,'style' => 'display:none; margin-right:5px;']);
        }else{
            $formComplete .= $this->editButtom;
        }

        if($this->saveButtom==null){
            $formComplete .= Html::submitButton('save', ['class' => $this->id.'-'.$this->saveButtomAction.' '.$this->saveButtomClass,'style' => 'display:none; margin-right:5px;']);
        }else{
            $formComplete .= $this->saveButtom;
        }

        if($this->cancelButtom==null){
            $formComplete .= Html::tag('span','cancel', ['class' => $this->id.'-'.$this->cancelButtomAction.' '.$this->cancelButtomClass,'style' => 'display:none;']);
        }else{
            $formComplete .= $this->cancelButtom;
        }

        if($this->responseTemplate==null){
            $formComplete .= '<div class="form-response"></div>';
        }else{
            $formComplete .= $this->responseTemplate;
        }

        foreach($this->attributes as $attribute => $options)
        {
            if(is_array($options)){

                $label = (ArrayHelper::getValue($options,'label')) ? ArrayHelper::getValue($options,'label') :
                    ArrayHelper::getValue($options,'options') ? $attribute : false;
                $value = (ArrayHelper::getValue($options,'value')) ? ArrayHelper::getValue($options,'value') : $this->model->$attribute;

                if(ArrayHelper::getValue($options,'type')=='field'){
                    if(ArrayHelper::getValue($options,'options')==true){

                        $inputType = ArrayHelper::getValue($options['options'],'inputType');
                        $fieldOptions = ArrayHelper::getValue($options['options'],'fieldOptions');
                        $inputOptions = ArrayHelper::getValue($options['options'],'inputOptions');

                        $field = $form->field($this->model, $attribute, ($fieldOptions) ? $fieldOptions : false)
                            ->$inputType(($inputOptions) ? $inputOptions : false);
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
                    '{fieldid}' => BaseHtml::getInputId($this->model,$attribute),
                    '{value}' => $value
                ]);

            }else{

                $attribute = $options;
                $label = false;
                $value = $this->model->$attribute;
                $field = $form->field($this->model, $attribute);

                $renderForm .= strtr($this->formTemplate, [
                    '{formid}' => $this->id,
                    '{label}' => $label,
                    '{field}' => $field,
                    '{fieldid}' => BaseHtml::getInputId($this->model,$attribute),
                    '{value}' => $value
                ]);
            }
        }

        $form::end();

        $formComplete .= strtr($this->tagTemplate, [
            '{activeform}' => $renderForm,
        ]);

        $formComplete .=  '</form>';

        return $formComplete;
    }

    public function registerAssets()
    {
        $this->view = \Yii::$app->getView();
        EditableActiveFormAsset::register($this->view);
    }*/
}