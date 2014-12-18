<?php
echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'tax-rates','module' => 'settings','size'=>'sm'],
    ['id'=>'discount-rates','module' => 'settings','size'=>'sm'],
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
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','currency') ?>
	                            </td>
	                            <td class="col-xs-2 ymo-settings-input">
	                                <select class="form-control">
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','dollar') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','euro') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','pound') ?></option>
	                                    <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','yen') ?></option>
	                                </select>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','purchases auto payment') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                            	<ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" class="ymo-radio" value="0" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','on') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio" value="1" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','off') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','sales auto payment request') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" class="ymo-radio" value="2" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','on') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio2" value="3" class="ymo-radio" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','off') ?>
											</label>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','tax rates') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="tax-rates" data-size="lg" class="ymo-icon-edit-pink">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','edit') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','discount rates') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <a data-action="discount-rates" data-size="lg" class="ymo-icon-edit-pink">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','edit') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','ymocard discount rate') ?>
	                                <a class="ymo-view"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','know more about ymocard') ?></a>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a data-action="discount-rates" data-size="lg" class="ymo-icon-edit-pink">
	                                    <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','edit') ?>
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','ymocash') ?>
	                            </td>
	                            <td class="col-xs-4 ymo-settings-input">
	                                <a class="btn ymo-btn-pink pull-right"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','subscribe') ?></a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','report auto export') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="radio-group list-inline ymo-nav-right">
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" class="ymo-radio" value="4" checked="checked" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','on') ?>
											</label>
										</li>
										<li>
											<label>
												<input type="radio" id="" name="ymoRadio3" value="5" class="ymo-radio" />
												<?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','off') ?>
											</label>
										</li>
										<div class="col-xs-4 ymo-nopadding">
		                                    <select class="form-control">
		                                        <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','monthly') ?></option>
		                                        <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last month') ?></option>
		                                        <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 6 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','months') ?></option>
		                                        <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last year') ?></option>
		                                        <option><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','last') ?> 2 <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','years') ?></option>
		                                    </select>
		                                </div>
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