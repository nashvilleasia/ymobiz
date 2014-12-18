<div class="col-md-12 ymo-info-icons ymo-nopadding ymo-Panel">
    <ul class="ymo-nopadding">
        <li class="col-md-2 col-sm-2 ymo-icon ymo-nopadding ymo-Panel">
            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('secure.png','img') ?>" alt="..." class="center-block">
            <p>
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','100% SECURE<br/>
                    AND TOTAL PCI<br/>
                    (Payment Card Industry)<br/>
                    COMPLIANCE')
                ?>
            </p>
        </li>
        <li class="col-md-2 col-sm-2 ymo-icon ymo-nopadding ymo-Panel">
            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('no-bank.png','img') ?>" alt="..." class="center-block">
            <p>
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','NO BANK<br/>
                    ACCOUNT<br/>
                    ASSOCIATION')
                ?>
            </p>
        </li>
        <li class="col-md-2 col-sm-2 ymo-icon ymo-nopadding ymo-Panel">
            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('no-personal.png','img') ?>" alt="..." class="center-block">
            <p>
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','NO PERSONAL<br/>
                    DATA TRAFFIC<br/>
                    ON THE INTERNET')
                ?>
            </p>
        </li>
        <li class="col-md-2 col-sm-2 ymo-icon ymo-nopadding ymo-Panel">
            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('pay-transfer.png','img') ?>" alt="..." class="center-block">
            <p>
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','PAY, TRANSFER<br/>
                    AND RECEIVE<br/>
                    MONEY IN REAL TIME')
                ?>
            </p>
        </li>
        <li class="col-md-2 col-sm-2 ymo-icon ymo-nopadding ymo-Panel">
            <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('reduce-all.png','img') ?>" alt="..." class="center-block">
            <p>
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','REDUCE ALL<br/>
                    YOUR MONEY<br/>
                    TRANSACTION COST')
                ?>
            </p>
        </li>
    </ul>
</div>

<div class="col-md-12 col-sm-12 ymo-cards ymo-Panel">
	<div class="col-md-6 col-sm-6 ymo-image-cards ymo-Panel">
		<img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('cards.png','img') ?>" alt="..." class="img-responsive">
	</div>
	<div class="col-md-5 col-sm-5 col-md-offset-1 ymo-Panel ymo-info">
		<h4>
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Ymocard') ?><span>&reg;</span>
        </h4>
		<h3>
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','YMOCARD is a pioneering and innovative
                product, which provides high technology
                to simplify your life!')
            ?>
        </h3>
		<a class="ymo-link" href="<?php echo \Yii::$app->urlManager->createUrl('/site/learn-more')?>"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','learn more') ?></a>
		<h3 class="ymo-text2">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Request your ymocard and
                start enjoying freedom in
                money transactions, its easy!')
            ?>
        </h3>
		<div class="col-md-12 ymo-nopadding ymo-Panel">
             <a href="<?php echo \Yii::$app->urlManager->createUrl('/site/order-signup')?>">
                 <p class="col-md-3 ymo-btn-home">
                     <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','GET YOUR
                        CARDS NOW!')
                     ?>
                 </p>
             </a>
		</div>
	</div>
</div>