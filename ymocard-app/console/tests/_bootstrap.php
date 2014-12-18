<?php

// the entry script URL (without host info) for functional and acceptance tests
// PLEASE ADJUST IT TO THE ACTUAL ENTRY SCRIPT URL
defined('TEST_ENTRY_URL') or define('TEST_ENTRY_URL', '/index-test.php');

// the entry script file path for functional and acceptance tests
defined('TEST_ENTRY_FILE') or define('TEST_ENTRY_FILE', dirname(__DIR__) . '/index-test.php');

defined('YII_DEBUG') or define('YII_DEBUG', true);

defined('YII_ENV') or define('YII_ENV', 'test');

/*Global Framework*/
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/autoload.php');
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/yiisoft/yii2/Yii.php');

/*Global Aliases*/
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz/config/bootstrap.php');

/*Ymocard Aliases*/
require(dirname(dirname(__DIR__)) . '/common/config/bootstrap.php');

// set correct script paths
$_SERVER['SCRIPT_FILENAME'] = TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = TEST_ENTRY_URL;
$_SERVER['SERVER_NAME'] = 'localhost';
