<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-operation-articles ymo-nopadding">
	
		<!--column-left-->
		<div class="col-xs-4 ymo-aside-left ymo-nopadding">
	
			<div class="col-xs-12 ymo-menu-left ymo-nopadding">
				<ul class="list-inline ymo-nav-left">
					<li>
	                	<a class="ymo-icon-edit active" href="#">
	                    	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','edit') ?>
	                 	</a>
	             	</li>
				</ul>
			</div>
			
			<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
				
				<form action="">
			
					<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
						<div class="col-xs-12 ymo-sidebar ymo-nopadding">
						
							<?php echo \Yii::$app->view->render('articles-menu') ?>
					
							
                        	<div class="ymo-article-promotion">
								<div class="col-md-12 ymo-group-list ymo-nopadding">
			                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','name') ?>">
			                    </div>
			                    <div class="col-md-12 ymo-group-list ymo-nopadding">
			                        <textarea class="form-control" rows="5" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','description (160 characters max.)') ?>"></textarea>
			                    </div>
			                    <div class="col-md-12 ymo-group-list ymo-nopadding">
			                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','minimum quantity') ?>">
			                    </div>
			                    <div class="col-md-12 ymo-group-list ymo-nopadding">
			                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','unit price') ?> (USD)">
			                    </div>
			                    <ul class="ymo-status list-inline">
	                                <p>
	                                	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','promotion status') ?>:
	                                </p>
	                                <li>
	                                    <a class="ymo-icon-play active" href="#">
	                                    	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','play') ?>
	                                    </a>
	                                </li>
	                                <li>
	                                    <a class="ymo-icon-pause active" href="#">
	                                    	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','pause') ?>
	                                    </a>
	                                </li>
	                            </ul>
							</div>
					
						</div>
					</div>
			
	                <div class="col-xs-12 ymo-buttons-sidebar ymo-nopadding">
	                    <ul class="list-inline ymo-status">
	                    	<p><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','estore status') ?>:</p>
	                    	<li class="active">
	                        	<a class="ymo-icon-play" href="#"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','active') ?></a>
	                     	</li>
	                    	<li>
	                        	<a class="ymo-icon-pause" href="#"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','inactive') ?></a>
	                    	</li>
	                	</ul>
		                <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','save article') ?></button>
	                </div>
		                
				</form>
					
			</div>
			
			<div class="col-xs-12 ymo-footer-left ymo-nopadding">
				<div class="col-xs-6 ymo-search ymo-nopadding">
		            <input type="text" name="search" class="form-control ymo-search-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','search articles') ?>">
			        <input type="submit" name="magnifier" class="ymo-magnifier-sm" value="">
	            </div>
			</div>
	
		</div>
		<!--column-left-->
		
		<!--column-right-->
		<?php echo \Yii::$app->view->render('articles-table') ?>
		<!--column-right-->
		
	</div>
</div>