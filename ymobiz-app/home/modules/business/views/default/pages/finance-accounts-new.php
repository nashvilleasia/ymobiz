<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'new-account-saved','module' => 'business','size'=>'sm'],
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
	                            <th class="ymo-finance-description">
	                                <input type="text" class="form-control input-sm" placeholder="insert account description">
	                            </th>
	                            <th class="ymo-finance-category">
	                                <select class="form-control">
	                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select category') ?></option>
	                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','purchases') ?></option>
						                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></option>
						                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></option>
	                                </select>
	                            </th>
	                            <th class="ymo-finance-type">
	                                <select class="form-control">
	                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select account type') ?></option>
	                                    <option>+</option>
	                                    <option>-</option>
	                                </select>
	                            </th>
	                        </tr>
	                    </thead>
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
			                <a class="ymo-icon-save" data-action="new-account-saved" data-size="lg">
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



















































<!-- 
<div class="col-md-12 ymo-finance ymo-nopadding">

    <div class="col-md-12 ymo-nopadding">
        
    </div>

    <div class="col-md-12 ymo-general-business ymo-nopadding">

        
        <div class="col-md-12 ymo-table-business ymo-scroll ymo-nopadding">

            <div class="col-md-12 ymo-business-background ymo-nopadding">

                
                <table class="ymo-table-finance table table-responsive">
                    <thead>
                        <tr>
                            <th class="ymo-finance-description">
                                <input type="text" class="form-control input-sm" placeholder="insert account description">
                            </th>
                            <th class="ymo-finance-category">
                                <select class="form-control">
                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select category') ?></option>
                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','purchases') ?></option>
					                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></option>
					                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></option>
                                </select>
                            </th>
                            <th class="ymo-finance-type">
                                <select class="form-control">
                                    <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select account type') ?></option>
                                    <option>+</option>
                                    <option>-</option>
                                </select>
                            </th>
                        </tr>
                    </thead>
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
        

    </div>

    
    <div class="col-md-12 ymo-business-footer ymo-nopadding">

        
        <div class="col-md-6 ymo-left-list list-inline ymo-nopadding">
            
            <div class="col-md-4 ymo-search ymo-nopadding">
                <input type="text" name="search" class="form-control ymo-search-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','search') ?>">
	            <input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
            </div>
            
        </div>
        

        
        <ul class="col-md-6 ymo-right-list list-inline ymo-nopadding">
            <li>
                <a class="ymo-icon-delete">
                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','cancel') ?>
                </a>
            </li>
            <li>
                <a class="ymo-icon-save active" data-action="new-account-saved" data-size="lg">
                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','save') ?>
                </a>
            </li>
        </ul>
        

    </div>
    


</div> -->