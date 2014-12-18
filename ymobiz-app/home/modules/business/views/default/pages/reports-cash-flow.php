<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-cash-flow ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
				<div class="col-xs-4 ymo-center-left ymo-nopadding">
					<select class="form-control">
	                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last month') ?></option>
	                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last 3 months') ?></option>
	                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last 6 months') ?></option>
	                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last year') ?></option>
	                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last 2 years') ?></option>
	                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','last 3 years') ?></option>
	            </select>
				</div>
				
				<div class="col-xs-7ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('reports-menu') ?>
				</div>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
	                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('cash-flow.png','img')?>" alt="...">
		
		        </div>
		    </div>
			
			<div class="col-xs-12 ymo-footer-center ymo-nopadding">
				<div class="col-xs-6 ymo-center-right ymo-nopadding">
					<ul class="list-inline ymo-nav-right">
			            <li class="active">
			                <a class="ymo-icon-save" href="#">
			                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pdf export') ?>
			                </a>
			            </li>
			        </ul>
				</div>
			</div>
			
		</div>
	
	</div>
</div>