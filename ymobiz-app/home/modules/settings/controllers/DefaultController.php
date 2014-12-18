<?php

namespace home\modules\settings\controllers;

use Yii;
use yii\web\Controller;
use ymobiz\components\ymoLangManager;

class DefaultController extends Controller
{

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		\Yii::$app->language = (ymoLangManager::getLang()) ? ymoLangManager::getLang() : 'english';
		\Yii::$app->assetManager->bundles = Yii::$app->getModule('settings')->components['assetManager']['bundles'];
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
		];
	}
	
	public function actionIndex()
	{
        \Yii::$app->view->title = "YMOBIZ - My Mobile Business";
		return $this->render('index');
	}

    public function actionPageExample()
    {
        $page = $this->renderPartial('pages/page-example');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCompany()
    {
        $page = $this->renderPartial('pages/company');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionNotifications()
    {
        $page = $this->renderPartial('pages/notifications');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSettingsMarketing()
    {
        $page = $this->renderPartial('pages/settings-marketing');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSettingsBusiness()
    {
        $page = $this->renderPartial('pages/settings-business');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSettingsNetwork()
    {
        $page = $this->renderPartial('pages/settings-network');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionPopups($source)
    {
        $this->layout="main";

        if($source==FALSE)
            $source='error';
        else
            $source='popups/'.$source;
        return $this->render($source);
    }

    public function actionError()
    {
        if (\Yii::$app->exception !== null) {
            return $this->render('error', ['exception' => \Yii::$app->exception]);
        }
    }
}
