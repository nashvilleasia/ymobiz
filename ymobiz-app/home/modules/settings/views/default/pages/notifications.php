<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'settings-saved','module' => 'settings','size'=>'sm'],
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
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','unread email') ?>
	                            </td>
	                            <td class="col-md-6 ymo-settings-input">
	                            	<ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="2">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','unread chat message') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox2" value="3" checked="checked">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox2" value="4">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox2" value="5">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','missed calls') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox3" value="6">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox3" value="7" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox3" value="8">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','finished campaigns') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox4" value="9">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox4" value="10">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox4" value="11" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','purchase due payment') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox5" value="12" checked="checked">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox5" value="13">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox5" value="14">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','sales payment received') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input input-sm">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox6" value="15">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox6" value="16">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox6" value="17" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','orders received') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox7" value="18">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox7" value="19" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox7" value="20">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','ymocash clearance') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox8" value="21">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox8" value="22">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox8" value="23" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','contact request') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox9" value="24" checked="checked">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox9" value="25">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox9" value="26">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','new followers') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox10" value="27">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox10" value="28" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox10" value="29">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','comments') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox11" value="30" checked="checked">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox11" value="31">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox11" value="32">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','likes') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox12" value="33">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox12" value="34" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox12" value="35">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td class="ymo-settings-item">
	                                <?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','shares') ?>
	                            </td>
	                            <td class="col-xs-6 ymo-settings-input">
	                                <ul class="checkbox-group list-inline ymo-nav-right">
										<li>     	
											<div class="checkbox">
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox13" value="36">
													<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','ymobiz') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox13" value="37" checked="checked">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','email') ?>
												</label>
											</div>
										</li>
										<li> 
											<div class="checkbox"> 
												<label>
											 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox13" value="38">
											 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms') ?>
												</label>
											</div>
										</li>
									</ul>
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