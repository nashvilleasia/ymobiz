<?php

return (object) [
    'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost:3309;dbname=ymodb_ymocard',
        'username' => 'root',
        'password' => 'camello',
        'charset' => 'utf8',
        'tablePrefix' => 'ymo_',
    ],
];