<?php

use ymobiz\components\ymoTools;
use mcms\isloading\Isloading;

echo ymoTools::preloadModal([
    ['id'=>'login-modal','module' => 'site','size'=>'sm'],
    ['id'=>'login','module' => 'site','size'=>'sm'],
]);

?>

<div id="top" class="col-md-12 ymo-header-home ymo-nopadding"> 
	<div class="container ymo-container ymo-nopadding">
		<div class="col-md-3 ymo-logo ymo-nopadding">
			<a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('/site') ?>">
				<img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('logo.png','img')?>" alt="..." class="img-responsive">
			</a>
		</div>
	
	    <ul class="col-md-8 col-md-offset-1 ymo-nav list-inline ymo-nopadding">
	        <li>
	            <h4>contact us</h4>
	        </li>
	        <?php if (!Yii::$app->user->isGuest){?>
	        <li>
	        	<?php 
	            
	            echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
	            	'id' => 'user-logout',
	            	'button' => 'a',
	            	'buttonOptions' => [
	            		'href' => '#',	
	            		'style' => 'cursor: pointer;'
	            	],
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
	        </li>
	        <li>
	            <a href="/site/main-menu"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','main menu')?></a>
	        </li>
	        <?php }else{?>
	        <li>
	            <a href="#" data-action="login-modal" data-size="lg"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','login')?></a>
	        </li>
	        <?php }?>
	    </ul>
	    <h1>+1 302 319 9815</h1>
	    <hr />
	</div>
</div>