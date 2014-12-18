<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-settings ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
	                <table class="ymo-table-personal table table-responsive">
	                    <tbody>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','my activity is visible to') ?>
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
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="3" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','just me') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','my profile is visible to') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" class="ymo-radio" value="4" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','contacts') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="5" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','followers') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="6" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','all') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="7" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','just me') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','my e-store is visible') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" class="ymo-radio" value="8" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','on') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="9" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','off') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','allow interaction on my posts') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" class="ymo-radio" value="10" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','contacts') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" value="11" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','followers') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" value="12" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','all') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio4" value="13" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','just me') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','be visible as follower') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio5" class="ymo-radio" value="14" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','yes') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio5" value="15" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','anonymous') ?>
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