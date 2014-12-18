<?php

namespace ymobiz\components;

use Yii;
use yii\base\Component;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/**
 * @inheritdoc
 */
class ymoMenu extends Component
{
    public $_user;
    public $_view;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->_view = \Yii::$app->getView();
        $this->_user = \Yii::$app->user;
    }

    public function accessMenu()
    {
         echo $this->_view->render('@site/views/default/menu');
    }
}

/*card-holder
partner
    pages
        menu
            account-settings
            site/logout
    seller
        pages
            menu
                member-management
                partner/account-settings
                site/logout
    supervisor
        pages
            menu
staff
    call
        pages
            menu
    compliance
        pages
            menu
    emission
        pages
            menu
    treasury
        pages
            menu
site*/






































