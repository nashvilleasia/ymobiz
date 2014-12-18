<?php

namespace ymobiz\modules\common;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'ymobiz\modules\common\controllers';
    
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
    		/*'verbs' => [
    			'class' => VerbFilter::className(),
    			'actions' => [
    				'delete' => ['POST','GET'],
    			],
    		],*/
    	];
    }
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
