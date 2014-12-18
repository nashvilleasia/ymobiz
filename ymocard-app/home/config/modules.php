<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/16/14
 * Time: 2:51 PM
 */

return [
    /*Ymocard Dev Module*/
    'dev' => [
        'class' => 'home\modules\dev\Module',
    ],
    /*Ymocard Home Module*/
    'site' => [
        'class' => 'home\modules\site\Module',
    ],

    /*Ymocard Admin Module*/
    'supervisor' => [
        'class' => 'home\modules\admin\modules\supervisor\Module',
    ],

    /*Ymocard Card Holder Module*/
    'card-holder' => [
        'class' => 'home\modules\cardholder\Module',
    ],

    /*Ymocard Partner Module and Sub-Modules*/
    'partner-account' => [
        'class' => 'home\modules\partner\modules\account\Module',
    ],
    'partner-seller' => [
        'class' => 'home\modules\partner\modules\seller\Module',
    ],
    'partner-supervisor' => [
        'class' => 'home\modules\partner\modules\supervisor\Module',
    ],

    /*Ymocard Staff Modules*/
    'staff-call' => [
        'class' => 'home\modules\staff\modules\call\Module',
    ],
    'staff-compliance' => [
        'class' => 'home\modules\staff\modules\compliance\Module',
    ],
    'staff-emission' => [
        'class' => 'home\modules\staff\modules\emission\Module',
    ],
    'staff-treasury' => [
        'class' => 'home\modules\staff\modules\treasury\Module',
    ],
    'markdown' => [
        'class' => 'kartik\markdown\Module',
        'previewAction' => '/markdown/parse/preview',
        'customConversion' => [
            '<table>' => '<table class="table table-bordered table-striped">'
        ],
        'smartyPants' => true
    ]
];