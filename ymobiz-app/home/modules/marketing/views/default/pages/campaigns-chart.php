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
						
							<div class="col-xs-12 ymo-campaigns-chart ymo-nopadding">
								<div class="col-xs-5 ymo-box-chart ymo-nopadding">
				                    <div class="col-xs-12 ymo-group-list ymo-nopadding">
				                        <select class="form-control">
				                            <option><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','average cost per click') ?></option>
				                            <option>1</option>
				                            <option>2</option>
				                            <option>3</option>
				                            <option>4</option>
				                        </select>
				                    </div>
				                </div>
				
				                <hr/>
				                
				                <ul class="checkbox-group list-inline">
									<li>     	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
												<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','extra budget preview') ?>
											</label>
										</div>
									</li>
									<li> 
										<div class="checkbox"> 
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
										 		<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','view chart') ?>
											</label>
										</div>
									</li>
								</ul>
				        	</div>
					
						</div>
					</div>
			
	                <div class="col-xs-12 ymo-buttons-sidebar ymo-nopadding">
	                     <div class="col-xs-6 ymo-value ymo-nopadding">
	                     	<input type="text" class="form-control input-sm" placeholder="00.00">
	                     	<label>USD</label>
	                     </div>
		                <button type="button" class="btn ymo-blue-gradient"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','add extra budget') ?></button>
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