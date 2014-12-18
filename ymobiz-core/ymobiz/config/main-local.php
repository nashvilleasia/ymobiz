<?php

return [
    'components' => [
        'authdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:3309;dbname=ymodb_auth',
            'username' => 'root',
            'password' => 'camello',
            'charset' => 'utf8',
            'tablePrefix' => 'ymo_',
        ],
        'commondb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:3309;dbname=ymodb_common',
            'username' => 'root',
            'password' => 'camello',
            'charset' => 'utf8',
            'tablePrefix' => 'ymo_',
        ],
    ],
];
