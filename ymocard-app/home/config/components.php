<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/16/14
 * Time: 2:44 PM
 */

return [
    'i18n' => [
        'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                //'basePath' => '@app/messages',
                //'sourceLanguage' => 'en',
                'fileMap' => [
                    'app' => 'app.php',
                    'error' => 'error.php',
                ],
            ],
        ],
    ],
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
    'request'=>[
        'class' => 'ymobiz\components\Request',
        'web'=> '/home/web',
    	'cookieValidationKey' => '&234kjltkjetlkrjetlkerjtl25#&¨¨¨&%¨&%$353lkjerlktj',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
        
            /*Ymocard Rules for Dev Modules*/
            'dev/card/<id:\d+>/page/<page:\d+>'=>'dev/default/grid',
            'dev/card/<id:\d+>'=>'dev/default/grid',

            'dev/grid/search/<search:[\w\-]+>/page/<page:\d+>'=>'dev/default/grid',
            'dev/grid/search/<search:[\w\-]+>'=>'dev/default/grid',
            'dev/grid/page/<page:\d+>'=>'dev/default/grid',

            //'dev/card-dataprovider/<id:\d+>/page/<page:\d+>/perpage/<perpage:\d+>'=>'dev/default/grid-dataprovider',
            'dev/card-dataprovider/<id:\d+>/page/<page:\d+>'=>'dev/default/grid-dataprovider',
            'dev/card-dataprovider/<id:\d+>'=>'dev/default/grid-dataprovider',

            'dev/grid-dataprovider/search/<search:[\w\-]+>/page/<page:\d+>'=>'dev/default/grid-dataprovider',
            'dev/grid-dataprovider/search/<search:[\w\-]+>'=>'dev/default/grid-dataprovider',
            'dev/grid-dataprovider/page/<page:\d+>'=>'dev/default/grid-dataprovider',

            'dev/<action:[\w\-]+>' => 'dev/default/<action>',
            'dev/<action:[\w\-]+>/index' => 'dev/default/<action>',

            /*Ymocard Rules for Home Modules*/
            'site/<action:[\w\-]+>' => 'site/default/<action>',
            'site/<action:[\w\-]+>/index' => 'site/default/<action>',
            //'site/site/captcha'  => 'site/default/captcha',

            /*Ymocard Rules for Admin Modules*/
            'admin/<action:[\w\-]+>' => 'admin/default/<action>',
            'admin/<action:[\w\-]+>/index' => 'admin/default/<action>',
            
            'superuser/<action:[\w\-]+>' => 'superuser/default/<action>',
            'superuser/<action:[\w\-]+>/index' => 'superuser/default/<action>',
            
            /*Ymocard Rules for Supervisor Modules*/
     
             /*Ymocard Rules for Members Modules*/
            'supervisor/call-center/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/call-center',
            'supervisor/call-center/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'supervisor/default/call-center',
            'supervisor/call-center/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/call-center',
            'supervisor/call-center/<cardid:\d+>/search/<search:[\w\-]+>'=>'supervisor/default/call-center',
            'supervisor/call-center/<cardid:\d+>/page/<page:\d+>'=>'supervisor/default/call-center',
            'supervisor/call-center/<cardid:\d+>'=>'supervisor/default/call-center',
            
            'supervisor/call-center/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/call-center',
            'supervisor/call-center/search/<search:[\w\-]+>'=>'supervisor/default/call-center',
            'supervisor/call-center/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/call-center',
            'supervisor/call-center/filter/<filter:[\w\-]+>'=>'supervisor/default/call-center',
            'supervisor/call-center/page/<page:\d+>'=>'supervisor/default/call-center',

        	'supervisor/members/<memberid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/members',
        	'supervisor/members/<memberid:\d+>/filter/<filter:[\w\-]+>'=>'supervisor/default/members',
        	'supervisor/members/<memberid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/members',
        	'supervisor/members/<memberid:\d+>/search/<search:[\w\-]+>'=>'supervisor/default/members',
            'supervisor/members/<memberid:\d+>/page/<page:\d+>'=>'supervisor/default/members',
            'supervisor/members/<memberid:\d+>'=>'supervisor/default/members',
            
            'supervisor/members/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/members',
            'supervisor/members/search/<search:[\w\-]+>'=>'supervisor/default/members',
            'supervisor/members/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/members',
            'supervisor/members/filter/<filter:[\w\-]+>'=>'supervisor/default/members',
            'supervisor/members/page/<page:\d+>'=>'supervisor/default/members',

        	'supervisor/emission/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/emission',
        	'supervisor/emission/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'supervisor/default/emission',
        	'supervisor/emission/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/emission',
        	'supervisor/emission/<cardid:\d+>/search/<search:[\w\-]+>'=>'supervisor/default/emission',
            'supervisor/emission/<cardid:\d+>/page/<page:\d+>'=>'supervisor/default/emission',
            'supervisor/emission/<cardid:\d+>'=>'supervisor/default/emission',
            
            'supervisor/emission/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/emission',
            'supervisor/emission/search/<search:[\w\-]+>'=>'supervisor/default/emission',
            'supervisor/emission/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/emission',
            'supervisor/emission/filter/<filter:[\w\-]+>'=>'supervisor/default/emission',
            'supervisor/emission/page/<page:\d+>'=>'supervisor/default/emission',

        	'supervisor/order-emission/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/order-emission',
        	'supervisor/order-emission/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'supervisor/default/order-emission',
        	'supervisor/order-emission/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/order-emission',
        	'supervisor/order-emission/<cardid:\d+>/search/<search:[\w\-]+>'=>'supervisor/default/order-emission',
            'supervisor/order-emission/<cardid:\d+>/page/<page:\d+>'=>'supervisor/default/order-emission',
            'supervisor/order-emission/<cardid:\d+>'=>'supervisor/default/order-emission',
            
            'supervisor/order-emission/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/order-emission',
            'supervisor/order-emission/search/<search:[\w\-]+>'=>'supervisor/default/order-emission',
            'supervisor/order-emission/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/order-emission',
            'supervisor/order-emission/filter/<filter:[\w\-]+>'=>'supervisor/default/order-emission',
            'supervisor/order-emission/page/<page:\d+>'=>'supervisor/default/order-emission',

        	'supervisor/treasury/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/treasury',
        	'supervisor/treasury/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'supervisor/default/treasury',
        	'supervisor/treasury/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/treasury',
        	'supervisor/treasury/<cardid:\d+>/search/<search:[\w\-]+>'=>'supervisor/default/treasury',
            'supervisor/treasury/<cardid:\d+>/page/<page:\d+>'=>'supervisor/default/treasury',
            'supervisor/treasury/<cardid:\d+>'=>'supervisor/default/treasury',
            
            'supervisor/treasury/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/treasury',
            'supervisor/treasury/search/<search:[\w\-]+>'=>'supervisor/default/treasury',
            'supervisor/treasury/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/treasury',
            'supervisor/treasury/filter/<filter:[\w\-]+>'=>'supervisor/default/treasury',
            'supervisor/treasury/page/<page:\d+>'=>'supervisor/default/treasury',

        	'supervisor/compliance/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/compliance',
        	'supervisor/compliance/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'supervisor/default/compliance',
        	'supervisor/compliance/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/compliance',
        	'supervisor/compliance/<cardid:\d+>/search/<search:[\w\-]+>'=>'supervisor/default/compliance',
            'supervisor/compliance/<cardid:\d+>/page/<page:\d+>'=>'supervisor/default/compliance',
            'supervisor/compliance/<cardid:\d+>'=>'supervisor/default/compliance',
            
            'supervisor/compliance/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/compliance',
            'supervisor/compliance/search/<search:[\w\-]+>'=>'supervisor/default/compliance',
            'supervisor/compliance/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/compliance',
            'supervisor/compliance/filter/<filter:[\w\-]+>'=>'supervisor/default/compliance',
            'supervisor/compliance/page/<page:\d+>'=>'supervisor/default/compliance',
            
            /*Ymocard Rules for Members Modules*/
    
    		/*Ymocard Rules for Cards Supervisor Modules*/
		    'supervisor/card/<cardid:\d+>/page/<page:\d+>'=>'supervisor/default/index',
		    'supervisor/card/<cardid:\d+>'=>'supervisor/default/index',

            'supervisor/search/<search:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/index',
            'supervisor/search/<search:[\w\-]+>'=>'supervisordefault/index',
            'supervisor/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'supervisor/default/index',
            'supervisor/filter/<filter:[\w\-]+>'=>'supervisor/default/index',
            'supervisor/page/<page:\d+>'=>'supervisor/default/index',
            
            'supervisor/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'supervisor/default/view-file',
            
            'supervisor/<action:[\w\-]+>' => 'supervisor/default/<action>',
            'supervisor/<action:[\w\-]+>/index' => 'supervisor/default/<action>',
    		/*Ymocard Rules for Cards Supervisor Modules*/

            /*Ymocard Rules for Card Holder Modules*/
        	'card-holder/card/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'card-holder/default/index',
        	'card-holder/card/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'card-holder/default/index',
        	'card-holder/card/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'card-holder/default/index',
        	'card-holder/card/<cardid:\d+>/search/<search:[\w\-]+>'=>'card-holder/default/index',
            'card-holder/card/<cardid:\d+>/page/<page:\d+>'=>'card-holder/default/index',
            'card-holder/card/<cardid:\d+>'=>'card-holder/default/index',

            'card-holder/search/<search:[\w\-]+>/page/<page:\d+>'=>'card-holder/default/index',
            'card-holder/search/<search:[\w\-]+>'=>'card-holder/default/index',
            'card-holder/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'card-holder/default/index',
            'card-holder/filter/<filter:[\w\-]+>'=>'card-holder/default/index',
            'card-holder/page/<page:\d+>'=>'card-holder/default/index',
            
            'card-holder/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'card-holder/default/view-file',
            
            'card-holder/<action:[\w\-]+>' => 'card-holder/default/<action>',
            'card-holder/<action:[\w\-]+>/index' => 'card-holder/default/<action>',
            /*Ymocard Rules for Card Holder Modules*/

            /*Ymocard Rules for Partner Modules*/
            'partner/<action:[\w\-]+>' => 'partner/default/<action>',
            'partner/<action:[\w\-]+>/index' => 'partner/default/<action>',

            /*Ymocard Rules for Partner Seller Modules*/
        	'partner-account/registered-cards/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-account/default/registered-cards',
        	'partner-account/registered-cards/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'partner-account/default/registered-cards',
        	'partner-account/registered-cards/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-account/default/registered-cards',
        	'partner-account/registered-cards/<cardid:\d+>/search/<search:[\w\-]+>'=>'partner-account/default/registered-cards',
            'partner-account/registered-cards/card/<cardid:\d+>/page/<page:\d+>'=>'partner-account/default/registered-cards',
            'partner-account/registered-cards/card/<cardid:\d+>'=>'partner-account/default/registered-cards',
            
            'partner-account/registered-cards/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-account/default/registered-cards',
            'partner-account/registered-cards/search/<search:[\w\-]+>'=>'partner-account/default/registered-cards',
            'partner-account/registered-cards/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-account/default/registered-cards',
            'partner-account/registered-cards/filter/<filter:[\w\-]+>'=>'partner-account/default/registered-cards',
            'partner-account/registered-cards/page/<page:\d+>'=>'partner-account/default/registered-cards',

        	'partner-account/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'partner-account/default/view-file',
        		
            'partner-account/<action:[\w\-]+>' => 'partner-account/default/<action>',
            'partner-account/<action:[\w\-]+>/index' => 'partner-account/default/<action>',
            /*Ymocard Rules for Partner Seller Modules*/

            /*Ymocard Rules for Partner Seller Modules*/
        	'partner-seller/registered-cards/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/registered-cards',
        	'partner-seller/registered-cards/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'partner-seller/default/registered-cards',
        	'partner-seller/registered-cards/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/registered-cards',
        	'partner-seller/registered-cards/<cardid:\d+>/search/<search:[\w\-]+>'=>'partner-seller/default/registered-cards',
            'partner-seller/registered-cards/card/<cardid:\d+>/page/<page:\d+>'=>'partner-seller/default/registered-cards',
            'partner-seller/registered-cards/card/<cardid:\d+>'=>'partner-seller/default/registered-cards',
            
            'partner-seller/registered-cards/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/registered-cards',
            'partner-seller/registered-cards/search/<search:[\w\-]+>'=>'partner-seller/default/registered-cards',
            'partner-seller/registered-cards/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/registered-cards',
            'partner-seller/registered-cards/filter/<filter:[\w\-]+>'=>'partner-seller/default/registered-cards',
            'partner-seller/registered-cards/page/<page:\d+>'=>'partner-seller/default/registered-cards',
        		
        	'partner-seller/order-payment/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/order-payment',
        	'partner-seller/order-payment/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'partner-seller/default/order-payment',
        	'partner-seller/order-payment/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/order-payment',
        	'partner-seller/order-payment/<cardid:\d+>/search/<search:[\w\-]+>'=>'partner-seller/default/order-payment',
            'partner-seller/order-payment/card/<cardid:\d+>/page/<page:\d+>'=>'partner-seller/default/order-payment',
            'partner-seller/order-payment/card/<cardid:\d+>'=>'partner-seller/default/order-payment',
            
            'partner-seller/order-payment/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/order-payment',
            'partner-seller/order-payment/search/<search:[\w\-]+>'=>'partner-seller/default/order-payment',
            'partner-seller/order-payment/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-seller/default/order-payment',
            'partner-seller/order-payment/filter/<filter:[\w\-]+>'=>'partner-seller/default/order-payment',
            'partner-seller/order-payment/page/<page:\d+>'=>'partner-seller/default/order-payment',
        		
            'partner-seller/order-card/user/<userid:\d+>/page/<page:\d+>'=>'partner-seller/default/order-card',
            'partner-seller/order-card/user/<userid:\d+>'=>'partner-seller/default/order-card',
            
            'partner-seller/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'partner-seller/default/view-file',
        		
            'partner-seller/<action:[\w\-]+>' => 'partner-seller/default/<action>',
            'partner-seller/<action:[\w\-]+>/index' => 'partner-seller/default/<action>',
            /*Ymocard Rules for Partner Seller Modules*/
            
            /*Ymocard Rules for Partner Supervisor Modules*/
        	'partner-supervisor/registered-cards/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/registered-cards',
        	'partner-supervisor/registered-cards/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'partner-supervisor/default/registered-cards',
        	'partner-supervisor/registered-cards/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/registered-cards',
        	'partner-supervisor/registered-cards/<cardid:\d+>/search/<search:[\w\-]+>'=>'partner-supervisor/default/registered-cards',
            'partner-supervisor/registered-cards/card/<cardid:\d+>/page/<page:\d+>'=>'partner-supervisor/default/registered-cards',
            'partner-supervisor/registered-cards/card/<cardid:\d+>'=>'partner-supervisor/default/registered-cards',
            
            'partner-supervisor/registered-cards/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/registered-cards',
            'partner-supervisor/registered-cards/search/<search:[\w\-]+>'=>'partner-supervisor/default/registered-cards',
            'partner-supervisor/registered-cards/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/registered-cards',
            'partner-supervisor/registered-cards/filter/<filter:[\w\-]+>'=>'partner-supervisor/default/registered-cards',
            'partner-supervisor/registered-cards/page/<page:\d+>'=>'partner-supervisor/default/registered-cards',
        		
        	'partner-supervisor/order-payment/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/order-payment',
        	'partner-supervisor/order-payment/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'partner-supervisor/default/order-payment',
        	'partner-supervisor/order-payment/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/order-payment',
        	'partner-supervisor/order-payment/<cardid:\d+>/search/<search:[\w\-]+>'=>'partner-supervisor/default/order-payment',
            'partner-supervisor/order-payment/card/<cardid:\d+>/page/<page:\d+>'=>'partner-supervisor/default/order-payment',
            'partner-supervisor/order-payment/card/<cardid:\d+>'=>'partner-supervisor/default/order-payment',
            
            'partner-supervisor/order-payment/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/order-payment',
            'partner-supervisor/order-payment/search/<search:[\w\-]+>'=>'partner-supervisor/default/order-payment',
            'partner-supervisor/order-payment/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/order-payment',
            'partner-supervisor/order-payment/filter/<filter:[\w\-]+>'=>'partner-supervisor/default/order-payment',
            'partner-supervisor/order-payment/page/<page:\d+>'=>'partner-supervisor/default/order-payment',
        		
            'partner-supervisor/order-card/user/<userid:\d+>/page/<page:\d+>'=>'partner-supervisor/default/order-card',
            'partner-supervisor/order-card/user/<userid:\d+>'=>'partner-supervisor/default/order-card',

        	'partner-supervisor/members/<memberid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/members',
        	'partner-supervisor/members/<memberid:\d+>/filter/<filter:[\w\-]+>'=>'partner-supervisor/default/members',
        	'partner-supervisor/members/<memberid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/members',
        	'partner-supervisor/members/<memberid:\d+>/search/<search:[\w\-]+>'=>'partner-supervisor/default/members',
            'partner-supervisor/members/<memberid:\d+>/page/<page:\d+>'=>'partner-supervisor/default/members',
            'partner-supervisor/members/<memberid:\d+>'=>'partner-supervisor/default/members',
            
            'partner-supervisor/members/search/<search:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/members',
            'partner-supervisor/members/search/<search:[\w\-]+>'=>'partner-supervisor/default/members',
            'partner-supervisor/members/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'partner-supervisor/default/members',
            'partner-supervisor/members/filter/<filter:[\w\-]+>'=>'partner-supervisor/default/members',
            'partner-supervisor/members/page/<page:\d+>'=>'partner-supervisor/default/members',
            
            'partner-supervisor/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'partner-supervisor/default/view-file',
            
            'partner-supervisor/<action:[\w\-]+>' => 'partner-supervisor/default/<action>',
            'partner-supervisor/<action:[\w\-]+>/index' => 'partner-supervisor/default/<action>',
        		
            //'partner-supervisor/captcha'  => 'partner-supervisor/default/index',
            /*Ymocard Rules for Partner Supervisor Modules*/
    
            /*Ymocard Rules for Partner Modules*/

            /*Ymocard Rules for Staff Modules*/

            /*Ymocard Rules for Staff Call Modules*/
        	'staff-call/card/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-call/default/index',
        	'staff-call/card/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'staff-call/default/index',
        	'staff-call/card/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-call/default/index',
        	'staff-call/card/<cardid:\d+>/search/<search:[\w\-]+>'=>'staff-call/default/index',
            'staff-call/card/<cardid:\d+>/page/<page:\d+>'=>'staff-call/default/index',
            'staff-call/card/<cardid:\d+>'=>'staff-call/default/index',
            
            'staff-call/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-call/default/index',
            'staff-call/search/<search:[\w\-]+>'=>'staff-call/default/index',
            'staff-call/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-call/default/index',
            'staff-call/filter/<filter:[\w\-]+>'=>'staff-call/default/index',
            'staff-call/page/<page:\d+>'=>'staff-call/default/index',
            
            'staff-call/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'staff-call/default/view-file',
            
            'staff-call/<action:[\w\-]+>' => 'staff-call/default/<action>',
            'staff-call/<action:[\w\-]+>/index' => 'staff-call/default/<action>',
            /*Ymocard Rules for Staff Treasury Modules*/

            /*Ymocard Rules for Staff Compliance Modules*/
        	'staff-compliance/card/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-compliance/default/index',
        	'staff-compliance/card/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'staff-compliance/default/index',
        	'staff-compliance/card/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-compliance/default/index',
        	'staff-compliance/card/<cardid:\d+>/search/<search:[\w\-]+>'=>'staff-compliance/default/index',
            'staff-compliance/card/<cardid:\d+>/page/<page:\d+>'=>'staff-compliance/default/index',
            'staff-compliance/card/<cardid:\d+>'=>'staff-compliance/default/index',
            
            'staff-compliance/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-compliance/default/index',
            'staff-compliance/search/<search:[\w\-]+>'=>'staff-compliance/default/index',
            'staff-compliance/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-compliance/default/index',
            'staff-compliance/filter/<filter:[\w\-]+>'=>'staff-compliance/default/index',
            'staff-compliance/page/<page:\d+>'=>'staff-compliance/default/index',
            
            'staff-compliance/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'staff-compliance/default/view-file',
            
            'staff-compliance/<action:[\w\-]+>' => 'staff-compliance/default/<action>',
            'staff-compliance/<action:[\w\-]+>/index' => 'staff-compliance/default/<action>',
            /*Ymocard Rules for Staff Compliance Modules*/

            /*Ymocard Rules for Staff Emission Modules*/
        	'staff-emission/card/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/index',
        	'staff-emission/card/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'staff-emission/default/index',
        	'staff-emission/card/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/index',
        	'staff-emission/card/<cardid:\d+>/search/<search:[\w\-]+>'=>'staff-emission/default/index',
            'staff-emission/card/<cardid:\d+>/page/<page:\d+>'=>'staff-emission/default/index',
            'staff-emission/card/<cardid:\d+>'=>'staff-emission/default/index',
            
            'staff-emission/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/index',
            'staff-emission/search/<search:[\w\-]+>'=>'staff-emission/default/index',
            'staff-emission/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/index',
            'staff-emission/filter/<filter:[\w\-]+>'=>'staff-emission/default/index',
            'staff-emission/page/<page:\d+>'=>'staff-emission/default/index',
        		
        	'staff-emission/order-emission/card/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/order-emission',
        	'staff-emission/order-emission/card/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'staff-emission/default/order-emission',
        	'staff-emission/order-emission/card/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/order-emission',
        	'staff-emission/order-emission/card/<cardid:\d+>/search/<search:[\w\-]+>'=>'staff-emission/default/order-emission',
            'staff-emission/order-emission/card/<cardid:\d+>/page/<page:\d+>'=>'staff-emission/default/order-emission',
            'staff-emission/order-emission/card/<cardid:\d+>'=>'staff-emission/default/order-emission',
            
            'staff-emission/order-emission/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/order-emission',
            'staff-emission/order-emission/search/<search:[\w\-]+>'=>'staff-emission/default/order-emission',
            'staff-emission/order-emission/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-emission/default/order-emission',
            'staff-emission/order-emission/filter/<filter:[\w\-]+>'=>'staff-emission/default/order-emission',
            'staff-emission/order-emission/page/<page:\d+>'=>'staff-emission/default/order-emission',
            
            'staff-emission/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'staff-emission/default/view-file',
            
            'staff-emission/<action:[\w\-]+>' => 'staff-emission/default/<action>',
            'staff-emission/<action:[\w\-]+>/index' => 'staff-emission/default/<action>',
            /*Ymocard Rules for Staff Emission Modules*/
            
            /*Ymocard Rules for Staff Treasury Modules*/
        	'staff-treasury/card/<cardid:\d+>/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-treasury/default/index',
        	'staff-treasury/card/<cardid:\d+>/filter/<filter:[\w\-]+>'=>'staff-treasury/default/index',
        	'staff-treasury/card/<cardid:\d+>/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-treasury/default/index',
        	'staff-treasury/card/<cardid:\d+>/search/<search:[\w\-]+>'=>'staff-treasury/default/index',
            'staff-treasury/card/<cardid:\d+>/page/<page:\d+>'=>'staff-treasury/default/index',
            'staff-treasury/card/<cardid:\d+>'=>'staff-treasury/default/index',
            
            'staff-treasury/search/<search:[\w\-]+>/page/<page:\d+>'=>'staff-treasury/default/index',
            'staff-treasury/search/<search:[\w\-]+>'=>'staff-treasury/default/index',
            'staff-treasury/filter/<filter:[\w\-]+>/page/<page:\d+>'=>'staff-treasury/default/index',
            'staff-treasury/filter/<filter:[\w\-]+>'=>'staff-treasury/default/index',
            'staff-treasury/page/<page:\d+>'=>'staff-treasury/default/index',
            
            'staff-treasury/view-file/<id:\d+>/<memberid:\d+>/<mode:[\w\-]+>'=>'staff-treasury/default/view-file',

            'staff-treasury/<action:[\w\-]+>' => 'staff-treasury/default/<action>',
            'staff-treasury/<action:[\w\-]+>/index' => 'staff-treasury/default/<action>',
            /*Ymocard Rules for Staff Treasury Modules*/
    
            /*Ymocard Rules for Staff Modules*/

            
            '<controller:[\w\-]+>/popups' => '<controller>/popups',
            '<controller:[\w\-]+>/popups/<source:[\w\-]+>' => '<controller>/popups',
            '<controller:[\w\-]+>/popups' => '<controller>/default/popups',
            '<controller:[\w\-]+>/popups/<source:[\w\-]+>' => '<controller>/default/popups',


            /*'<lang:\?:\w|-+>/<id:\d+>'=>'<controller>/view',
            '<lang:\?:\w|-+>/<controller:\?:\w|-+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            '<lang:\?:\w|-+>/<controller:\?:\w|-+>/<action:\w+>'=>'<controller>/<action>',
            '<lang:([a-z]{2}(?:_[a-z]{2})?)>/<route:[\w\/]+>' => '<route>',
            '<lang:[a-z]{2}>' => '',
            'site/default/captcha'  => 'site/default/captcha',
            '<controller:[\w\-]+>/popups' => '<controller>/popups',
            '<controller:[\w\-]+>/popups/<source:[\w\-]+>' => '<controller>/popups',
            '<_m>/<lang:[a-z]{2}>/<_c>' => '<_m>/<_c>',
            '<_m>/<_c>/<lang:[a-z]{2}>/<_a>*' => '<_m>/<_c>/<_a>',
            '<_m>/<_a>/<lang:[a-z]{2}>' => '<_m>/<_a>',
            '<_c>/<lang:[a-z]{2}>' => '<_c>',
            '<_c>/<_a>/<lang:[a-z]{2}>' => '<_c>/<_a>',
            '<lang:\?:\w|-+>/<id:\d+>'=>'<controller>/view',
            '<lang:\?:\w|-+>/<controller:\?:\w|-+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            '<lang:\?:\w|-+>/<controller:\?:\w|-+>/<action:\w+>'=>'<controller>/<action>',
            '<lang:([a-z]{2}(?:_[a-z]{2})?)>/<route:[\w\/]+>' => '<route>',
            '<lang:[a-z]{2}>' => '',*/
        ],
    ],
    'view' => [
        'theme' => [
            'pathMap' => ['@app/views' => THEME_PATH],
            'baseUrl' => THEME_URL,
        ],
    ],
    'formatter' => [
        'class' => 'yii\i18n\formatter',
        'locale' => 'en-US',
        /*'thousandSeparator' => ',',
        'decimalSeparator' => '.',
	    'dateFormat' => 'dd-MM-yyyy',
	    'datetimeFormat' => 'dd-MM-yyyy hh:mm:ss',
	    'timeFormat' => 'hh:mm:ss',*/
        'currencyCode' => 'USD',
    ]
];