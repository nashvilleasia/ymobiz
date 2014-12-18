<?php

namespace home\modules\admin\modules\supervisor\controllers;

use Yii;
use yii\web\Controller;
use app\components\ymoLangManager;
use common\models\auth\ymoAccountSettings;
use common\models\ymoOrders;
use common\models\ymoCards;
use ymobiz\auth\ymoUser;
use yii\db\Query;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

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
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('supervisor')->components['assetManager']['bundles'];
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
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'documentsSettings',
                ],
            ],
            'edit-account-supervisor' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'accountDetails',
                ],
            ],
            'edit-documents-members' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'documentsMembers',
                ],
            ],
            'view-file' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'viewFile',
                ],
            ],
            'block-ymocard' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'blockYmocard',
                ],
            ],
            'unblock-ymocard' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'unblockYmocard',
                ],
            ],
            'define-plafond' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'definePlafond',
                ],
            ],
            'replace-plafond-value' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'definePlafondValue',
                ],
            ],
            'new-member' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'newMember',
                ],
            ],
            'edit-member' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'updateMember',
                ],
            ],
            'send-message' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'sendMessages',
                ],
            ],
            'save-emission' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'saveEmission',
                ],
            ],
            'save-compliance' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'saveCompliance',
                ],
            ],
            'save-treasury' => [
                'class' => 'common\actions\SupervisorAction',
                'options' => [
                    'action' => 'saveTreasury',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->redirect('/supervisor/call-center');
    }

    /**
     * @inheritdoc
     */
    public function actionCallCenter()
    {
        $page = $this->renderPartial('pages/call-center');
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
    public function actionComplianceTable()
    {
        $page = $this->renderPartial('pages/compliance-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionCompliance()
    {
        $page = $this->renderPartial('pages/compliance');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionTreasuryTable()
    {
        $page = $this->renderPartial('pages/treasury-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionTreasury()
    {
        $page = $this->renderPartial('pages/treasury');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEmissionTable()
    {
        $page = $this->renderPartial('pages/emission-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionEmission()
    {
        $page = $this->renderPartial('pages/emission');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionOrderEmission()
    {
        $page = $this->renderPartial('pages/order-emission');
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
    	echo '<pre>';
    	
    	$connection = Yii::$app->db;
    	
    	//$command = $connection->createCommand('SELECT * FROM `ymo_user` LEFT JOIN `ymo_orders` ON ymo_orders.user_id = ymo_user.id');
    	$command = $connection->createCommand('SELECT u2.* FROM ymodb_auth.ymo_user u1 LEFT JOIN ymodb_ymocard.ymo_orders u2 ON u1.id=u2.client_id WHERE u2.client_id IS NOT NULL;');
    	$count = $command->queryScalar();
    	
    	$query = new Query();
    	
    	$dataProvider = new ArrayDataProvider([
    		'key' => 'id',	
    		'allModels' => $query->select('users.*')
    			->from('ymodb_auth.ymo_user users')
    			->where('users.group_id != "Admin"')
    			->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders orders', 'orders.client_id = users.id')
    			->groupBy('id')
    			->orderBy('users.created_at desc, users.updated_at desc')
    			->all(),
    		'pagination' => [
    			'pageSize' => 10,
    		],
    	]);
    	
    	/*$dataProvider = new SqlDataProvider([
		 	'sql' => 'SELECT * FROM ymodb_auth.ymo_user u1 LEFT JOIN ymodb_ymocard.ymo_orders u2 ON u1.id=u2.client_id WHERE u2.client_id IS NOT NULL;',
		    'totalCount' => $count,
		    'pagination' => [
		        'pageSize' => 20,
		    ],
		]);*/
    	
    	echo \yii\grid\GridView::widget([
    			'id' => 'grid2',
    			'dataProvider' => $dataProvider,
    			'columns' => [
    				[
    					'value' => function ($model, $index, $widget) {
    						return $model['username'];
    					}
    				],
    				[
    					'class' => 'yii\grid\ActionColumn',
    					'buttons' => ['view-member' => function ($url, $model) {
    						return "<a href='".\yii\helpers\Url::toRoute(['default/members','memberid' => $model['id'], 'page' => Yii::$app->request->get('page')])."' data-pjax=0>".Yii::$app->getModule('site')->ymoTranslate->t('site','app','view statement')."</a>";
    					}
    				],
    					'template' => '{view-member}',
    					'contentOptions' => ['class'=>'text-right'],
    				],
    			],
    			'rowOptions' => ['data-key' => '12'],
    			'summary' => false,
    			'showHeader' => false,
    			'pager' => [
    			'prevPageLabel' => '<',
    			'nextPageLabel' => '>',
    		],
    		'tableOptions' => ['class' => 'table table-responsive ymo-table'],
    		'rowOptions' => [
    			'class' => 'ymo-item',
    			'data-key' => [
    				234,234		
    			],
    		]
    	]);
    	
    	/*$query = new Query();
    	
    	$query->select('u2.*')
    		->from('ymodb_auth.ymo_user u1')
    		->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders u2', 'u2.client_id = u1.id');
    	
    	$query = new Query();
    	 
    	$query->from('ymodb_auth.ymo_user')
    	->join('LEFT JOIN', 'ymodb_ymocard.ymo_orders', 'ymo_orders.client_id = ymo_user.id');*/
    	
    	/*$query = ymoUser::find()
    		->where(['cluster_id'=>Yii::$app->params['cluster_name']])
    		->joinWith('ordersOne');*/
    	
    	
    	exit;
    
    	/*$query = ymoUser::find()->where(self::findScope())
    		->joinWith('ordersOne')
			->onCondition('ymo_user.group_id != :group_id',[':group_id'=>'Admin'])
    		->orderBy('ymo_user.created_at desc, ymo_user.updated_at desc');*/
    	
    	$query->andWhere(['like', 'status_code', Inflector::slug($match,' ')]);
    	$query->orWhere(['like', 'ymo_orders.status_compliance', Inflector::slug($match,' ')]);
    	
    	print_r($query->all());
    	
    	exit;
    
    	$query = $connection;
    	$query->select("id")->from('ymo_user')->limit(10);
    	
    	$anotherQuery = new Query();
    	$anotherQuery->select('user_id')->from('ymo_orders')->limit(10);
    	
    	$query->union($anotherQuery);
    	
    	/*$query = ymoUser::find()->where(['cluster_id'=>Yii::$app->params['cluster_name']])
    			->joinWith('ordersOne')
    			->onCondition('ymo_user.group_id != :group_id',[':group_id'=>'Admin'])
    			->orderBy('ymo_user.created_at desc, ymo_user.updated_at desc');
    	*/
    	
    	print_r($query->all());
    }
}
