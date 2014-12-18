<ul class="list-inline ymo-nav-right">
    <li class="active">
        <a class="ymo-icon-statistics" href="/backoffice">
            <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','statistics') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-client" href="/backoffice/ymobiz-user">
            <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','users') ?>
        </a>
    </li>
    <li>
        <a class="ymo-icon-contact" href="/backoffice/ymobiz-messages">
            <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','messages') ?>
        </a>
    </li>
</ul>
