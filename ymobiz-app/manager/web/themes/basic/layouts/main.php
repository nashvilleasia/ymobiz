<?php
use manager\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use mcms\isloading\Isloading;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
</head>
<body>

    <div class="ymo-json-response"></div>
    <div id="ajax-msg"></div>
    
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        
            NavBar::begin([
                'brandLabel' => Yii::t('app',Yii::$app->name),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site']],
            	['label' => 'Security',
            		'items' => [
            			['label' => 'Manager Users', 'url' => ['/manager-users']],
            			'<li class="divider"></li>',
            		],
            	],           
            	['label' => 'Common','url' => ['/common'],
            		/*'items' => [
            			['label' => 'Contents', 'url' => ['/common']],
            			['label' => 'Languages', 'url' => ['/common/languages']],
            			['label' => 'Cards', 'url' => ['/common/cards']],
            			['label' => 'Orders', 'url' => ['/common/orders']],
            			'<li class="divider"></li>',
            		],*/
            	],  
                ['label' => 'Gii Tools', 'url' => ['/gii']],     
                ['label' => 'Ymobiz Home', 'url' => ['../../../'],'linkOptions' => ['target'=>'_blank']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login-form']];
            } else {
                $menuItems[] = '<li>'.\ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
                	'target' => 'ymo-json-response',
	            	'id' => 'user-logout',
	            	'buttonClass' => false,	
	            	'button' => 'a',
	            	'buttonOptions' => [
	            		'href' => 'javascript:;',
	            		'style' => 'cursor: pointer;'		
	            	],	
	            	'name' => Yii::$app->getModule('site')->ymoTranslate->t('site','form','logout').' (' . Yii::$app->user->identity->username . ')',
	            	'pluginOptions' => [
	            		'url' => '/manager/web/site/logout',
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
	            ]).'</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
