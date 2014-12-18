<?php

use yii\helpers\Html;
use home\assets\AppAsset;
use ymobiz\components\ymoTools;
use yii\helpers\Inflector;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);

$module_name = str_replace('home\\modules\\', '', Yii::$app->controller->module->className());
$module_id = str_replace('\\Module', '', $module_name);

if (Yii::$app->controller->module->id=='site'){
	$this->title =  Yii::$app->name . ' ' . Yii::$app->getModule('site')->ymoTranslate->t('site','form','Home');
}else{
	if(Yii::$app->requestedAction->id=='index'){
		$pageTitle = Inflector::camel2words(Yii::$app->controller->module->id);
	}else{
		$pageTitle = Inflector::camel2words(Yii::$app->controller->module->id) . '/' . Inflector::camel2words(Yii::$app->requestedAction->id);
	}

	$this->title = Yii::$app->getModule('site')->ymoTranslate->t(str_replace('\\', '/', $module_id),'form',$pageTitle . ' - ' . Yii::$app->name); 	
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="Rayane do Vale" content="rayanedovale@outlook.com">
        <link rel="shortcut icon" href="<?php echo \Yii::$app->view->theme->baseUrl ?>/favicon.ico">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?= Html::csrfMetaTags() ?>
        <!-- Javascript -->
        <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
        <script type='text/javascript' src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('css3-mediaqueries.js','js') ?>"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->
    </head>
    
	<?php echo ymoTools::preloadModal([
		['id'=>'email-check','size'=>'sm'],
		['id'=>'newsletter','size'=>'sm'],
		['id'=>'email-check','size'=>'sm'],
		['id'=>'help','size'=>'lg'],
        ['id'=>'faqs'],
		['id'=>'pricing'],
		['id'=>'terms'],
		['id'=>'contact-us'],
		['id'=>'password-recovery'],
		['id'=>'newsletter','size'=>'sm'],
	]);
	?>

    <body class="ymo-bg">

    <div class="ymo-json-response"></div>
    
    <?php $this->beginBody() ?>

    <?= $content ?>

    <script>
        var _baseUrl = '<?php echo \Yii::$app->urlManager->createAbsoluteUrl('') ?>';
    </script>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>