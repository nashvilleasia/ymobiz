<?php

namespace home\modules\partner\modules\supervisor\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\components\ymoLangManager;
use common\models\auth\ymoAccountSettings;
use common\models\ymoOrders;
use yii\db\Query;
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
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('partner-supervisor')->components['assetManager']['bundles'];
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
            'define-plafond' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'definePlafond',
                ],
            ],
            'replace-plafond-value' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'definePlafondValue',
                ],
            ],
            'new-member' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'newMember',
                ],
            ],
            'edit-member' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'updateMember',
                ],
            ],
            'send-message' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'sendMessages',
                ],
            ],
            'order-signup' => [
                'class' => 'common\actions\PartnerSupervisorOrderAction',
                'options' => [
                    'model' => ymoClients::className(),
                    'request' => 'save',
                    'action' => 'OrderCreate',
                ],
            ],
            'new-card' => [
                'class' => 'common\actions\PartnerSupervisorAction',
                'options' => [
                    'action' => 'newCardHolder',
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
        $this->redirect('/partner-supervisor/registered-cards');
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
            'model' => $accounts->accountsSupervisor,
            'account' => $accounts->clients,
            'contact' => $accounts->contact,
        	'company' => $accounts->company,
        	'shipping' => $accounts->shipping,	
            'documents' => $accounts->documents,
        ]);
        
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionCardTable()
    {
        $page = $this->renderPartial('pages/card-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionMembersTable()
    {
        $page = $this->renderPartial('pages/members-table');
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
    public function actionPaymentDetails()
    {
        $page = $this->renderPartial('pages/payment-details');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionMembers()
    {
        
    	$accounts = new ymoAccountSettings;
    	
    	$page = $this->renderPartial('pages/members-management',[
    		'accounts' => $accounts,
    	]);
    	
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionAddMembers()
    {
        $page = $this->renderPartial('pages/add-members');
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
    
    public function actionTestes()
    {
    	$query = new Query();
    
    	$provider = $query->select('users.*')
	    	->from('ymodb_auth.ymo_user users')
	    	->where('users.group_id != "Admin"')
	    	->andWhere('clients.partner_id = "160"')
	    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
	    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_clients clients', 'clients.user_id = users.id')
	    	->groupBy('clients.user_id')
	    	->orderBy('users.created_at desc, users.updated_at desc')
	    	->all();
    	
    	echo '<pre>';
    	print_r($provider);
    }
}
