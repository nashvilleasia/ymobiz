<?php
echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'delete-account','module' => 'business','size'=>'sm'],
    ['id'=>'account-deleted','module' => 'business','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-finance ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
				<div class="col-xs-12 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('finance-menu') ?>
				</div>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
	                <table class="ymo-table-account table table-responsive">
	                    <tbody>
	                        <tr>
	                            <td class="ymo-id-description">1.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">2.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">3.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">4.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">5.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">6.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">7.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-id-description">8.</td>
	                            <td class="ymo-finance-description"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Description lorem ipsum dolor sit amet') ?></td>
	                            <td class="ymo-finance-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','assets/liabilities') ?></td>
	                            <td class="ymo-finance-type"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','revenues/expenses') ?></td>
	                        </tr>
	                    </tbody>
	                </table>
		
		        </div>
		    </div>
			
			<div class="col-xs-12 ymo-footer-center ymo-nopadding">
				<div class="col-xs-6 ymo-center-left ymo-nopadding">
					<div class="col-xs-10 ymo-search ymo-nopadding">
						<input type="text" name="search" class="form-control ymo-search-sm" placeholder="search">
						<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
					</div>
				</div>
				
				<div class="col-xs-6 ymo-center-right ymo-nopadding">
					<ul class="list-inline ymo-nav-right">
			            <li class="active">
			                <a class="ymo-icon-plus" href="/business/finance-accounts-new">
			                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','add new') ?>
			                </a>
			            </li>
			            <li>
			                <a class="ymo-icon-delete" data-action="delete-account" data-size="lg">
			                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','delete') ?>
			                </a>
			            </li>
			        </ul>
				</div>
			</div>
			
		</div>
	
	</div>
</div>