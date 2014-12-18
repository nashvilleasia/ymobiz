<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
	<div class="col-xs-4 ymo-aside-left ymo-nopadding">
		<div class="ymo-sidebar-advertising">
		
			<div class="col-xs-12 ymo-menu-left ymo-nopadding">
				<ul class="list-inline ymo-nav-left">
					<li>
	                	<a class="ymo-icon-edit active" href="advertising-campaigns">
	                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','edit') ?>
	                 	</a>
	             	</li>
	             	<li>
	                	<a class="ymo-icon-statistics" href="/marketing/campaigns-statistics">
	                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','statistics') ?>
	                	</a>
	            	</li>
				</ul>
			</div>
			
			<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
				
				<form action="">
			
					<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
						<div class="col-xs-12 ymo-sidebar ymo-nopadding">
						
							<?php echo \Yii::$app->view->render('campaigns-menu') ?>
						
							<div class="col-md-12 ymo-adv-preview ymo-nopadding">
		                        <h4><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','campaign title') ?></h4>
		                        <img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('image-right.jpg','img')?>" alt="...">
		                        <p>
		                        	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','
			                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
			                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr.
		                        	') ?>
		                        </p>
		                    </div>
					
						</div>
					</div>
			
	                <div class="col-xs-12 ymo-buttons-sidebar ymo-nopadding">
	                    <ul class="list-inline ymo-status">
	                    	<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','status') ?>:</p>
	                    	<li class="active">
	                        	<a class="ymo-icon-play" href="#"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','play') ?></a>
	                     	</li>
	                    	<li>
	                        	<a class="ymo-icon-pause" href="#"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','pause') ?></a>
	                    	</li>
	                	</ul>
		                <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','save campaign') ?></button>
	                </div>
		                
				</form>
					
			</div>
			
			<div class="col-xs-12 ymo-footer-left ymo-nopadding">
				<ul class="list-inline">
					<li class="active">
				    	<a class="ymo-icon-plus" href="#">
				        	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','add new') ?>
		         		</a>
		        	</li>
		        	<li>
		            	<a class="ymo-icon-delete" href="#">
		            		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','delete') ?>
			            </a>
			        </li>
				</ul>
			</div>
			
		</div>
	</div>
	<!--ymo-column-left-->
	
	<!--ymo-column-right-->
	<?php echo \Yii::$app->view->render('campaigns') ?>
	<!--ymo-column-right-->
	
</div>		