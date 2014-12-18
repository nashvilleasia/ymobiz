<?php
echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'ymobiz-transfer','module' => 'business','size'=>'md'],
    ['id'=>'external-transfer','module' => 'business','size'=>'md'],
    ['id'=>'payment-request','module' => 'business','size'=>'sm'],
    ['id'=>'new-transaction','module' => 'business','size'=>'md'],
    ['id'=>'delete-transaction','module' => 'business','size'=>'sm'],
    ['id'=>'transaction-deleted','module' => 'business','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-operation-invoices ymo-nopadding">
	
		<div class="col-xs-12 ymo-aside-center ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-center ymo-nopadding">
			
				<div class="col-xs-4 ymo-center-left ymo-nopadding">
					<select class="form-control">
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','view all') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','purchases') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></option>
		                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></option>
		            </select>
				</div>
				
				<div class="col-xs-7 ymo-center-right ymo-nopadding">
					<?php echo \Yii::$app->view->render('operation-menu') ?>
				</div>
				
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		        <div class="col-xs-12 ymo-nopadding ymo-aside">
		
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
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Info Soft Pvt Ltd') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','purchases') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                   <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','General Electric') ?> 
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <a href="#" data-action="payment-request" data-size="lg" class="col-md-12 btn ymo-btn-gradient">
		                                	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','request payment') ?>
		                                </a>
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Dell Dupe') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Apple Computer') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Accenture') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','purchases') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <a href="#" data-action="ymobiz-transfer" data-size="lg" class="col-md-12 btn ymo-btn-gradient"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pay') ?></a>
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Oracle') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','sales') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
		                        </tr>
		                        <tr>
		                            <td class="ymo-operation-company">
		                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
		                                <p>
		                                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Hewlett-Packard') ?>
		                                </p>
		                            </td>
		                            <td class="ymo-operation-date">10/12/2013</td>
		                            <td class="ymo-operation-category"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','e-store') ?></td>
		                            <td class="ymo-operation-content">35 <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','items') ?></td>
		                            <td class="ymo-operation-reference"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','ref') ?>: 1234567890</td>
		                            <td class="ymo-operation-payment">
		                                <span><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','on receipt') ?></span>
		                            </td>
		                            <td class="ymo-operation-status">
		                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('verified.png','img/icons')?>" alt="...">
		                            </td>
		                            <td class="ymo-operation-value"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Total') ?>: 250 USD</td>
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
			                <a class="ymo-icon-plus" href="#" data-action="new-transaction" data-size="lg">
			                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','add new') ?>
			                </a>
			            </li>
				        <li>
			                <a class="ymo-icon-delete" href="#" data-action="delete-transaction" data-size="lg">
			                    <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','delete') ?>
			                </a>
			            </li>
					</ul>
				</div>
			</div>
			
		</div>
	
	</div>
</div>