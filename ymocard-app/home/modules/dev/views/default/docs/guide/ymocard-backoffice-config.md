[Back](/docs?page=ymocard-structure.md)


Ymocard Structure\Backoffice\Config
============================

```
backoffice
    config
        .gitignore
        main.php
        main-local.php
        params.php
        params-local.php
```

Introduction
------------

Check docs from config application to Yii 2.

Not change default settings, any modifications has make with team, and if necessary.

Config - main
-------------

```php

define('THEME_ID','basic');
define('THEME_PATH','@webroot/themes/'.THEME_ID);
define('THEME_URL','@web/themes/'.THEME_ID);

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'ymocard-backoffice',
    'name' => 'Ymocard Backoffice',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backoffice\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'site' => [
            'class' => 'backoffice\modules\site\Module',
        ],
        'mcms' => [
            'class' => 'backoffice\modules\mcms\Module',
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            'downloadAction' => '../gridview/export/download',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ]
        ]
    ],
    'components' => [
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
            'class' => 'common\components\Request',
            'web'=> '/backoffice/web',
            'adminUrl' => '/backoffice',
            'enableCsrfValidation' => false
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'site/<action:[\w\-]+>' => 'site/default/<action>',
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
    ],
    'params' => $params,
];

```

Config - main-local
-------------------

```

$config = [];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'=>'yii\debug\Module',
        'allowedIPs'=>['127.0.0.1', '::1', '192.168.254.1']
    ];
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.254.1'],
    ];
}

return $config;

```

Config - params
--------------

```
return [
    'adminEmail' => 'admin@example.com',
];
```

Config - params-local
--------------

```
return [
];
```