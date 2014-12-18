<?php

namespace manager\modules\site\controllers;

use Yii;
use ymobiz\modules\mcms\components\AccessHelper;
use yii\web\Controller;
use ymobiz\components\ymoLangManager;
use ymobiz\activeforms\ymoLoginForm;
use yii\filters\VerbFilter;

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
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('site')->components['assetManager']['bundles'];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
    	return [
    		'verbs' => [
    			'class' => VerbFilter::className(),
    			'actions' => [
    				'logout' => ['post','login'],
    			],
    		],
    	];
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
            'login' => [
                'class' => 'ymobiz\actions\LoginAction',
                'options' => [
                    'action' => 'loginAuth',
                ],
            ],
            'auth-user' => [
                'class' => 'ymobiz\actions\LoginAction',
                'options' => [
                    'action' => 'userAuth',
                ],
            ],
            'logout' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'UserLogout',
                ],
            ],
            'password-recovery' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'PasswordRecovery',
                ],
            ],
            'auth-password-recovery' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'CheckTokenRecoveryPassword',
                ],
            ],
            'auth-reset-password' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'ResetPassword',
                ],
            ],
            'auth-activate-account' => [
                'class' => 'ymobiz\actions\AuthAction',
                'options' => [
                    'action' => 'CheckTokenActivation',
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLoginForm()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ymoLoginForm();
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionManager()
    {
        if(isset($_GET['permissions'])){
            echo '<pre>';
            print_r(AccessHelper::getRoutes());
        }else{
            if(!Yii::$app->user->isGuest)
            {
                echo '<pre>';
                print_r(Yii::$app->authManager->getPermissionsByUser(Yii::$app->user->identity->id));
            }
        }
    }
}
