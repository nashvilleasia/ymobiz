<?php
/**
 * Yii console bootstrap file.
 *
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

// fcgi doesn't have STDIN and STDOUT defined by default
defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));
defined('STDOUT') or define('STDOUT', fopen('php://stdout', 'w'));

/*Global Framework*/
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/autoload.php');
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/yiisoft/yii2/Yii.php');

/*Global Aliases*/
require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-core/ymobiz/config/bootstrap.php');

/*Ymocard Aliases*/
require(dirname(dirname(__DIR__)) . '/common/config/bootstrap.php');

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');
