<?php

namespace ymobiz\modules\mcms;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Module extends \yii\base\Module
{
	public $userModel;
	public $useridField='id';
	public $usernameField='username';
    public $controllerNamespace = 'ymobiz\modules\mcms\controllers';
    /**
     *
     * @var array
     */
    public $allowActions = [];

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST','GET'],
				],
			],
		];
	}

	public function init()
	{
		parent::init();
		if($this->userModel === null && \Yii::$app instanceof \yii\web\Application){
			$this->userModel = \Yii::$app->user->identityClass;
		}
	}
}
