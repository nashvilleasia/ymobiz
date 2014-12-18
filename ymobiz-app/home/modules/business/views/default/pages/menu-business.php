<!--ymo-menu-business-->
<li class="active">
	<a href="<?php echo \Yii::$app->urlManager->createUrl('business/reports-balance-sheet') ?>" class="ymo-menu-reports">
		<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','reports') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('business/finance-receivables') ?>" class="ymo-menu-finance">
		<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','finance') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('business/') ?>" class="ymo-menu-operation">
		<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','operation') ?>
	</a>
</li>
<li class="ymo-dropdown-menu">
	<a href="#" class="dropdown-toggle ymo-menu-business" data-toggle="dropdown">
		<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','business') ?>
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu" role="menu">
    	<h6><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select module') ?></h6>
        <hr>
        <li>
            <a class="ymo-submenu-home  active" href="/site/main-menu">
                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','main') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-network" href="/network">
                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','network') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-marketing" href="/marketing">
                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','marketing') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-business" href="/business">
                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','business') ?>
            </a>
        </li>
    </ul>
</li>
<!--ymo-menu-business-->