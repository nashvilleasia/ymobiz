<?php

$dataBase = require(dirname(dirname(__DIR__)) . '/common/config/db.php');

return [
    'db' => $dataBase->db,
    'session' => [
        //'class' => 'yii\web\DbSession',
		//'db' => 'authdb',
    	//'sessionTable' => 'ymo_session',
        //'name' => '_ymobiz',
        //'id' => '_ymobiz',
        //'savePath' => 'D:\server\yii2\api\ymobiz\common\session',
        'cookieParams' => [
            'path' => '/',
            'domain' => '.ymobiz.dev',
        ]
    ],
    'user' => [
        'identityClass' => 'ymobiz\auth\ymoUser',
        'enableAutoLogin' => true,
    	'loginUrl' => '/',	
        'identityCookie' => [
            'name' => '_ymobiz',
            'domain' => '.ymobiz.dev',
            'path' => '/',
        ]
    ],
	'mail' => [
        'class' => 'yii\swiftmailer\Mailer',
		'useFileTransport' => false,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'ymocard@gmail.com',
            'password' => 'YMO$9876',
            'port' => '465',
            'encryption' => 'ssl',
        ],
	    'messageConfig' => [
        	'from' => 'noreply@domain.com',
	        'charset' => 'UTF-8',
	    ]
    ],
	/*'transport' => [
		'class' => 'Swift_SmtpTransport',
		'constructArgs' => ['localhost', 25],
		'plugins' => [
			[
				'class' => 'Swift_Plugins_ThrottlerPlugin',
				'constructArgs' => [20],
			],
		],
	],*/	
];
