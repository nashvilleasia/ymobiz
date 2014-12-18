<?php

/*Aliases from Applications*/
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('home', dirname(dirname(__DIR__)) . '/home');
Yii::setAlias('backoffice', dirname(dirname(__DIR__)) . '/backoffice');

/*Common popups*/
Yii::setAlias('popups', dirname(dirname(__DIR__)) . '/common/views/popups');

/*Aliases from Home Modules*/
Yii::setAlias('site', dirname(dirname(__DIR__)) . '/home/modules/site');
Yii::setAlias('site-views', dirname(dirname(__DIR__)) . '/home/modules/site/views/default');
Yii::setAlias('site-popups', dirname(dirname(__DIR__)) . '/home/modules/site/views/default/popups');
Yii::setAlias('site-pages', dirname(dirname(__DIR__)) . '/home/modules/site/views/default/pages');

Yii::setAlias('card-holder', dirname(dirname(__DIR__)) . '/home/modules/cardholder');
Yii::setAlias('card-holder-views', dirname(dirname(__DIR__)) . '/home/modules/cardholder/views/default');
Yii::setAlias('card-holder-popups', dirname(dirname(__DIR__)) . '/home/modules/cardholder/views/default/popups');
Yii::setAlias('card-holder-pages', dirname(dirname(__DIR__)) . '/home/modules/cardholder/views/default/pages');

Yii::setAlias('partner', dirname(dirname(__DIR__)) . '/home/modules/partner');
Yii::setAlias('partner-views', dirname(dirname(__DIR__)) . '/home/modules/partner/views/default');
Yii::setAlias('partner-popups', dirname(dirname(__DIR__)) . '/home/modules/partner/views/default/popups');
Yii::setAlias('partner-pages', dirname(dirname(__DIR__)) . '/home/modules/partner/views/default/pages');

Yii::setAlias('partner-account', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/account');
Yii::setAlias('partner-account-views', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/account/views/default');
Yii::setAlias('partner-account-popups', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/account/views/default/popups');
Yii::setAlias('partner-account-pages', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/account/views/default/pages');

Yii::setAlias('partner-seller', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/seller');
Yii::setAlias('partner-seller-views', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/seller/views/default');
Yii::setAlias('partner-seller-popups', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/seller/views/default/popups');
Yii::setAlias('partner-seller-pages', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/seller/views/default/pages');

Yii::setAlias('partner-supervisor', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/supervisor');
Yii::setAlias('partner-supervisor-views', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/supervisor/views/default');
Yii::setAlias('partner-supervisor-popups', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/supervisor/views/default/popups');
Yii::setAlias('partner-supervisor-pages', dirname(dirname(__DIR__)) . '/home/modules/partner/modules/supervisor/views/default/pages');

Yii::setAlias('staff', dirname(dirname(__DIR__)) . '/home/modules/staff');
Yii::setAlias('staff-views', dirname(dirname(__DIR__)) . '/home/modules/staff/views/default');
Yii::setAlias('staff-popups', dirname(dirname(__DIR__)) . '/home/modules/staff/views/default/popups');
Yii::setAlias('staff-pages', dirname(dirname(__DIR__)) . '/home/modules/staff/views/default/pages');

Yii::setAlias('staff-call', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/call');
Yii::setAlias('staff-call-views', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/call/views/default');
Yii::setAlias('staff-call-popups', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/call/views/default/popups');
Yii::setAlias('staff-call-pages', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/call/views/default/pages');

Yii::setAlias('staff-compliance', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/compliance');
Yii::setAlias('staff-compliance-views', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/compliance/views/default');
Yii::setAlias('staff-compliance-popups', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/compliance/views/default/popups');
Yii::setAlias('staff-compliance-pages', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/compliance/views/default/pages');

Yii::setAlias('staff-emission', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/emission');
Yii::setAlias('staff-emission-views', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/emission/views/default');
Yii::setAlias('staff-emission-popups', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/emission/views/default/popups');
Yii::setAlias('staff-emission-pages', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/emission/views/default/pages');

Yii::setAlias('staff-treasury', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/treasury');
Yii::setAlias('staff-treasury-views', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/treasury/views/default');
Yii::setAlias('staff-treasury-popups', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/treasury/views/default/popups');
Yii::setAlias('staff-treasury-pages', dirname(dirname(__DIR__)) . '/home/modules/staff/modules/treasury/views/default/pages');

Yii::setAlias('admin', dirname(dirname(__DIR__)) . '/home/modules/admin');

Yii::setAlias('supervisor', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/supervisor');
Yii::setAlias('supervisor-views', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/supervisor/views/default');
Yii::setAlias('supervisor-popups', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/supervisor/views/default/popups');
Yii::setAlias('supervisor-pages', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/supervisor/views/default/pages');

Yii::setAlias('superuser', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/superuser');
Yii::setAlias('superuser-views', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/superuser/views/default');
Yii::setAlias('superuser-popups', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/superuser/views/default/popups');
Yii::setAlias('superuser-pages', dirname(dirname(__DIR__)) . '/home/modules/admin/modules/superuser/views/default/pages');


/*Aliases from Upload Files*/
Yii::setAlias('upload', dirname(dirname(__DIR__)) . '/home/web/upload');

/*Console tests*/
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
