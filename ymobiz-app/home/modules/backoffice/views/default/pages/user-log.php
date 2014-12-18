<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-md-12 ymo-user-log ymo-nopadding">
	
		<!--column-left-->
		<?php echo \Yii::$app->view->render('user-sidebar') ?>
		<!--column-left-->
	
		<!--column-right-->
		<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		
			<div class="col-xs-4 ymo-menu-left ymo-nopadding">
				<select class="form-control">
                    <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last week') ?></option>
                	<option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 3 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','week') ?></option>
                	<option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 6 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','week') ?></option>
                	<option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last year') ?></option>
                	<option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 2 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','years') ?></option>
                	<option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 3 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','years') ?></option>
                </select>
			</div>
		
			<div class="col-xs-6 ymo-menu-right ymo-nopadding">
				<?php echo \Yii::$app->view->render('user-menu') ?>
			</div>
	
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
				<div class="col-xs-12 ymo-aside ymo-nopadding">
				
					<table class="ymo-table-user table table-responsive">
	                    <tbody>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_right.png','img/icons')?>" alt="...">
	                                <span>22-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Invited via email by') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>23-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz free plan') ?>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>23-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','register Info') ?>
	                                        <strong>Soft Pvt Ltd</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>24-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz Premium plan') ?>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>23-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','register Info') ?>
	                                        <strong>General Electric</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>23-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('network_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','network') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_right.png','img/icons')?>" alt="...">
	                                <span>23-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added by') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('network_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','network') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>24-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added product') ?>
	                                        <strong>article 01</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('business-icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','business') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_right.png','img/icons')?>" alt="...">
	                                <span>24-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','sold 04 units') ?>
	                                        <strong>article 01</strong>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','to') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('business-icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','business') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_left.png','img/icons')?>" alt="...">
	                                <span>22-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','video call ') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('marketing-icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','marketing') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_right.png','img/icons')?>" alt="...">
	                                <span>22-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Scheduled meeting with') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('marketing-icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','marketing') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_right.png','img/icons')?>" alt="...">
	                                <span>22-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Invited via email by') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
	                                </p>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>
	                                <img class="ymo-arrow" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('arrow_right.png','img/icons')?>" alt="...">
	                                <span>23-07-2013</span>
	                                <div class="ymo-description">
	                                    <p>
	                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added by') ?>
	                                        <strong>John Doe</strong>
	                                    </p>
	                                </div>
	                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('network_icon.png','img/icons')?>" alt="...">
	                                <p>
	                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','network') ?>
	                                </p>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
				
				</div>
			</div>

		</div>
		<!--column-right-->
	
	</div>
</div>