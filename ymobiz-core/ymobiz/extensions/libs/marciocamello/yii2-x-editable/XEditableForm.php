<?php

/**
 * XEditableForm class file.
 *
 * @author Marcio Camello <marciocamello@outlook.com>
 * @link http://
 * @copyright Copyright &copy; Marcio Camello 2014
 * @version 1.5.1
 */

namespace mcms\xeditable;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

class XEditableForm extends XEditable
{
    public $tpl = "
    <div class='form-group'>
        <label class='control-label'>City</label>
        <input class='form-control' type='text' name='city'>
    </div>
    <div class='form-group'>
        <label class='control-label'>Street</label>
        <textarea class='form-control' name='street'></textarea>
    </div>
    <div class='form-group'>
        <label class='control-label'>Building</label>
        <select class='form-control' name='building'>
            <option value='1'>1</option>
            <option value='12'>12</option>
        </select>
    </div>";

    public $formTypes = 'input,textarea,select';

    /**
     * @see Xeditable
     * @see Init extension default
     */
    public function init()
    {
        parent::init();
        $this->formModule();
        $this->formTemplate();
        $this->formActivate();

        $this->view->registerJs("
            $('#save-$this->id').click(function(event){
                event.preventDefault();
                $('button.editable-submit').trigger('click');
            });
        ");

        $this->events = ArrayHelper::merge(
            $this->formEvents(),
            $this->events
        );
    }

    public function formModule()
    {
        $this->getView()->registerJs("
            (function ($) {
                'use strict';

                    var YiiForm = function (options) {
                        this.init('yiiForm', options, YiiForm.defaults);
                    };

                    //inherit from Abstract input
                    $.fn.editableutils.inherit(YiiForm, $.fn.editabletypes.abstractinput);

                    $.extend(YiiForm.prototype, {
                        render: function() {
                        ".$this->formTypes()."
                    },

                    value2html: function(value, element) {
                        if(!value) {
                            $(element).empty();
                            return;
                        }
                        var html = ".$this->formValue2Html()."
                        $(element).html(html);
                    },

                    html2value: function(html) {
                        return null;
                    },

                    value2str: function(value) {
                        var str = '';
                        if(value) {
                            for(var k in value) {
                                str = str + k + ':' + value[k] + ';';
                               }
                           }
                        return str;
                    },

                    str2value: function(str) {
                        return str;
                    },

                    value2input: function(value) {
                        if(!value) {
                            return;
                        }
                        ".$this->formValue2Input()."
                    },

                    input2value: function() {
                        return {
                            ".$this->formClear()."
                        };
                    },

                    activate: function() {
                        ".$this->formActivate()."
                    },

                    autosubmit: function() {
                        this.\$input.keydown(function (e) {
                            if (e.which === 13) {
                                $(this).closest('form').submit();
                            }
                        });
                    }
                });

                YiiForm.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {});

                $.fn.editabletypes.yiiForm = YiiForm;

            }(window.jQuery));
        ");
    }

    public function formTemplate()
    {
        $this->tpl = $this->tpl;
        return $this->tpl;
    }

    public function formValue2Html()
    {
        $html = '';

        foreach($this->pluginOptions['value'] as $input => $value){
            $html .= "$('<div>').text(value.$input).html()+";
        }

        $html = rtrim($html,'+');

        return $html;
    }

    public function formValue2Input()
    {
        $value = '';
        foreach($this->pluginOptions['value'] as $input => $inputValue){
            $value .= "this.\$input.filter('[name=\"$input\"]').val(value.$input);";
        }

        return $value;
    }

    public function formTypes()
    {
        $types = "this.\$input = this.\$tpl.find('$this->formTypes');";
        return $types;
    }

    public function formClear()
    {
        $clear = '';
        foreach($this->pluginOptions['value'] as $input => $inputValue){
            $clear .= "$input: this.\$input.filter('[name=\"$input\"]').val(),";
        }

        return $clear;
    }

    public function formActivate()
    {
        $activate = '';
        foreach($this->pluginOptions['value'] as $input => $inputValue){
            $activate .= "this.\$input.filter('[name=\"$input\"]').focus();";
        }

        return $activate;
    }

    public function formEvents()
    {
        $this->events = [
            'display' => new JsExpression('
                function(value) {
                    if(!value) {
                        $(this).empty();
                        return;
                    }

                    var html = '.$this->formDisplayTemplate().'

                    $(this).html(html);
                }
            '),
            'validate' => new JsExpression('
                function(value) {
                   '.$this->formValidate().'
                }
           ')
        ];
    }

    public function formDisplayTemplate()
    {
        $display = '';

        foreach($this->pluginOptions['value'] as $input => $value){
            $display .= '"<li>"+
                        "<strong>'.$input.'</strong>"+
                        "<p>" + $("<div>").text(value.'.$input.').html() + "</p>"+
                        "</li>"+';
        }

        $display = rtrim($display,'+');

        return $display;
    }

    public function formValidate()
    {
        $validate = '';

        foreach($this->pluginOptions['value'] as $key => $input){
            $attributes[$key] = '';
        }

        $this->model->setAttributes($attributes);

        if (!$this->model->validate()) {
            foreach($this->model->errors as $attribute => $message)
            {
                $validate .= 'if(value.'.$attribute.' == "") return "'.$this->model->getFirstError($attribute).'";';
            }

            return $validate;
        }
    }
}
