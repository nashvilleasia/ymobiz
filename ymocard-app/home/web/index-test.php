<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    die('You are not allowed to access this file.');
}

/*Constants for Dev*/
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

/*Global Framework*/
require(dirname(dirname(dirname(__DIR__))) . '/framework/vendor/autoload.php');
require(dirname(dirname(dirname(__DIR__))) . '/framework/vendor/yiisoft/yii2/Yii.php');

/*Global Aliases*/
require(dirname(dirname(dirname(__DIR__))) . '/framework/ymobiz/config/aliases.php');

/*Ymocard Aliases*/
require(dirname(dirname(__DIR__)) . '/common/config/aliases.php');

$config = require(dirname(__DIR__) . '/console/tests/acceptance/_config.php');

(new yii\web\Application($config))->run();
