<?php

namespace ymobiz\components;

use Yii;
use ymobiz\modules\mcms\models\Role;
use yii\helpers\ArrayHelper;

class UserCheckPermission extends \yii\web\Request {

    public function can($permissions){
        $per = false;
        if(is_array($permissions)){
            foreach($permissions as $permission){
                $per .= \Yii::$app->user->can($permission);
            }
        }else{
            $per = \Yii::$app->user->can($permissions);
        }

        return $per;
    }

    public static function userCan($permissions)
    {
        return self::can($permissions);
    }
    
    public static function getRedirect()
    {
    	$userRoles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
    	$userGroup = Yii::$app->user->identity->group_id;
    	$userCluster = Yii::$app->user->identity->cluster_id;
    	
    	if($userGroup=='Admin' && $userCluster=='MASTER'){
    		if(Yii::$app->params['cluster_name']=='YMO'){
	    		return [
	    			'fileMenu' => 'manager/web/site',	
	    			'urlMenu' => 'manager/web/site',
	    		];
    		}else if(Yii::$app->params['cluster_name']=='YMC'){
	    		return [
	    			'fileMenu' => 'backoffice/modules/site',	
	    			'urlMenu' => 'backoffice/web/site',
	    		];
    		}
    	}else{
    	
	    	if(self::userCan(array_keys($userRoles))){
	    	
		    	foreach ($userRoles as $role)
		    	{
		    		$redirect = Role::find($role->name)->redirect;
		    
		    		if($redirect!=null){
			    		return [
			    			'fileMenu' => $redirect,	
			    			'urlMenu' => $redirect,
			    		];
		    		}
		    	}
	    	
	    	}else{
	    		return [
	    			'fileMenu' => 'site',	
	    			'urlMenu' => 'site',
	    		];	
	    	}
    	}
    }
    
    public static function redirectUser()
    {
    	$urlMenu = self::getRedirect();
    	return Yii::$app->controller->redirect('/'.$urlMenu['urlMenu']);
    }
}