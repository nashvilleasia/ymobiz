<?php

namespace home\modules\staff\controllers;

use Yii;
use yii\web\Controller;
use app\components\ymoLangManager;

class DefaultController extends Controller
{
    public function init()
    {
        parent::init();
        \Yii::$app->language = (ymoLangManager::getLang()) ? ymoLangManager::getLang() : 'english';
        \Yii::$app->assetManager->bundles = Yii::$app->getModule('staff')->components['assetManager']['bundles'];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
