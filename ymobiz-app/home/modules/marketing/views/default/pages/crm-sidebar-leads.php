<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'new-lead','module' => 'marketing','size'=>'md'],
    ['id'=>'filter','module' => 'marketing','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	
	<!--ymo-column-left-->
	<div class="col-md-4 ymo-aside-left ymo-nopadding">
		
		<div class="col-md-12 ymo-menu-left ymo-nopadding">
			<ul class="list-inline ymo-nav-left">
				<li>
					<a class="ymo-icon-client active" href="/marketing">
						<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','contacts') ?>
					</a>
				</li>
				<li>
					<a class="ymo-icon-leads" href="/marketing/crm-sidebar-leads">
						<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','leads') ?>
					</a>
				</li>
			</ul>
			
			<a class="ymo-icon-plus" data-action="new-lead" data-size="lg"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','add new') ?></a>
		</div>
		
		<div class="col-md-12 ymo-table-general ymo-scroll ymo-nopadding">
			<div class="col-md-12 ymo-table ymo-nopadding">
			
				<table class="table ymo-table-list table-responsive">
				  	<tbody>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Sun Infotech</p>
			                    <a class="ymo-show" href="#">hide staff members</a>
			                    
			                    <tbody class="ymo-list-show">
			                    	<tr>
			                    		<td>
			                        		<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
			                           		<p>Staff member name (staff member position)</p>
			                            	<img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
			                        	</td>
			                  		</tr>
			             			<tr>
			                        	<td>
			                            	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
			                            	<p>Staff member name (staff member position)</p>
			                           		<img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
			                       		</td>
			                  		</tr>
			       					<tr>
			                        	<td>
			                            	<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
			                                <p>Staff member name (staff member position)</p>
			                            	<img class="ymo-icon-status" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
			                       		</td>
			                   		</tr>
			     				</tbody>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Info Soft Pvt Ltd</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>General Electric</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Dell Dupe</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Dell Dupe</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Accenture</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Oracle</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Hewlett-Packard</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>DHL Parcel Service</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Cisco Systems</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Microsoft</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Oracle</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Hewlett-Packard</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>DHL Parcel Service</p>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="" />
				  				<p>Cisco Systems</p>
				  			</td>
				  		</tr>
				  	</tbody>
				</table>
			
			</div>
		</div>
		
		<div class="col-md-12 ymo-footer-left ymo-nopadding">
			<a class="ymo-icon-filter" data-action="filter" data-size="lg">filter</a>
			
			<div class="col-md-6 ymo-search ymo-nopadding">
				<input type="text" name="search" class="form-control ymo-search-sm" placeholder="search">
				<input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
			</div>
		</div>
		
	</div>
	<!--ymo-column-left-->
	
	<!--ymo-column-right-->
	<?php echo \Yii::$app->view->render('crm-info') ?>
	<!--ymo-column-right-->
</div>