<?php
use app\components\ymoTranslate;
?>
<div class="col-md-12 ymo-text ymo-Panel">
    <h3 class="text-center"><strong><?php echo ymoTranslate::t('yii','app','everything') ?></strong> <?php echo ymoTranslate::t('yii','app','your business needs just') ?> <strong><?php echo ymoTranslate::t('yii','app','one click away!') ?></strong></h3>
</div>
<div class="col-md-10 ymo-service col-md-offset-1 ymo-Panel">
    <ul class="list-inline">
        <li id="marketing" class="col-md-4 col-xs-4 ymo-marketing  ymo-Panel">
            <a href="#">

            </a>
        </li>
        <li id="business" class="col-md-4 col-xs-4  ymo-business  ymo-Panel">
            <a href="#">

            </a>
        </li>
        <li id="network" class="col-md-4 col-xs-4  ymo-network  ymo-Panel">
            <a href="#">

            </a>
        </li>
    </ul>
</div>
<div id="ymo-marketing" class="col-md-12 ymo-view ymo-Panel">
    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('arrow.png','img')?>" alt="..." class="img-responsive ymo-arrow">
    <div class="col-md-7 ymo-column-left ymo-Panel">
        <h2><?php echo ymoTranslate::t('yii','app','stay connected in realtime!') ?></h2>
        <hr />
        <ul class="list-unstyled">
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','manage your client/supplier relationship') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','communicate in realtime (email + sms + voip)') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','organize your tasks with no effort') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','advertise your products/services on a global network') ?>
            </li>
        </ul>
    </div>
    <div class="col-md-5 ymo-column-right ymo-nopadding ymo-Panel">
        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image_marketing.jpg','img')?>" alt="..." class="img-responsive center-block">
    </div>
</div>
<div id="ymo-business"  class="col-md-12 ymo-view ymo-Panel">
    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('arrow.png','img')?>" alt="..." class="img-responsive ymo-arrow">
    <div class="col-md-7 ymo-column-left ymo-Panel">
        <h2><?php echo ymoTranslate::t('yii','app','your office anytime, anywhere!') ?></h2>
        <hr />
        <ul class="list-unstyled">
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','manage accounts and invoicing') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','operate your articles') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','use financial mechanisms') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','have access to realtime financial reports') ?>
            </li>
        </ul>
    </div>
    <div class="col-md-5 ymo-column-right ymo-nopadding ymo-Panel">
        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image_business.jpg','img')?>" alt="..." class="img-responsive center-block">
    </div>
</div>
<div id="ymo-network" class="col-md-12 ymo-view ymo-Panel">
    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('arrow.png','img')?>" alt="..." class="img-responsive ymo-arrow">
    <div class="col-md-7 ymo-column-left ymo-Panel">
        <h2><?php echo ymoTranslate::t('yii','app','your business opportunity!') ?></h2>
        <hr />
        <ul class="list-unstyled">
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','search and connect with clients and suppliers') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','create your company profile') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','open your company e-store') ?>
            </li>
            <li>
                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
				<?php echo ymoTranslate::t('yii','app','follow and share activity within the network') ?>
            </li>
        </ul>
    </div>
    <div class="col-md-5 ymo-column-right ymo-nopadding ymo-Panel">
        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image_network.jpg','img')?>" alt="..." class="img-responsive center-block">
    </div>
</div>
