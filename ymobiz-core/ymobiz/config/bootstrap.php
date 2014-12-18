<?php

/*Aliases from Resources*/
Yii::setAlias('ymobiz', dirname(__DIR__));

/*Plugins Core Ymobiz*/
Yii::setAlias('ymoext', '@ymobiz/extensions/ymoext');
Yii::setAlias('ymoassets', '@ymobiz/assets');

/*Plugins marciocamello*/
Yii::setAlias('mcms', '@ymobiz/extensions/libs/marciocamello');
Yii::setAlias('mcms/ajaxform', '@mcms/yii2-mcms-ajax-form');
Yii::setAlias('mcms/maskmoney', '@mcms/yii2-mcms-maskmoney');
Yii::setAlias('mcms/nested', '@mcms/yii2-mcms-nested');
Yii::setAlias('mcms/xeditable', '@mcms/yii2-x-editable');
Yii::setAlias('mcms/isloading', '@mcms/yii2-isloading');
Yii::setAlias('mcms/bootstrapwizard', '@mcms/yii2-twb-wizard');
Yii::setAlias('mcms/bootstrapwizardassets', '@mcms/yii2-twb-wizard/assets');

Yii::setAlias('ymocardapp',dirname(dirname(dirname(__DIR__))) . '\ymocard-app');
Yii::setAlias('ymobizapp',dirname(dirname(dirname(__DIR__))) . '\ymobiz-app');
Yii::setAlias('ymobizcore',dirname(dirname(dirname(__DIR__))) . '\ymobiz-core');
Yii::setAlias('ymobizframework',dirname(dirname(dirname(__DIR__))) . '\ymobiz-framework');
