<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/16/14
 * Time: 2:44 PM
 */

return [
    'log' => [
        'targets' => [
            'file' => [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'errorHandler' => [
        'errorAction' => 'site/default/error',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            /*Ymocard Rules for Home Modules*/
            'site/<action:[\w\-]+>' => 'site/default/<action>',
            'site/<action:[\w\-]+>/index' => 'site/default/<action>',
        		
            /*Ymocard Rules for Network Modules*/
            'network/<action:[\w\-]+>' => 'network/default/<action>',
            'network/<action:[\w\-]+>/index' => 'network/default/<action>',
        		
            /*Ymocard Rules for Business Modules*/
            'business/<action:[\w\-]+>' => 'business/default/<action>',
            'business/<action:[\w\-]+>/index' => 'business/default/<action>',
        		
            /*Ymocard Rules for Marketing Modules*/
            'marketing/<action:[\w\-]+>' => 'marketing/default/<action>',
            'marketing/<action:[\w\-]+>/index' => 'marketing/default/<action>',
        		
            /*Ymocard Rules for Settings Modules*/
            'settings/<action:[\w\-]+>' => 'settings/default/<action>',
            'settings/<action:[\w\-]+>/index' => 'settings/default/<action>',
        		
            /*Ymocard Rules for Backoffice Modules*/
            'backoffice/<action:[\w\-]+>' => 'backoffice/default/<action>',
            'backoffice/<action:[\w\-]+>/index' => 'backoffice/default/<action>',
            
            '<controller:[\w\-]+>/popups' => '<controller>/popups',
            '<controller:[\w\-]+>/popups/<source:[\w\-]+>' => '<controller>/popups',
            '<controller:[\w\-]+>/popups' => '<controller>/default/popups',
            '<controller:[\w\-]+>/popups/<source:[\w\-]+>' => '<controller>/default/popups',
            
            '<controller:[\w\-]+>/non-popups' => '<controller>/non-popups',
            '<controller:[\w\-]+>/non-popups/<source:[\w\-]+>' => '<controller>/non-popups',
            '<controller:[\w\-]+>/non-popups' => '<controller>/default/non-popups',
            '<controller:[\w\-]+>/non-popups/<source:[\w\-]+>' => '<controller>/default/non-popups',
        ],
    ],
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'ymoauth' => [
                'class' => 'common\authclient\YmoAuth'
            ],
        ],
    ],
    'request'=>[
        'class' => 'ymobiz\components\Request',
        'web'=> '/home/web',
    	'cookieValidationKey' => '&234kjltkjetlkrjetlkerjtl25#&¨¨¨&%¨&%$353lkjerlktj',
    ],
    'view' => [
        'theme' => [
            'pathMap' => ['@app/views' => THEME_PATH],
            'baseUrl' => THEME_URL,
        ],
    ],
];