<?php
echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'filter','module' => 'backoffice','size'=>'sm'],
]);
?>

<div class="col-xs-4 ymo-aside-left ymo-nopadding">
	
	<div class="col-xs-12 ymo-menu-left ymo-nopadding">
		<ul class="list-inline ymo-nav-left">
			<li class="active">
	            <a class="ymo-icon-client active" href="/backoffice/user-log">
	                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','users') ?>
	            </a>
	        </li>
	        <li>
	            <a class="ymo-icon-company" href="/backoffice/companies-log">
	                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','companies') ?>
	            </a>
	        </li>
		</ul>
	</div>
	
	<div class="col-xs-12 ymo-table-general ymo-scroll ymo-nopadding">
		<div class="col-xs-12 ymo-table ymo-nopadding">
		
			<table class="table ymo-table-list table-responsive">
			  	<tbody>
					<tr>
						<td>
	                		<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
                            </p>
	                     	<a id="click" data-id="1" class="arrow-down"></a>
							<tbody id="1" class="ymo-list-show">
                                <tr>
                                    <td colspan="2">
                                        <div class="col-xs-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','username') ?></p><span><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','username') ?></span>
                                        </div>
                                        <div class="col-xs-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','location') ?></p><span><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','country') ?></span>
                                        </div>
                                        <div class="col-xs-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','email') ?></p><span>email@email.com</span>
                                        </div>
                                        <div class="col-xs-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','date of birth') ?></p><span>30 10 1983</span>
                                        </div>
                                        <div class="col-xs-12 ymo-user-company ymo-nopadding">
                                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                                            <p>
                                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Info Soft Pvt Ltd') ?>
                                            </p>
                                            <a class="ymo-view">
                                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','view profile') ?>
                                            </a>
                                        </div>
                                        <div class="col-xs-12 ymo-user-company ymo-nopadding">
                                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                                            <p>
                                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','General Electric') ?>
                                            </p>
                                            <a class="ymo-view">
                                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','view profile') ?>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="2" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="3" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="4" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="5" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="6" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="7" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="8" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="9" class="arrow-down"></a>
						</td>
					</tr>
					<tr>
						<td>
                        	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
				        	<p>
				            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','John Doe') ?>
				        	</p>
                        	<a id="click" data-id="10" class="arrow-down"></a>
						</td>
					</tr>
				</tbody>
			</table>
		
		</div>
	</div>
	
	<div class="col-xs-12 ymo-footer-left ymo-nopadding">
		<a class="ymo-icon-filter" data-action="filter" data-size="lg">filter</a>
		
		<div class="col-xs-6 ymo-search ymo-nopadding">
			<input type="text" name="search" class="form-control ymo-search-sm" placeholder="search">
			<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
		</div>
	</div>
	
</div>