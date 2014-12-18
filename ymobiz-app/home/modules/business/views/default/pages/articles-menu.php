<ul class="ymo-menu-edit list-inline ymo-nav-right">
    <li class="active">
        <a href="<?php echo \Yii::$app->urlManager->createUrl('business/operation-articles') ?>">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','info') ?>
        </a>
    </li>
    <li>
        <a href="<?php echo \Yii::$app->urlManager->createUrl('business/articles-image') ?>">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','image') ?>
        </a>
    </li>
    <li>
        <a href="<?php echo \Yii::$app->urlManager->createUrl('business/articles-promotions') ?>">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','promotions') ?>
        </a>
    </li>
    <li>
        <a href="<?php echo \Yii::$app->urlManager->createUrl('business/articles-preview') ?>">
        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','preview') ?>
        </a>
    </li>
</ul>

<hr/>