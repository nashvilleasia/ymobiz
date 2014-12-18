<!--ymo-column-left-->
<div class="col-xs-4 ymo-aside-left ymo-nopadding">
	<div class="ymo-sidebar-sms">
		
		<div class="col-xs-12 ymo-sidebar-general ymo-nopadding">
			
			<form action="">
		
				<div class="col-xs-12 ymo-sidebar-group ymo-scroll ymo-nopadding">
					<div class="col-xs-12 ymo-sidebar ymo-nopadding">
					
						<?php echo \Yii::$app->view->render('sms-menu') ?>
					
						<div class="col-xs-12 ymo-group-list ymo-nopadding">
	                        <select class="form-control">
	                            <option>250 <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sms pack') ?> (10.00 USD)</option>
	                            <option>1</option>
	                            <option>2</option>
	                            <option>3</option>
	                            <option>4</option>
	                        </select>
	                    </div>
	                   
	                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
	                        <select class="form-control">
	                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','select payment account') ?></option>
	                            <option>1</option>
	                            <option>2</option>
	                            <option>3</option>
	                            <option>4</option>
	                        </select>
	                    </div>
	              
	                    <div class="col-xs-12 ymo-link-budget ymo-nopadding">
	                        <button class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','Buy sms packs') ?></button>
	                        <a href="#">
	                            <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','view billing info') ?>
	                        </a>
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