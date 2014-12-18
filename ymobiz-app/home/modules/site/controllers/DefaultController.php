<?php

namespace home\modules\site\controllers;

use Yii;
use ymobiz\modules\mcms\components\AccessHelper;
use yii\web\Controller;
use ymobiz\components\ymoLangManager;
use ymobiz\activeforms\ymoLoginForm;
use yii\filters\VerbFilter;
use common\models\forms\ymoPreOrder;
use yii\helpers\Html;
use ymobiz\components\ymoTools;

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
    				'logout' => ['post',`login`],
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
            'pre-order' => [
                'class' => 'common\actions\PreOrderAction',
                'options' => [
                    'action' => 'savePreOrder',
                ],
            ],
        ];
    }

	public function actionIndex()
	{
        \Yii::$app->view->title = "YMOBIZ - My Mobile Business";
		return $this->render('index');
	}

    public function actionMainMenu()
    {
        if(!Yii::$app->user->isGuest)
        {
            $page = $this->renderPartial('pages/main-menu');
            return $this->render('page',[
                "page"=>$page
            ]);
        }else{
            return $this->goHome();
        }
    }

    public function actionPopups($source)
    {
        $this->layout="/main";

        if($source==FALSE)
            $source='error';
        else
            $source='popups/'.$source;
        
        return Yii::$app->controller->render('@common/errors/popup',[
        	'custom' => Yii::$app->controller->render($source),
        	'size' => 'modal-md'	
        ]);
        
    }

    public function actionNonPopups($source)
    {
        $this->layout="/main";

        if($source==FALSE)
            $source='error';
        else
            $source='popups/'.$source;
        
        return Yii::$app->controller->render($source);
        
    }

    public function actionError()
    {
        if (\Yii::$app->exception !== null) {
            return $this->render('error', ['exception' => \Yii::$app->exception]);
        }
    }
    
    public function actionDateTest()
    {
    	$days = new ymoTools();
    	echo Html::dropDownList('days',false,$days->orderDay);
    	echo Html::dropDownList('months',false,$days->orderMonth);
    	echo Html::dropDownList('years',false,$days->orderYear);
    }
}
