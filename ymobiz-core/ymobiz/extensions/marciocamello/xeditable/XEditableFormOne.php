<?php

namespace ymobiz\extensions\marciocamello\xeditable;

use mcms\xeditable\XEditableForm;

class XEditableFormOne extends XEditableForm
{

    public $button = "
        $.fn.editableform.buttons = '<button type=\"submit\" class=\"editable-submit ymo-btn-logout\">salvar</button>'+
        '<button class=\"editable-cancel ymo-btn-logout\">cancel</button>';
    ";

    public $toggleCustom = true;

    /*public $toggleFunction = "
        $('.edit-dropdown').on('click', function () {
            $('.ymo-edit-right').each(function () {
                $(this).removeClass('open');
            });
        });
    ";*/

    public $showbuttons = 'bottom';

    public $events = [
        /*'display' => '
            function(value) {
              $(this).html(value);
            }
        '*/
    ];

    public $buttonAction = [
        'edit' => '#',
        'delete' => 'delete'
    ];

    public $tpl = "
    <div class='form-group'>
        <label class='control-label'>email</label>
        <input class='form-control ymo-input' type='text' name='email'>
    </div>
    <div class='form-group'>
        <label class='control-label'>password</label>
        <input class='form-control ymo-input' type='text' name='password'>
    </div>";

    public function init()
    {
        parent::init();

        $view = \Yii::$app->getView();

        $view->registerCss("
        .editable-buttons.editable-buttons-bottom {
            display: none;
            margin-top: 0px;
            margin-left: 0;
        }
        .editable-error-block, .has-error .help-block {
            margin-top: 0px;
        }
        ");

        $this->toggleTemplate = '';
        //$this->toggleTemplate = '<a href="'.$this->buttonAction['edit'].'" class="edit-dropdown ymo-btn-logout" id="edit-'.$this->id.'">'.\Yii::t('app','edit').'</a>';

        $this->template = "
            $.fn.editableform.template = '<form class=\"col-md-12 ymo-nopadding ".$this->formClass."\">'+
            '<div><div class=\"col-md-12 editable-input ymo-input ymo-nopadding\"  style=\"width: 100%;\"></div><div class=\"col-md-12 editable-buttons ymo-nopadding\"></div></div>'+
            '<div class=\"editable-error-block\"></div>' +
            '</form>';
        ";
    }
}