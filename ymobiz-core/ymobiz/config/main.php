<?php

return [
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor',
    'extensions' => require(dirname(dirname(dirname(__DIR__))) . '/ymobiz-framework/yii2/vendor/yiisoft/extensions.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'security' => [
            'class' => 'ymobiz\core\Security',
            //'cryptBlockSize' => 32,
            //'cryptKeySize' => 32,
            //'derivationHash' => 'sha256',
            'derivationIterations' => 1000000,
            //'deriveKeyStrategy' => 'pbkdf2', // for PHP version >= 5.5.0
            'passwordHashStrategy' => 'password_hash',
            //'useDeriveKeyUniqueSalt' => true,
            //'secretKeyFile' => '@runtime/keys.json'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'db' => 'authdb',
            'defaultRoles' => [
                'site/default/*','debug/*'
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'as access' => 'ymobiz\modules\mcms\components\AccessControl',
];
