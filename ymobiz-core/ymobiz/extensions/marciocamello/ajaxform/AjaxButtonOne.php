<?php

namespace ymobiz\extensions\marciocamello\ajaxform;

use Yii;
use mcms\ajaxform\AjaxButton;

class AjaxButtonOne extends AjaxButton
{
	public function init()
    {
        parent::init();
        $this->loadingOptions = "
            {
                text: '".Yii::t('app','Loading')."',
                'class': \"fa fa-cog fa-spin fa-lg\",
            }
        ";
    }
}
