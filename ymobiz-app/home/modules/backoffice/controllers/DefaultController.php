<?php

namespace home\modules\backoffice\controllers;

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
		\Yii::$app->assetManager->bundles = Yii::$app->getModule('backoffice')->components['assetManager']['bundles'];
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

    public function actionYmobizUser()
    {
        $page = $this->renderPartial('pages/ymobiz-user');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionYmobizMessages()
    {
        $page = $this->renderPartial('pages/ymobiz-messages');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionNewMessages()
    {
        $page = $this->renderPartial('pages/new-messages');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserLog()
    {
        $page = $this->renderPartial('pages/user-log');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserSidebar()
    {
        $page = $this->renderPartial('pages/user-sidebar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserContact()
    {
        $page = $this->renderPartial('pages/user-contact');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserFolders()
    {
        $page = $this->renderPartial('pages/user-folders');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserReadMail()
    {
        $page = $this->renderPartial('pages/user-read-mail');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserNewMail()
    {
        $page = $this->renderPartial('pages/user-new-mail');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCompaniesSidebar()
    {
        $page = $this->renderPartial('pages/companies-sidebar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCompaniesLog()
    {
        $page = $this->renderPartial('pages/companies-log');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionUserStatistics()
    {
        $page = $this->renderPartial('pages/user-statistics');
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

