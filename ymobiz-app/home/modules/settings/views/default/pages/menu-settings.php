<!--ymo-menu-settings-->
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('settings/settings-business') ?>" class="ymo-menu-business">
		<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','business') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('settings/settings-marketing') ?>" class="ymo-menu-marketing">
		<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','marketing') ?>
	</a>
</li>
<li>
	<a href="<?php echo \Yii::$app->urlManager->createUrl('settings/settings-network') ?>" class="ymo-menu-network">
		<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','network') ?>
	</a>
</li>
<li class="active">
	<a href="<?php echo \Yii::$app->urlManager->createUrl('settings') ?>" class="ymo-menu-general">
		<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','general') ?>
	</a>
</li>
<li class="ymo-dropdown-menu">
	<a href="#" class="dropdown-toggle ymo-menu-settings" data-toggle="dropdown">
		<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','settings') ?>
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu" role="menu">
    	<h6><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','select module') ?></h6>
        <hr>
        <li>
            <a class="ymo-submenu-home  active" href="/site/main-menu">
                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','main') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-network" href="/network">
                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','network') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-marketing" href="/marketing">
                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','marketing') ?>
            </a>
        </li>
        <li>
            <a class="ymo-submenu-business" href="/business">
                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','business') ?>
            </a>
        </li>
    </ul>
</li>
<!--ymo-menu-settings-->


























<!--ymo-menu-business
<li>
    <a href="<?php echo \Yii::$app->urlManager->createUrl('settings/settings-business') ?>" class="ymo-menu-business">
        business
    </a>
</li>-->
<!--ymo-menu-business-->

<!--ymo-menu-marketing
<li>
    <a href="<?php echo \Yii::$app->urlManager->createUrl('settings/settings-marketing') ?>" class="ymo-menu-marketing">
        marketing
    </a>
</li>-->
<!--ymo-menu-marketing-->

<!--ymo-menu-network
<li>
    <a href="<?php echo \Yii::$app->urlManager->createUrl('settings/settings-network') ?>" class="ymo-menu-network">
        network
    </a>
</li>-->
<!--ymo-menu-network-->

<!--ymo-menu-general
<li>
    <a href="<?php echo \Yii::$app->urlManager->createUrl('settings/index') ?>" class="ymo-menu-general">
        general
    </a>
</li>-->
<!--ymo-menu-general-->

<!--ymo-menu-settings
<li>
    <a class="dropdown-toggle ymo-menu-settings" data-toggle="dropdown" href="<?php echo \Yii::$app->urlManager->createUrl('settings/')?>">
        settings <span class="caret"></span>
    </a>
    <ul class="list-unstyled dropdown-menu ymo-sub-menu">
        <h6>select module</h6>
        <hr/>
        <li>
            <a class="ymo-sub-menu-home" href="/site/main-menu">
                main
            </a>
        </li>
        <li>
            <a class="ymo-sub-menu-network" href="/network">
                network
            </a>
        </li>
        <li>
            <a class="ymo-sub-menu-marketing" href="/marketing">
                marketing
            </a>
        </li>
        <li>
            <a class="ymo-sub-menu-business" href="/business">
                business
            </a>
        </li>
    </ul>
</li>-->
<!--ymo-menu-settings-->