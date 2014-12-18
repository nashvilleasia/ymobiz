<ul class="list-inline ymo-nav-right">
    <li class="active">
        <a class="ymo-icon-receivables active" href="/business/finance-receivables">
         	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','receivables') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-payables" href="/business/finance-payables">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','payables') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-payables" href="/business/finance-expenses">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','expenses') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-general-ledger" href="/business/finance-general">
         	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','general ledger') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-accounts" href="/business/finance-accounts">
            <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','accounts') ?>
        </a>
    </li>
</ul>
