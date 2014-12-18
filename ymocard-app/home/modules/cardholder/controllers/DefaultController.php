<?php

namespace home\modules\cardholder\controllers;

use Yii;
use yii\web\Controller;
use app\components\ymoLangManager;
use common\models\auth\ymoAccountSettings;
use common\models\ymoClients;
use common\models\ymoClientsFiles;
use common\models\ymoClientsCompany;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use common\models\forms\ymoClientsForm;
use common\models\forms\ymoClientsCompanyForm;
use ymobiz\helpers\Password;
use common\models\ymoCards;

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
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('card-holder')->components['assetManager']['bundles'];
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
            'block-ymocard' => [
                'class' => 'common\actions\CardHolderAction',
                'options' => [
                    'action' => 'blockYmocard',
                ],
            ],
            'unblock-ymocard' => [
                'class' => 'common\actions\CardHolderAction',
                'options' => [
                    'action' => 'unblockYmocard',
                ],
            ],
            'define-plafond' => [
                'class' => 'common\actions\CardHolderAction',
                'options' => [
                    'action' => 'definePlafond',
                ],
            ],
            'replace-plafond-value' => [
                'class' => 'common\actions\CardHolderAction',
                'options' => [
                    'action' => 'definePlafondValue',
                ],
            ],
            'new-card' => [
                'class' => 'common\actions\CardHolderAction',
                'options' => [
                    'action' => 'newCardHolder',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
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
