<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
	<div class="col-xs-4 ymo-aside-left ymo-nopadding">
		<div class="ymo-sidebar-sms">
			
			<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
				
				<form action="">
			
					<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
						<div class="col-xs-12 ymo-sidebar ymo-nopadding">
						
							<?php echo \Yii::$app->view->render('sms-menu') ?>
						
							<div class="col-xs-12 ymo-estimated ymo-nopadding">
		                        <p>
		                           <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','estimated target companies') ?>
		                        <h5>
		                           2045
		                        </h5>
		                    </div>
		
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select country') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select city') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select activity sector') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select business volume') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select years of activity') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select products') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
		                    </div>
		                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
		                        <select class="form-control">
		                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select services') ?></option>
		                            <option>1</option>
		                            <option>2</option>
		                            <option>3</option>
		                            <option>4</option>
		                        </select>
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