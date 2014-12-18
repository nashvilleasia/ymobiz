<?php

namespace home\modules\network\controllers;

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
		\Yii::$app->assetManager->bundles = Yii::$app->getModule('network')->components['assetManager']['bundles'];
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

    public function actionEStore()
    {
        $page = $this->renderPartial('pages/estore');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionProfile()
    {
        $page = $this->renderPartial('pages/profile');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionColumnRight()
    {
        $page = $this->renderPartial('pages/column-right');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionProfileHeader()
    {
        $page = $this->renderPartial('pages/profile-header');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionProfileMyestore()
    {
        $page = $this->renderPartial('pages/profile-myestore');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionProfileMyprofile()
    {
        $page = $this->renderPartial('pages/profile-myprofile');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionAdminProfileHeader()
    {
        $page = $this->renderPartial('pages/admin-profile-header');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionAdminProfile()
    {
        $page = $this->renderPartial('pages/admin-profile');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionAdminProfileMyestore()
    {
        $page = $this->renderPartial('pages/admin-profile-myestore');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionAdminProfileMyprofile()
    {
        $page = $this->renderPartial('pages/admin-profile-myprofile');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionEditionProfileHeader()
    {
        $page = $this->renderPartial('pages/edition-profile-header');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionEditionProfileMyprofile()
    {
        $page = $this->renderPartial('pages/edition-profile-myprofile');
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
