<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'new-general-saved','module' => 'business','size'=>'sm'],
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
	                    <thead>
	                        <tr>
	                            <th class="ymo-finance-account">
	                                <select class="form-control">
	                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select account') ?></option>
						                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','purchases') ?></option>
						                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></option>
						                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></option>
	                                </select>
	                            </th>
	                            <th class="ymo-finance-name">
	                                <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','insert article name') ?>">
	                            </th>
	                            <th class="ymo-finance-ref">
	                                <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','insert reference') ?>">
	                            </th>
	                            <th class="ymo-finance-value">
	                                <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','insert value') ?>">
	                            </th>
	                            <th class="ymo-finance-status">
	                                <select class="form-control">
	                                    <option>+/-</option>
	                                    <option>+</option>
	                                    <option>-</option>
	                                </select>
	                            </th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td class="ymo-finance-id">1.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">-</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">2.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">+</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">3.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">-</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">4.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">+</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">5.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">+</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">6.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">+</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">7.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">-</td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-finance-id">8.</td>
	                            <td class="ymo-finance-date">15/12/2013</td>
	                            <td class="ymo-finance-account"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Account') ?>: 1234567890</td>
	                            <td class="ymo-finance-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','article name') ?></td>
	                            <td class="ymo-finance-ref"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>. 1234567890</td>
	                            <td class="ymo-finance-value">120 USD </td>
	                            <td class="ymo-finance-status">+</td>
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
			                <a class="ymo-icon-save" data-action="new-general-saved" data-size="lg">
			                	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','save') ?>
			                </a>
			            </li>
			            <li>
			                <a class="ymo-icon-delete" href="#"> 
			                	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','cancel') ?>
			                </a>
			            </li>
			        </ul>
				</div>
			</div>
			
		</div>
	
	</div>
</div>