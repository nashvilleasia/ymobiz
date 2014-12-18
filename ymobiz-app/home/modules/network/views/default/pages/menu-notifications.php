<!--ymo-menu-account-->
<div class="ymo-menu-account">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu ymo-submenu" role="menu">
	    <h6><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','choose account') ?></h6>
        <a class="ymo-view" href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','+add new') ?></a>
        <hr>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','soulcaring') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','company of companies') ?></p>
            </a>
        </li>
    	<hr>
    	<ul class="list-inline ymo-menu-config">
            <li>
                <a href="/site/logout" data-method="post">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('logout-icon.png','img/icons')?>" alt="...">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','logout') ?>
                </a>
            </li>
            <li>
                <a href="/settings">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('settings-icon.png','img/icons')?>" alt="...">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','settings') ?>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('question_blue.png','img/icons')?>" alt="...">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','help') ?>
                </a>
            </li>
        </ul>
    	<hr>
    	<ul class="list-inline ymo-menu-options">
            <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','language') ?>
                </a>
            </li>
            <li>
                <a class="brand" href="#" data-action="terms">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','terms') ?>
                </a>
            </li>
            <li>
                <a class="brand" href="#" data-action="pricing">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','pricing') ?>
                </a>
            </li>
        </ul>
    	<hr>
    	<div class="ymo-copyright">
			<p>&copy; <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','copyright by ymobiz all rights reserved 2014') ?></p>       
		</div>
	</ul>
</div>
<!--ymo-menu-account-->

<!--ymo-menu-notifications-->
<div class="ymo-menu-notifications">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<span class="ymo-notifications-blue">!</span>
		<span class="ymo-notifications-pink">4</span>
	</a>
	<ul class="dropdown-menu" role="menu">
	    <h6><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','notifications') ?></h6>
        <a class="ymo-view" href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view all') ?></a>
        <hr>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','2 new messages') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','1 missed call') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','2 new flowers') ?></p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','1 new contact request') ?></p>
            </a>
        </li>
 	</ul>
</div>
<!--ymo-menu-notifications-->
