<!--ymo-menu-account-->
<div class="ymo-menu-account">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu ymo-submenu" role="menu">
	    <h6><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','choose account') ?></h6>
        <a class="ymo-view" href="#"><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','+add new') ?></a>
        <hr>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','offshore brain') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','soulcaring') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','company of companies') ?></p>
            </a>
        </li>
    	<hr>
    	<ul class="list-inline ymo-menu-config">
            <li>
                <a href="/site/logout" data-method="post">
                    <img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('logout-icon.png','img/icons')?>" alt="...">
                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','logout') ?>
                </a>
            </li>
            <li>
                <a href="/settings">
                    <img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('settings-icon.png','img/icons')?>" alt="...">
                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','settings') ?>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('question_blue.png','img/icons')?>" alt="...">
                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','help') ?>
                </a>
            </li>
        </ul>
    	<hr>
    	<ul class="list-inline ymo-menu-options">
            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','language') ?>
                </a>
            </li>
            <li>
                <a class="brand" href="#" data-action="terms">
                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','terms') ?>
                </a>
            </li>
            <li>
                <a class="brand" href="#" data-action="pricing">
                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','pricing') ?>
                </a>
            </li>
        </ul>
    	<hr>
    	<div class="ymo-copyright">
			<p>&copy; <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','copyright by ymobiz all rights reserved 2014') ?></p>       
		</div>
	</ul>
</div>
<!--ymo-menu-account-->