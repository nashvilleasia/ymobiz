<?php

/*Constants for Dev*/
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

/*Constants for Themes*/
define('THEME_ID','basic');
define('THEME_PATH','@webroot/themes/'.THEME_ID);
define('THEME_URL','@web/themes/'.THEME_ID);

/*Global Framework*/
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/autoload.php');
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/yiisoft/yii2/Yii.php');

/*Global Aliases*/
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz/config/bootstrap.php');

/*Ymocard Aliases*/
require(dirname(dirname(__DIR__)) . '/common/config/bootstrap.php');

/*General Settings*/
$config = yii\helpers\ArrayHelper::merge(

/*Settings for common applications*/
    require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz/config/main.php'),
    require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz/config/main-local.php'),

    /*Settings for ymocard application*/
    require(dirname(__DIR__) . '/config/main.php'),
    require(dirname(__DIR__) . '/config/main-local.php')
);

/*Init Yii Application*/
$application = new yii\web\Application($config);
$application->run();