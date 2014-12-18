<div class="row">
	<div class="container ymo-nopadding">
		<div class="col-md-12 ymo-footer ymo-nopadding ymo-Panel">
            <div class="col-md-2 col-sm-2 ymo-column-left ymo-Panel">
                <div class="col-md-12 ymo-social ymo-Panel">
                    <ul class="list-inline ymo-Panel">
                        <li>
                            <a href="#">
                                <img src="<?php echo Yii::$app->getModule('site')->ymoTools->imageSrc('icon-facebook.png','img') ?>" alt="...">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('icon-twitter.png','img') ?>" alt="...">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('icon-skype.png','img') ?>" alt="...">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('icon-linkedin.png','img') ?>" alt="...">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
			<div class="col-md-10 col-sm-10 ymo-column-center ymo-Panel">
				<div class="col-md-9 col-sm-9 ymo-menu ymo-Panel" style="min-width: 383px;">
					<ul class="list-inline ymo-Panel">
                        <li class="active">
                            <a class="brand" href="#" data-action="faqs" data-size="lg">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','faqs') ?>
                            </a>
                        </li>
                        <span>|</span>
						<li class="active">
							<a class="brand" href="#" data-action="help" data-size="lg">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','help') ?>
							</a>
						</li>
						<span>|</span>
						<li>
							<a class="brand" href="#" data-action="pricing">
                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','pricing') ?>
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
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <?php  Yii::$app->getModule('site')->ymoLangManager->getLangName() ?>
								<span class="caret"></span>
								<ul class="dropdown-menu">
                                    <?php  Yii::$app->getModule('site')->ymoLangManager->getLangList() ?>
								</ul>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-12 ymo-copyright ymo-Panel" style="margin: auto;">
					<p>
						<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','&copy copyright by ymobiz all rights reserved') ?>
						<?php echo date("Y"); ?>
					</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 ymo-column-right ymo-Panel" style="max-width: 190px;float: right; display: none;">
				<div class="col-md-12 ymo-icon-payments ymo-Panel">
					<ul class="list-inline">
						<li>
							<img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('icon-visa.png','img') ?>" alt="...">
						</li>
						<li>
							<img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('icon-mastercard.png','img') ?>" alt="...">
						</li>
						<li>
							<img src="<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('icon-discover.png','img') ?>" alt="...">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
