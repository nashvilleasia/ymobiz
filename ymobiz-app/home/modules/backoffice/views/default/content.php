<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-backoffice ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
				<div class="col-xs-2 ymo-center-left ymo-nopadding">
					<select class="form-control">
		                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last month') ?></option>
		                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 3 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','months') ?></option>
		                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 6 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','months') ?></option>
		                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last year') ?></option>
		                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 2 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','years') ?></option>
		                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 3 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','years') ?></option>
		            </select>
				</div>
			
				<div class="col-xs-8 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('pages/ymobiz-menu') ?>
				</div>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-aside ymo-nopadding">
		
	                <div class="col-xs-12 ymo-column-left ymo-nopadding">
	                    <h4><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','pageviews') ?></h4>
	                    <img class="ymo-timeweekly" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('time-weekly.png','img')?>" alt="...">
	                </div>
	
	                <ul class="col-xs-4 ymo-column-center list-unstyled ymo-nopadding">
	                    <li class="col-xs-5 ymo-statistics-left ymo-nopadding">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','free users') ?></p>
	                        <h4>3</h4>
	                    </li>
	                    <li class="col-xs-5 ymo-statistics-right ymo-nopadding">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','basic users') ?></p>
	                        <h4>42</h4>
	                    </li>
	                    <li class="col-xs-5 ymo-statistics-left ymo-nopadding">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','premium users') ?></p>
	                        <h4>27</h4>
	                    </li>
	                    <li class="col-xs-5 ymo-statistics-right ymo-nopadding">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','unregistered users') ?></p>
	                        <h4>58</h4>
	                    </li>
	                    <li class="col-xs-12 ymo-statistics-total ymo-nopadding">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','total pageviews') ?></p>
	                        <h4>58</h4>
	                    </li>
	                </ul>
	
	                <div class="col-xs-7 col-xs-offset-1 ymo-column-right ymo-nopadding">
	                    <img class="ymo-worldmap" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('world-map.png','img')?>" alt="...">
	                </div>

		        </div>
		    </div>
			
		</div>
	
	</div>
</div>