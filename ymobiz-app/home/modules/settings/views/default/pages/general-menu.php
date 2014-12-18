<ul class="list-inline ymo-nav-right">
    <li class="active">
        <a class="ymo-icon-personal active" href="/settings">
            <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','personal') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-company" href="/settings/company">
            <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','company') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-notifications" href="/settings/notifications">
            <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','notifications') ?>
        </a>
    </li>
</ul>
