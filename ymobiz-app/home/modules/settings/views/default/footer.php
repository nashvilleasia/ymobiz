<?php
use app\components\ymoTranslate;
?>
<div class="row">
    <div class="col-md-12 ymo-footer-network ymo-nopadding ymo-Panel">
        <div class="col-md-3 ymo-column-left ymo-nopadding ymo-Panel">
            <div class="col-md-6 ymo-logo ymo-nopadding">
                <a href="<?php echo \Yii::$app->request->baseUrl ?>">
                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/logo_2.png" alt="...">
                </a>
            </div>
            <div class="col-md-6 ymo-copyright">
                <?php echo ymoTranslate::t('yii','app','&copy copyright by ymobiz all rights reserved') ?>
                <?php echo date("Y"); ?>
            </div>
        </div>
        <div class="col-md-7 col-md-offset-2 ymo-column-right ymo-nopadding ymo-Panel">
            <ul class="col-md-8 list-inline ymo-menu text-right ymo-nopadding ymo-Panel">
                <li class="active">
                    <a class="brand" href="#" data-action="help" data-size="lg">
                        <?php echo ymoTranslate::t('yii','app','help') ?>
                    </a>
                </li>
                <li>
                    <a class="brand" href="#" data-action="pricing">
                        <?php echo ymoTranslate::t('yii','app','pricing') ?>
                    </a>
                </li>
                <li>
                    <a class="brand" href="#" data-action="terms">
                        <?php echo ymoTranslate::t('yii','app','terms') ?>
                    </a>
                </li>
                <li>
                    <a class="brand" href="#" data-action="contact-us">
                        <?php echo ymoTranslate::t('yii','app','contact us') ?>
                    </a>
                </li>
                <li class="dropdown dropup">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ymoTranslate::t('ymoCommon','lang','language') ?>
                        <span class="caret"></span>
                        <ul class="ymo-sub-menu dropdown-menu">
                            <li><a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('pt')?>"><?php echo ymoTranslate::t('ymoCommon','lang','Portuguese') ?></a></li>
                            <li><a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('en')?>"><?php echo ymoTranslate::t('ymoCommon','lang','English') ?></a></li>
                        </ul>
                    </a>
                </li>
            </ul>
            <ul class="col-md-4 list-inline ymo-social text-right ymo-Panel">
                <p>follow ymobiz</p>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/facebook.png" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/twitter.png" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/youtube.png" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/linkedin.png" alt="...">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
