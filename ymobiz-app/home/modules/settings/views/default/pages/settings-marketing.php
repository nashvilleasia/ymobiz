<?php
echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'manage-blocked','module' => 'settings','size'=>'sm'],
    ['id'=>'edit-message','module' => 'settings','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-settings ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
	                <table class="ymo-table-personal table table-responsive">
	                    <tbody>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','default chat status') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" class="ymo-radio" value="0" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','online') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="1" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','busy') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="2" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','offline') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','my activity is visible to') ?>
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
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="6" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','just me') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','export log history') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a class="ymo-icon-save">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','export') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','blocked companies') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="manage-blocked" data-size="lg" class="ymo-icon-blocked">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','manage') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','inmail attachments') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" class="ymo-radio" value="7" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','show all') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="8" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','ask') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','out of the office message') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="edit-message" data-size="lg" class="ymo-icon-edit-pink">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','edit') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','time zone') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <select class="form-control">
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','GMT') ?> +00:00 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','(Dublin, Edinburgh, Lisbon, London)') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last month') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 6 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','months') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last year') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 2 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','years') ?></option>
	                                </select>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','date format') ?>
	                            </td>
	                            <td class="col-xs-3 ymo-settings-input">
	                                <select class="form-control">
	                                    <option>mm-dd-yyyy</option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last month') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 6 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','months') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last year') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 2 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','years') ?></option>
	                                </select>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','time format') ?>
	                            </td>
	                            <td class="col-xs-1 ymo-settings-input">
	                                <select class="form-control">
	                                    <option>12h</option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last month') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 6 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','months') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last year') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 2 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','years') ?></option>
	                                </select>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','receive campaign reports by') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
													<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','inmail') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
											 		<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','email') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','turn off network and sms campaigns') ?>
	                                <a class="ymo-view"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','premium accounts only') ?></a>
	                                <a class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','upgrade') ?></a>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" class="ymo-radio" value="9" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','yes') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" value="10" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','no') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>

		        </div>
		    </div>
			
		</div>
	
	</div>
</div>