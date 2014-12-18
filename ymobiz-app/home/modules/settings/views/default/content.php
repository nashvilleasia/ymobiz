<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'delete-account','module' => 'settings','size'=>'sm'],
    ['id'=>'settings-saved','module' => 'settings','size'=>'sm'],
    ['id'=>'insert-token','module' => 'settings','size'=>'sm'],
    ['id'=>'account-deleted','module' => 'settings','size'=>'sm'],
]);

?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-settings ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
				<div class="col-xs-12 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('pages/general-menu') ?>
				</div>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
	                <table class="ymo-table-personal table table-responsive">
	                    <tbody>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','first name') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last name') ?>
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
	                                <div class="ymo-code">
	                                    <input type="text" class="form-control input-sm">
	                                </div>
	                                <div class="ymo-number">
	                                    <input type="text" class="form-control input-sm">
	                                </div>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','change password') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','minimum')?> 8 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','characters')?> ">
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','confirm new password') ?>">
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','who can search me by email') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" class="ymo-radio" value="0" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','contacts') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="1" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','followers') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="2" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','all') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','who can search me by name') ?>
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
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','payment method') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" class="ymo-radio" value="6" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','credit card') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="7" class="ymo-radio" />
												<img src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('paypal.png','img/icons')?>" alt="...">
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="8" class="ymo-radio" />
												<img src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('ymopay.png','img/icons')?>" alt="...">
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" class="ymo-radio" value="9" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','transfer') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="delete-account" data-size="lg" class="ymo-icon-trash">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','delete account') ?>
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