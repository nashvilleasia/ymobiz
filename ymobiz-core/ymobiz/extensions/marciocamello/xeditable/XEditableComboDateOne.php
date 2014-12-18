<?php

namespace ymobiz\extensions\marciocamello\xeditable;

use mcms\xeditable\XEditableComboDate;

class XEditableComboDateOne extends XEditableComboDate
{
    public $button = "
        $.fn.editableform.buttons = '<button type=\"submit\" class=\"editable-submit ymo-btn-logout\">salvar</button>'+
        '<button type=\"button\" class=\"editable-cancel ymo-btn-logout\">cancel</button>';
    ";

    public $toggleCustom = true;

    public $toggleFunction = "
        $('.edit-dropdown').on('click', function () {
            $('.ymo-edit-right').each(function () {
                $(this).removeClass('open');
            });
        });
    ";

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

    public function init()
    {
        parent::init();

        $this->toggleTemplate = '
            <div class="col-md-12 ymo-edit-right ymo-nopadding ymo-Panel">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/home/web/themes/basic/img/icons/edit_on.png">
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="'.$this->buttonAction['edit'].'" class="edit-dropdown" id="edit-'.$this->id.'">'.\Yii::t('app','edit').'</a>
                </li>
                <li>
                    <a href="'.$this->buttonAction['delete'].'" data-confirm="'.\Yii::t('app','Are you sure you want to delete this item?').'" data-method="post">'.\Yii::t('app','delete').'</a>
                </li>
            </ul>
        </div>
        ';

        $this->templateForm = "
            $.fn.editableform.template = '<form class=\"form-inline editableform\">'+
            '<div class=\"control-group\">' +
            '<div><div class=\"editable-input\"></div><div class=\"editable-buttons\"></div></div>'+
            '<div class=\"editable-error-block\"></div>' +
            '</div>' +
            '</form>';
        ";
    }
}