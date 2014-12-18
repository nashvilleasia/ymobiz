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
					<?php echo \Yii::$app->view->render('ymobiz-menu') ?>
				</div>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-aside ymo-nopadding">
		
	                <div class="col-xs-4 ymo-column-left ymo-nopadding">
	                    <h4><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new user registrations') ?></h4>
	                    <img class="ymo-chart-pie" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('chart.png','img')?>" alt="...">
	                </div>
	
	                <div class="col-xs-7 col-xs-offset-1 ymo-column-center ymo-nopadding">
	                    <h3><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new user registrations') ?></h3>
	                    <img class="ymo-timeweekly" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('time-weekly.png','img')?>" alt="...">
	                </div>
	
	                <ul class="col-xs-4 ymo-column-right list-unstyled ymo-nopadding">
	                    <li class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','free users') ?></p>
	                        <h4>45035</h4>
	                    </li>
	                    <li class="ymo-statistics-right">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','basic users') ?></p>
	                        <h4>23680</h4>
	                    </li>
	                    <li class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','premium users') ?></p>
	                        <h4>11560</h4>
	                    </li>
	                    <li class="ymo-statistics-right">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','total users') ?></p>
	                        <h4>80275</h4>
	                    </li>
	                </ul>
	
	                <ul class="col-xs-4 col-xs-offset-1 ymo-column-right list-unstyled ymo-nopadding">
	                    <li class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new free users') ?></p>
	                        <h4>5</h4>
	                    </li>
	                    <li class="ymo-statistics-right">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new basic users') ?></p>
	                        <h4>41</h4>
	                    </li>
	                    <li class="ymo-statistics-left">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new premium users') ?></p>
	                        <h4>27</h4>
	                    </li>
	                    <li class="ymo-statistics-right">
	                        <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','new users total') ?></p>
	                        <h4>73</h4>
	                    </li>
	                </ul>

		        </div>
		    </div>
			
		</div>
	
	</div>
</div>