<?php
use app\components\ymoTranslate;
?>
<div class="row">
    <div class="col-md-12 ymo-footer ymo-nopadding">

        <div class="col-md-3 ymo-column-left ymo-nopadding">
            <div class="col-md-6 ymo-logo-footer ymo-nopadding">
                <a href="<?php echo \Yii::$app->request->baseUrl ?>">
                    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('logo_2.png','img')?>" alt="...">
                </a>
            </div>
            <div class="col-md-6 ymo-copyright-ymobiz ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','&copy copyright by ymobiz all rights reserved') ?>
                	<?php echo date("Y"); ?>
        		</p>
            </div>
        </div>

        <div class="col-md-5 ymo-column-center ymo-nopadding">
            <ul class="col-md-8 ymo-footer-menu list-inline ymo-nopadding">
                <li class="active">
                    <a class="brand" href="#" data-action="help" data-size="lg">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','help') ?>
                    </a>
                </li>
                <span>|</span>
                <li>
                    <a class="brand" href="#" data-action="terms">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','terms') ?>
                    </a>
                </li>
                <span>|</span>
                <li>
                    <a class="brand" href="#" data-action="contact-us">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','contact us') ?>
                    </a>
                </li>
                <span>|</span>
                <li class="dropdown dropup">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','language') ?>
                        <span class="caret"></span>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('en')?>"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','English') ?></a></li>
                            <li><a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('en')?>"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Spanish') ?></a></li>
                            <li><a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('pt')?>"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Portuguese') ?></a></li>
                        </ul>
                    </a>
                </li>
            </ul>
            <ul class="col-md-4 ymo-social list-inline ymo-nopadding">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('facebook.png','img')?>" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('twitter.png','img')?>" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('youtube.png','img')?>" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('linkedin.png','img')?>" alt="...">
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-4 ymo-column-right ymo-nopadding">
            <form action="">
	            <div class="input-group">
	                <input type="email"  class="ymo-input form-control" id="" placeholder="<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','email') ?>">
	                <span class="input-group-btn">
	                    <button class="btn ymo-blue-gradient" type="button" data-action="newsletter" data-size="sm"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','join newsletter') ?></button>
	                </span>
	            </div>
            </form>
        </div>

    </div>
</div>
