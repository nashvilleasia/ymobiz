<!--ymo-menu-network-->
<li class="active">
	<a href="<?php echo \Yii::$app->urlManager->createUrl('network/profile') ?>" class="ymo-menu-profile">
		<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','profile') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('network/e-store') ?>" class="ymo-menu-estory">
		<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','estore') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('network/') ?>" class="ymo-menu-activity">
		<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','activity') ?>
	</a>
</li>
<li class="ymo-dropdown-menu">
	<a href="#" class="dropdown-toggle ymo-menu-network" data-toggle="dropdown">
		<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','network') ?>
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu" role="menu">
    	<h6><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select module') ?></h6>
        <hr>
        <li>
            <a class="ymo-submenu-home  active" href="/site/main-menu">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','main') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-network" href="/network">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','network') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-marketing" href="/marketing">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','marketing') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-business" href="/business">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','business') ?>
            </a>
        </li>
    </ul>
</li>
<!--ymo-menu-network-->