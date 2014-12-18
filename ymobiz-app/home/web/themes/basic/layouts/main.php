<?php
use yii\helpers\Html;
use home\assets\AppAsset;
use home\assets\HomeAsset;
use ymobiz\components\ymoLangManager;
use ymobiz\components\ymoTools;
use home\assets\NetworkAsset;
use home\assets\MarketingAsset;
use home\assets\BusinessAsset;
use home\assets\SettingsAsset;
use home\assets\BackofficeAsset;
/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
HomeAsset::register($this);
NetworkAsset::register($this);
MarketingAsset::register($this);
BusinessAsset::register($this);
SettingsAsset::register($this);
BackofficeAsset::register($this);

if(\Yii::$app->request->get('lang'))
	ymoLangManager::setLang();

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
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- Javascript -->
        <script type='text/javascript' src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('modernizr.min.js','js') ?>"></script>
        <script type='text/javascript' src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('css3-mediaqueries.js','js') ?>"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->
    </head>
    
	<?php echo ymoTools::preloadModal([
		['id'=>'register'],
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

	<div class="modal fade" id="popup-alert" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm" id="modal-dialog">
			<div class="modal-content ymo-popup">
				<div class="popup-dialog ">
					<div class="bs-modal-sm ymo-popup">
						<div class="modal-content"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

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