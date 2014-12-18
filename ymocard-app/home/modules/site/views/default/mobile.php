<?php

use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
BootstrapAsset::register($this);

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
        <title><?= Html::encode(\Yii::$app->name) ?></title>
        <?php $this->head() ?>
        <!-- Javascript -->
        <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
        <script type='text/javascript' src="<?php echo \Yii::$app->view->theme->baseUrl ?>/js/css3-mediaqueries.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->
    </head>

    <style>
        /* Extra small devices (phones, less than 768px) */
        /* No media query since this is the default in Bootstrap */

        /* Small devices (tablets, 768px and down) */
        @media (max-width: 768px) {
            .container{
                width: 100%;
                height: 200px;
                outline: 1px solid #9973c2;
            }
        }

        /* Small devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            .container{
                width: 768px;
                height: 200px;
                outline: 1px solid #f00;
            }
        }

        /* Medium devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            .container{
                width: 992px;
                height: 200px;
                outline: 1px solid #000;
            }
        }

        /* Large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .container{
                width: 1200px;
                height: 200px;
                outline: 1px solid #00CC00;
            }
        }
    </style>

    <body>

    <?php $this->beginBody() ?>


        <div class="container">

        </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>