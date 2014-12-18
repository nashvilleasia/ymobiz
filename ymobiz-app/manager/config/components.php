<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/16/14
 * Time: 2:44 PM
 */

return [
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        ],
    ],
    'errorHandler' => [
        'errorAction' => 'site/default/error',
    ],
    'request'=>[
        'class' => 'ymobiz\components\Request',
        'web'=> '/home/web',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            /*Ymocard Rules for Backoffice Modules*/
            'site/<action:[\w\-]+>' => 'site/default/<action>',
            'site/<action:[\w\-]+>/index' => 'site/default/<action>',

            //'mcms/<action:[\w\-]+>' => 'mcms/default/<action>',
            'gii' => 'gii',
            'gii/<controller:\w+>' => 'gii/<controller>',
            'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
        ],
    ],
    'view' => [
        'theme' => [
            'pathMap' => ['@app/views' => THEME_PATH],
            'baseUrl' => THEME_URL,
        ],
    ],
];