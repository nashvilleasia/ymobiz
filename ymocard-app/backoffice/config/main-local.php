<?php

$config = [];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'=>'yii\debug\Module',
        'allowedIPs'=>['127.0.0.1', '::1', '192.168.254.1']
    ];
	$config['modules']['gii'] = [
		'class' => 'ymobiz\gii\ymobiz\Module',
		'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.254.1'],	 
		'generators' => [ //here
			'crud' => [ //name generator
				'class' => 'ymobiz\gii\ymobiz\generators\crud\Generator', //class generator
				'templates' => [ //setting for out templates
					'ymobizCrud' => '@ymobiz/gii/ymobiz/generators/crud/default',
				]
			],
			'controller' => [ //name generator
				'class' => 'ymobiz\gii\ymobiz\generators\controller\Generator', //class generator
				'templates' => [ //setting for out templates
					'ymobizController' => '@ymobiz/gii/ymobiz/generators/controller/default',
				]
			],
			'extension' => [ //name generator
				'class' => 'ymobiz\gii\ymobiz\generators\extension\Generator', //class generator
				'templates' => [ //setting for out templates
					'ymobizExtension' => '@ymobiz/gii/ymobiz/generators/extension/default',
				]
			],
			'form' => [ //name generator
				'class' => 'ymobiz\gii\ymobiz\generators\form\Generator', //class generator
				'templates' => [ //setting for out templates
					'ymobizForm' => '@ymobiz/gii/ymobiz/generators/form/default',
				]
			],
			'model' => [ //name generator
				'class' => 'ymobiz\gii\ymobiz\generators\model\Generator', //class generator
				'templates' => [ //setting for out templates
					'ymobizModel' => '@ymobiz/gii/ymobiz/generators/model/default',
				]
			],
			'module' => [ //name generator
				'class' => 'ymobiz\gii\ymobiz\generators\module\Generator', //class generator
				'templates' => [ //setting for out templates
					'ymobizModule' => '@ymobiz/gii/ymobiz/generators/module/default',
				]
			],
		],
	];
}

return $config;