<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-user-log ymo-nopadding">
	
		<!--column-left-->
		<?php echo \Yii::$app->view->render('user-sidebar') ?>
		<!--column-left-->
	
		<!--column-right-->
		<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		
			<div class="col-xs-6 ymo-menu-right ymo-nopadding">
				<?php echo \Yii::$app->view->render('user-menu') ?>
			</div>
	
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
				<div class="col-xs-12 ymo-aside ymo-nopadding">
				
					<div class="col-xs-12 ymo-column-statistics ymo-nopadding">
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','total time') ?></p>
	                        <h4>7h37m</h4>
	                    </div>
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','time marketing') ?></p>
	                        <h4>2h12m</h4>
	                    </div>
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','time business') ?></p>
	                        <h4>3h56m</h4>
	                    </div>
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','time network') ?></p>
	                        <h4>1h27m</h4>
	                    </div>
	                </div>
	                <div class="col-xs-12 ymo-column-statistics ymo-nopadding">
	                    <div class="col-xs-5 ymo-nopadding">
	                        <img class="ymo-charttime" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('chart-time.png','img')?>" alt="...">
	                    </div>
	                    <div class="col-xs-6 ymo-nopadding" style="float: right;">
	                        <div class="ymo-statistics">
	                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last login') ?></p>
	                            <h4>32m</h4>
	                            <p>01 01 13</p>
	                        </div>
	                        <div class="ymo-statistics-left">
	                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','avg. time weekly') ?></p>
	                            <h4>1h43m</h4>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xs-12 ymo-column-statistics ymo-nopadding">
	                    <img class="ymo-timeweekly" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('time-weekly.png','img')?>" alt="...">
	                </div>
	                <div class="col-xs-12 ymo-column-statistics ymo-nopadding">
	                    <div class="ymo-statistics">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','account type') ?></p>
	                        <h4><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','premium') ?></h4>
	                        <p>since 01 01 13</p>
	                    </div>
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','subscription rev.') ?></p>
	                        <h4>350$</h4>
	                    </div>
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','advertising rev.') ?></p>
	                        <h4>834$</h4>
	                    </div>
	                    <div class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','sales rev.') ?></p>
	                        <h4>27 858$</h4>
	                    </div>
	                </div>
				
				</div>
			</div>

		</div>
		<!--column-right-->
	
	</div>
</div>