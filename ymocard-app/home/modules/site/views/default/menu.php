<?php 

use mcms\isloading\Isloading;
use ymobiz\components\UserCheckPermission;

?>

<div class="col-md-8 col-md-offset-1 ymo-logout ymo-nopadding ymo-Panel">
    <div class="col-md-11 ymo-list-header ymo-nopadding ymo-Panel">
        <ul class="ymo-nopadding">
            <li>
                <p>
                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','welcome,')?> "<?php echo Yii::$app->user->identity->username ?>"
                <p>
            </li>
            <?php 
            	if(UserCheckPermission::userCan(array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)))){
            		echo Yii::$app->getModule('site')->ymoAccessMenu->render();
            	}
            ?>
        </ul>
    </div>
    <div class="col-md-1 ymo-nopadding ymo-Panel"">
        <div class="col-md-12 ymo-nopadding">
            <?php 
            
            echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
            	'id' => 'user-logout',
            	'buttonClass' => 'btn ymo-btn-logout',
            	'name' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','logout'),
            	'pluginOptions' => [
            		'url' => '/site/logout',
		            'dataType' => 'json',
		            'resetForm' => false,
            		'data' => [
            			'logoutConfirm' => 'true',
            		],
            	],
            	'customCallbacks' => [
            		'complete' => new \yii\web\JsExpression("
						 var obj = JSON.parse(event.responseText);
						 if(obj.status === 200){
							".Isloading::widget([
								'id' => 'response-user-logout',
								'pluginOptions' => [
									'text' => Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','Verifying your data, please wait...')
								],	
								'response' => new \yii\web\JsExpression('
									jQuery("#load-modal-logout-success").modal("hide"); 
									jQuery(".ymo-json-response").html(obj.content);  
									$.isLoading("hide");
								')
							])."
						}else if(obj.status === 500){
							jQuery('.ymo-json-response').html(obj.content);;
						}
						return false;
					"),
            	],
            	'events' => [
            		'confirmation' => [
            			'message' => 'Are you sure?',
            			'error' => 'There was an error!',
            		]
            	],
            ]);
            
            ?>
        </div>
    </div>
</div>