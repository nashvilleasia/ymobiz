<div class="col-xs-12 ymo-main-menu ymo-nopadding">

    <div class="col-xs-12 ymo-column-top ymo-nopadding">
        <h4 class="col-xs-offset-4"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','first time on ymobiz?') ?></h4>
        <a class="brand btn ymo-blue-gradient" href="#" data-toggle="modal" data-size="lg" data-target="#myVideo">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','take a tour') ?>
            <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('arrow.png','img/icons')?>" alt="...">
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="col-xs-12 ymo-tour ymo-nopadding">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-xs-12 modal-header" style="padding-left: 14px;">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','take a tour') ?></h4>
                    </div>
                    <div class="modal-body" style="padding-left: 14px;">
                        <iframe width="560" height="315" src="//www.youtube.com/embed/ucXTSAUH2UE?rel=0&amp;autoplay=0&amp;loop=1" frameborder="0" allowfullscreen class="ymo-image-video"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xs-12 ymo-column-low ymo-nopadding">

        <ul class="ymo-modules list-inline">
            <li>
                <a href="/network">
                    <h1><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','network') ?></h1>
                    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('ymobiz_network.png','img/icons')?>" alt="...">
                    <div class="ymo-box" style="display: none;">
                        <h4><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','what\'s new') ?></h4>
                        <ul class="list-unstyled ymo-box-menu">
                        	<hr/>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                                <p>1 new follower (3min ago)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>1 new e-store order (12min)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>1 new follower (1h ago)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>2 new updates (2h ago)</p>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
            <li>
                <a href="/marketing">
                    <h1><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','marketing') ?></h1>
                    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('ymobiz_marketing.png','img/icons')?>" alt="...">
                    <div class="ymo-box" style="display: none;">
                        <h4><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','what\'s new') ?></h4>
                        <ul class="list-unstyled ymo-box-menu">
                        	<hr/>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                                <p>2 new messages (1h ago)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>1 missed call (5h ago)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>1 new message (15/05/13)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>1 new contact request (15/05/13)</p>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
            <li>
                <a href="/business">
                    <h1><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','business') ?></h1>
                    <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('ymobiz_business.png','img/icons')?>" alt="...">
                    <div class="ymo-box" style="display: none;">
                        <h4><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','what\'s new') ?></h4>
                        <ul class="list-unstyled ymo-box-menu">
                        	<hr/>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                                <p>2 new payment request (1min ago)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>1 new order (12min ago)</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>joined Ymocash</p>
                            </li>
                            <li>
                                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('image-flower.jpg','img/icons')?>" alt="...">
                                <p>2 new invoices</p>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>