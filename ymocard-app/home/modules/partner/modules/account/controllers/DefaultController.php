<?php

namespace home\modules\partner\modules\account\controllers;

use Yii;
use yii\web\Controller;
use app\components\ymoLangManager;
use common\models\auth\ymoAccountSettings;

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
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('partner-account')->components['assetManager']['bundles'];
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
            'view-file' => [
                'class' => 'common\actions\AccountSettingsAction',
                'options' => [
                    'action' => 'viewFile',
                ],
            ],
            'payment-card' => [
                'class' => 'common\actions\PartnerAccountAction',
                'options' => [
                    'action' => 'savePayment',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->redirect('/partner-account/registered-cards');
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
    public function actionPartnerTable()
    {
        $page = $this->renderPartial('pages/card-table');
        return $this->render('page',[
            "page"=>$page
        ]);
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
        	'shipping' => $accounts->shipping,	
            'documents' => $accounts->documents,
        ]);

        return $this->render('page',[
            "page" => $page,
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
