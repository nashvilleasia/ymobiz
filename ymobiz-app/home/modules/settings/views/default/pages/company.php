<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'settings-saved','module' => 'settings','size'=>'sm'],
    ['id'=>'manage-staff','module' => 'settings','size'=>'sm'],
    ['id'=>'remove-staff','module' => 'settings','size'=>'sm'],
    ['id'=>'staff-removed','module' => 'settings','size'=>'sm'],
    ['id'=>'delete-company','module' => 'settings','size'=>'sm'],
    ['id'=>'company-deleted','module' => 'settings','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-settings ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
				<div class="col-xs-12 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('general-menu') ?>
				</div>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
	                <table class="ymo-table-personal table table-responsive">
	                    <tbody>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','account type') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" class="ymo-radio" value="0" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','free') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="1" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','basic') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="2" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','premium') ?>
											</label>
										</li>
	                                	<a href="#" class="ymo-view"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','upgrade') ?></a>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','company name') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','profile image') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <div class="col-xs-7 ymo-nopadding">
	                                    <input type="text" class="form-control input-sm" placeholder="160x160 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','pix') ?>">
	                                </div>
	                                <a class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','upload image') ?></a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','wallpaper') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <div class="col-xs-7 ymo-nopadding">
	                                    <input type="text" class="form-control input-sm" placeholder="851x350 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','pix') ?>">
	                                </div>
	                                <a class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','upload image') ?></a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','tax number') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','business area') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input input-sm">
	                                <select class="form-control">
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','start typing to see the list') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last month') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 6 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','months') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last year') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 2 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','years') ?></option>
	                                </select>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','address') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','city') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','zip code') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','country') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','email') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','confirm email') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','phone number') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','who can search company by email') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" class="ymo-radio" value="3" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','contacts') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="4" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','followers') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="5" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','all') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','who can search company by name') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" class="ymo-radio" value="6" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','contacts') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="7" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','followers') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="8" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','all') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','staff members') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="manage-staff" data-size="lg" class="ymo-icon-blocked">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','manage') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','payment method ymobiz fees') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" class="ymo-radio" value="9" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','credit card') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" value="10" class="ymo-radio" />
												<img src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('paypal.png','img/icons')?>" alt="...">
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" value="11" class="ymo-radio" />
												<img src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('ymopay.png','img/icons')?>" alt="...">
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" class="ymo-radio" value="12" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','transfer') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','receive method') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','credit card') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
											 		<img class="ymo-icon-paypal" src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('paypal.png','img/icons')?>" alt="...">
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="2">
											 		<img class="ymo-icon-ymopay" src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('ymopay.png','img/icons')?>" alt="...">
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="3">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','transfer') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','receive report') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a class="ymo-icon-save">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','export') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="delete-company" data-size="lg" class="ymo-icon-trash">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','delete company') ?>
	                                </a>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>

		        </div>
		    </div>
			
			<div class="col-xs-12 ymo-footer-center ymo-nopadding">
				<div class="col-xs-6 ymo-center-right ymo-nopadding">
					<a data-action="settings-saved" data-size="lg" class="btn ymo-blue-gradient pull-right"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','save changes') ?></a>
				</div>
			</div>
			
		</div>
	
	</div>
</div>