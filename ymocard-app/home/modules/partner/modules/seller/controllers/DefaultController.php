<?php

namespace home\modules\partner\modules\seller\controllers;

use Yii;
use yii\web\Controller;
use app\components\ymoLangManager;
use common\models\auth\ymoAccountSettings;
use common\models\forms\ymoClientsCompanyForm;
use common\models\forms\ymoClientsForm;
use common\models\ymoClientsFiles;
use common\models\ymoCards;
use common\models\ymoClients;

/**
 * @inheritdoc
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::$app->language = (ymoLangManager::getLang()) ? ymoLangManager::getLang() : 'english';
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('partner-seller')->components['assetManager']['bundles'];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'edit-account-settings' => [
                'class' => 'common\actions\AccountSettingsAction',
                'options' => [
                    'action' => 'accountDetails',
                ],
            ],
            'edit-contact-settings' => [
                'class' => 'common\actions\AccountSettingsAction',
                'options' => [
                    'action' => 'contactDetails',
                ],
            ],
            'edit-company-settings' => [
                'class' => 'common\actions\AccountSettingsAction',
                'options' => [
                    'action' => 'companyDetails',
                ],
            ],
            'edit-shipping-settings' => [
                'class' => 'common\actions\AccountSettingsAction',
                'options' => [
                    'action' => 'shippingDetails',
                ],
            ],
            'edit-documents-settings' => [
                'class' => 'common\actions\AccountSettingsAction',
                'options' => [
                    'action' => 'documentsSettings',
                ],
            ],
            'edit-account-supervisor' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'accountDetails',
                ],
            ],
            'edit-documents-members' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'documentsMembers',
                ],
            ],
            'view-file' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'viewFile',
                ],
            ],
            'block-ymocard' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'blockYmocard',
                ],
            ],
            'unblock-ymocard' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'unblockYmocard',
                ],
            ],
            'order-signup' => [
                'class' => 'common\actions\PartnerSellerOrderAction',
                'options' => [
                    'model' => ymoClients::className(),
                    'request' => 'save',
                    'action' => 'OrderCreate',
                ],
            ],
            'new-card' => [
                'class' => 'common\actions\PartnerSellerAction',
                'options' => [
                    'action' => 'newCardHolder',
                ],
            ],
            'payment-card' => [
                'class' => 'common\actions\PartnerSellerAction',
                'options' => [
                    'action' => 'savePayment',
                ],
            ],
        	'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'transparent' => true,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->redirect('/partner-seller/registered-cards');
    }

    /**
     * @inheritdoc
     */
    public function actionRegisteredCards()
    {
        return $this->render('index');
    }

    /**
     * @inheritdoc
     */
    public function actionAccountSettings()
    {
        $accounts = new ymoAccountSettings;

        $page = $this->renderPartial('pages/account-settings',[
            'model' => $accounts->accounts,
            'account' => $accounts->clients,
            'contact' => $accounts->contact,
        	'company' => $accounts->company,	
            'documents' => $accounts->documents,
        ]);
        
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionSellerTable()
    {
        $page = $this->renderPartial('pages/card-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrder()
    {
        $page = $this->renderPartial('pages/order');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrderCard()
    {
        $page = $this->renderPartial('pages/order-user-card');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrderPayment()
    {
        $page = $this->renderPartial('pages/payment');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionPopups($source)
    {
        $this->layout="/main";

        if($source==FALSE)
            $source='error';
        else
            $source='popups/'.$source;
        return $this->render($source);
    }

    /**
     * @inheritdoc
     */
    public function actionError()
    {
        if (\Yii::$app->exception !== null) {
            return $this->render('error', ['exception' => \Yii::$app->exception]);
        }
    }
}
