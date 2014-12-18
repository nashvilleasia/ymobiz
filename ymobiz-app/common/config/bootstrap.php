<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('home', dirname(dirname(__DIR__)) . '/home');
Yii::setAlias('manager', dirname(dirname(__DIR__)) . '/manager');

/*Aliases from Home Modules*/
Yii::setAlias('site', dirname(dirname(__DIR__)) . '/home/modules/site');
Yii::setAlias('site-views', dirname(dirname(__DIR__)) . '/home/modules/site/views/default');
Yii::setAlias('site-popups', dirname(dirname(__DIR__)) . '/home/modules/site/views/default/popups');
Yii::setAlias('site-pages', dirname(dirname(__DIR__)) . '/home/modules/site/views/default/pages');

/*Aliases from Upload Files*/
Yii::setAlias('upload', dirname(dirname(__DIR__)) . '/home/web/upload');

/*Console tests*/
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');