<ul class="list-inline ymo-nav-right">
    <li class="active">
        <a class="ymo-icon-cash active" href="/business">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','account') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-invoices" href="/business/operation-invoices">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','invoices') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-articles" href="/business/operation-articles">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','articles') ?>
        </a>
    </li>
	<li>
		<a class="ymo-icon-arrows" href="/business/operation-ymocash">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ymocash') ?>
        </a>
    </li>
</ul>
