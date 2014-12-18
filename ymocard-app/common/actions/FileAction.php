<?php

namespace common\actions;

use Yii;
use common\models\ymoCards;
use common\models\ymoClients;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use ymobiz\actions\BaseAction;
use ymobiz\components\Upload;
use ymobiz\modules\mcms\helpers\Password;
use yii\helpers\Inflector;
use yii\web\Session;
use ymobiz\components\ymoArray;
use yii\helpers\Json;

class FileAction extends BaseAction
{
    public function DeleteFile()
    {
    	if(Yii::$app->request->isAjax){
    		 
    		Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    		
    		$fileId = Yii::$app->request->post('fileId');
    		
    		if($fileId){
    			
    			unset($_SESSION['steps']['OrderFiles']['card_compliance'][$fileId]);
    			
	    		return [
	    			'status' => 200,
	    			'fileId' => $fileId
	    		];
    		}else{
    			return [
    				'status' => 500,
    				'message' => Yii::t('app','File ID don\'t exist')
    			];
    		}
    	}
    }
}