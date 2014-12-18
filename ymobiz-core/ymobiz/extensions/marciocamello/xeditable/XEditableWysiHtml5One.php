<?php

namespace ymobiz\extensions\marciocamello\xeditable;

use mcms\xeditable\XEditableWysiHtml5;
use yii\helpers\ArrayHelper;


class XEditableWysiHtml5One extends XEditableWysiHtml5
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
        'display' => '
            function(value) {
              $(this).html(value);
            }
        '
    ];

    public $buttonAction = [
        'edit' => '#',
        'delete' => 'delete'
    ];

    public $optionsToggle = [];

    public $toggleButtons = [
        '<li><a href="editAction" class="edit-dropdown" id="edit-pluginId">editName</a></li>',
        '<li><a href="deleteAction" deleteOptions>deleteName</a></li>',
    ];

    public $toggleIcon = '<img src="/home/web/themes/basic/img/icons/edit_on.png">';

    public function init()
    {
        parent::init();

        $template = '<div toggleOptions>
                        <a href="#" class="link-editable dropdown-toggle" data-toggle="dropdown">toggleIcon</a>
                        <ul class="dropdown-menu">toggleButtons</ul>
                    </div>';

        $this->toggleTemplate = strtr($template,[
            'toggleOptions' => implode(ArrayHelper::merge($this->optionsToggle,['class="col-md-12 ymo-edit-right ymo-nopadding ymo-Panel"'])),
            'toggleIcon' => $this->toggleIcon,
            'toggleButtons' => strtr(implode($this->toggleButtons),[
                'pluginId' => $this->id,
                'editAction' => $this->buttonAction['edit'],
                'editName' => \Yii::t('app','edit'),
                'deleteAction' => $this->buttonAction['delete'],
                'deleteName' => \Yii::t('app','delete'),
                'deleteOptions' => 'data-confirm="'.\Yii::t('app','Are you sure you want to delete this item?').'" data-method="post"'
            ]),
        ]);
    }
}