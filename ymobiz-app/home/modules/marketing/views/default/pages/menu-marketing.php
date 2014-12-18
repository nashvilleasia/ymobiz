<!--ymo-menu-marketing-->
<li class="active">
	<a href="<?php echo \Yii::$app->urlManager->createUrl('marketing/advertising-campaigns') ?>" class="ymo-menu-advertising">
		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','advertising') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('marketing/schedule-calendar') ?>" class="ymo-menu-schedule">
		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','schedule') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('marketing/') ?>" class="ymo-menu-crm">
		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','crm') ?>
	</a>
</li>
<li class="ymo-dropdown-menu">
	<a href="#" class="dropdown-toggle ymo-menu-marketing" data-toggle="dropdown">
		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','marketing') ?>
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu" role="menu">
    	<h6><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select module') ?></h6>
        <hr>
        <li>
            <a class="ymo-submenu-home  active" href="/site/main-menu">
                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','main') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-network" href="/network">
                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','network') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-marketing" href="/marketing">
                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','marketing') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-business" href="/business">
                <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','business') ?>
            </a>
        </li>
    </ul>
</li>
<!--ymo-menu-marketing-->

