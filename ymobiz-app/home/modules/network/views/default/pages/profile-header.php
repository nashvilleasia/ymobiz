<?php

$this->registerCss('
    .ymo-wallpaper{
		
        background: url('.\Yii::$app->getModule('network')->ymoTools->imageSrc('image-wallpaper.jpg','img').')no-repeat;
        background-size: cover;
        width: 100%;
        height: 195px;
    }
');

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'following','module' => 'network','size'=>'sm'],
]);
?>

<!--ymo-wallpaper-->
<div class="col-md-12 ymo-wallpaper ymo-nopadding ymo-Panel">
    <div class="ymo-image-profile">
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-profile.jpg','img')?>" alt="...">
    </div>
</div>
<!--ymo-wallpaper-->

<!--ymo-info-->
<div class="col-md-12 ymo-info ymo-nopadding ymo-Panel">

    <!--ymo-info-title-->
    <div class="col-md-8 ymo-info-title ymo-nopadding ymo-Panel">
        <h3>
            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','company of companies') ?>
        </h3>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
    </div>
    <!--ymo-info-title-->

    <!--ymo-info-menu-->
    <ul class="col-md-2 list-inline ymo-info-menu ymo-nopadding ymo-Panel">
    	<p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','my') ?></p>
        <li class="active">
            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/profile') ?>">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','activity') ?>
            </a>
        </li>
        <li>
            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/profile-myestore') ?>">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','estore') ?>
            </a>
        </li>
        <li>
            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/profile-myprofile') ?>">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','profile') ?>
            </a>
        </li>
    </ul>
    <!--ymo-info-menu-->

    <!--ymo-btn-->
    <div class="col-md-2 ymo-btn ymo-nopadding ymo-Panel">
        <button class="col-md-2 btn ymo-btn-pink dropdown-toggle" data-toggle="dropdown" href="#">
            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','connect') ?> 
            <span class="caret"></span>
        </button>
        <ul class="ymo-btn-menu dropdown-menu">
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to contact') ?>
                </a>
            </li>
            <li>
                <a href="#" data-action="following" data-size="lg">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','follow') ?>
                </a>
            </li>
        </ul>
    </div>
    <!--ymo-btn-->

</div>
<!--ymo-info-->

<!--ymo-info-general-->
<ul class="col-md-12 ymo-info-general ymo-nopadding ymo-Panel">

    <li class="col-md-3 ymo-nopadding ymo-Panel">
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','adress:') ?>
                <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quam nunca paum,') ?> 23</span>
            </p>
        </div>
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','postal code:') ?>
                <span>1234-123</span>
            </p>
        </div>
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','location:') ?>
                <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','antuerit litterarum') ?></span>
            </p>
        </div>
    </li>
    <li class="col-md-3 ymo-nopadding ymo-Panel">
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','state:') ?>
                <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','humanitatis') ?></span>
            </p>
        </div>
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','country:') ?>
                <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','seacula') ?></span>
            </p>
        </div>
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','tel:') ?>
                <span>(+) 351 123 456 789</span>
            </p>
        </div>
    </li>
    <li class="col-md-3 ymo-nopadding ymo-Panel">
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','fax:') ?>
                <span>(+) 351 123 456 790</span>
            </p>
        </div>
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','email:') ?>
                <span>info@companyofcompanies.com</span>
            </p>
        </div>
        <div class="col-md-12 ymo-list ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','web:') ?>
                <span>www.companyofcompanies.com</span>
            </p>
        </div>
    </li>
    <li class="col-md-3 ymo-nopadding ymo-Panel">
        <div class="col-md-12 ymo-following ymo-nopadding">
            <p>
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','following company of companies') ?>
            </p>
            <span>2368</span>
        </div>
    </li>

</ul>
<!--ymo-info-general-->