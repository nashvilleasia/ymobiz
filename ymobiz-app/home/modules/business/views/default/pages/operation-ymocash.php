<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-operation-ymocash ymo-nopadding">

		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
			
				<div class="col-xs-4 ymo-center-left ymo-nopadding">
					<select class="form-control">
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','view all') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','cleared') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','credit') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','debit') ?></option>
		            </select>
				</div>
				
				<div class="col-xs-7 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('operation-menu') ?>
				</div>
				
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-nopadding">
			
		        <div class="col-xs-12 ymo-nopadding ymo-table-general ymo-scroll">
		            <div class="col-xs-12 ymo-table ymo-nopadding">
		
		                <table class="ymo-table-account table table-responsive">
		                    <tbody>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Sun Infotech') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <p><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></p>
		                            </td>
		                            <td class="ymo-operation-value">-250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Info Soft Pvt Ltd') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value">-250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','General Electric') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value">-250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Dell Dupe') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <p><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></p>
		                            </td>
		                            <td class="ymo-operation-value">
		                                <span class="ymo-operation-blue">250 USD</span>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Apple Computer') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <p><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></p>
		                            </td>
		                            <td class="ymo-operation-value">
		                                <span class="ymo-operation-blue">250 USD</span>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Accenture') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <p><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></p>
		                            </td>
		                            <td class="ymo-operation-value">-250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Oracle') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value">-250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Hewlett-Packard') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <p><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pending') ?></p>
		                            </td>
		                            <td class="ymo-operation-value">
		                                <span class="ymo-operation-blue">250 USD</span>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
		
		            </div>
		        </div>
		        
		        <div class="col-xs-12 ymo-table-footer ymo-nopadding">
		        	<hr/>
		            <div class="col-xs-4 ymo-balance ymo-nopadding">
		                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('invoices_off.png','img/icons')?>" alt="...">
		                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ymocash balance') ?>:&emsp;-500 USD</span>
		            </div>
		        </div>
		     
		    </div>
			
			<div class="col-xs-12 ymo-footer-center ymo-nopadding">
				<div class="col-xs-6 ymo-center-left ymo-nopadding">
					<div class="col-xs-10 ymo-search ymo-nopadding">
						<input type="text" name="search" class="form-control ymo-search-sm" placeholder="search">
						<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>