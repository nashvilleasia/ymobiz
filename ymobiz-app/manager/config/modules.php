<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/16/14
 * Time: 2:51 PM
 */

return [
    /*Ymobiz Home Module*/
    'site' => [
        'class' => 'manager\modules\site\Module',
    ],
    'manager-users' => [
        'class' => 'ymobiz\modules\mcms\Module',
        'allowActions' => [
            'admin/*',
        ]
    ],
	'common' => [
		'class' => 'ymobiz\modules\common\Module',
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
];