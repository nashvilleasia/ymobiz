<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
	<div class="col-xs-4 ymo-aside-left ymo-nopadding">
		<div class="ymo-sidebar-sms">
			
			<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
				
				<form action="">
			
					<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
						<div class="col-xs-12 ymo-sidebar ymo-nopadding">
						
							<?php echo \Yii::$app->view->render('sms-menu') ?>
						
							<div class="col-md-12 ymo-group-list ymo-nopadding">
		                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','campaign title') ?>">
		                    </div>
		                    <div class="col-md-12 ymo-group-list ymo-nopadding">
		                        <textarea class="form-control" rows="5" placeholder="<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','your advert text') ?> (160 <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','characters max') ?>.)"></textarea>
		                    </div>
					
						</div>
					</div>
			
	                <div class="col-xs-12 ymo-buttons-sidebar ymo-nopadding">
	                	<button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','send message') ?></button>
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
	<?php echo \Yii::$app->view->render('sms') ?>
	<!--ymo-column-right-->
	
</div>