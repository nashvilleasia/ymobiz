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

				            <ul class="col-xs-12 ymo-campaigns-statistics list-inline ymo-nopadding">
				                <li class="col-xs-5 ymo-statistics-left ymo-nopadding">
				                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','avg price per click') ?></p>
				                    <h4>0.01 USD</h4>
				                </li>
				                <li class="col-xs-5 ymo-statistics-right ymo-nopadding">
				                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','avg price per impr.') ?></p>
				                    <h4>0.001 USD</h4>
				                </li>
				                <li class="col-xs-5 ymo-statistics-left ymo-nopadding">
				                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','total budget spent') ?></p>
				                    <h4>4.55 USD</h4>
				                </li>
				                <li class="col-xs-5 ymo-statistics-right ymo-nopadding">
				                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','total clicks') ?></p>
				                    <h4>22</h4>
				                </li>
				                <li class="col-xs-5 ymo-statistics-left ymo-nopadding">
				                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','total impressions') ?></p>
				                    <h4>220</h4>
				                </li>
				                <li class="col-xs-5 ymo-statistics-right ymo-nopadding">
				                    <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','clicks per impression') ?></p>
				                    <h4>0.1</h4>
				                </li>
				                
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
							</ul>
					
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