<?php

namespace backoffice\modules\site\controllers;

use Yii;
use ymobiz\modules\mcms\components\AccessHelper;
use yii\web\Controller;
use ymobiz\activeforms\ymoLoginForm;
use yii\filters\VerbFilter;
use ymobiz\components\ymoLangManager;

/**
 * Default controller
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
    				'logout' => ['post'],
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
    
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);
        // add "readPost" permission
        $readPost = $auth->createPermission('readPost');
        $readPost->description = 'read a post';
        $auth->add($readPost);

        // add "reader" role and give this role the "readPost" permission
        $reader = $auth->createRole('reader');
        $auth->add($reader);
        $auth->addChild($reader, $readPost);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $reader);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
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
