<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--column-left-->
	<div class="col-xs-4 ymo-aside-left ymo-nopadding">
		<div class="ymo-invoices-sidebar">
		
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
			
					<div class="col-xs-12 ymo-table-general ymo-scroll ymo-nopadding">
						<div class="col-xs-12 ymo-table ymo-nopadding">
						
							<?php echo \Yii::$app->view->render('invoices-menu') ?>
					
							
							<div class="col-xs-12 ymo-invoices-options ymo-nopadding">
								<div class="col-md-12 ymo-group-list ymo-nopadding">
			                        <label for=""><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Options') ?></label>
			                        <div class="col-md-12 ymo-nopadding">
			                            <select class="form-control">
			                                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select tax') ?></option>
			                                <option>1</option>
			                                <option>2</option>
			                                <option>3</option>
			                            </select>
			                        </div>
			                    </div>
			                    <div class="col-md-12 ymo-group-list ymo-nopadding">
			                        <label for=""><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','edit') ?>Discount</label>
			                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select discount rate') ?> (%)">
			                    </div>
			                    <div class="col-md-6 ymo-group-list ymo-input-left ymo-nopadding">
			                        <label for=""><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','edit') ?>Reference nr.</label>
			                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','insert number') ?>">
			                    </div>
			
			                    <div class="col-md-6 ymo-group-list ymo-input-right ymo-nopadding">
			                        <label for=""><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','edit') ?>Date</label>
			                        <input type="text" class="form-control input-sm" placeholder="<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select date') ?>">
			                        <input type="submit" name="date" class="ymo-icon-date" value="">
			                    </div>
			                    <div class="col-md-6 ymo-group-list ymo-input-left ymo-nopadding">
			                        <label for=""><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Payment due') ?></label>
			                        <div class="col-md-12 ymo-nopadding">
			                            <select class="form-control">
			                                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select payment due') ?></option>
			                                <option>1</option>
			                                <option>2</option>
			                                <option>3</option>
			                            </select>
			                        </div>
			                    </div>
			
			                    <div class="col-md-6 ymo-group-list ymo-input-right ymo-nopadding">
			                        <label for=""><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','Status') ?></label>
			                        <div class="col-md-12 ymo-nopadding">
			                            <select class="form-control">
			                                <option><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','select status') ?></option>
			                                <option>1</option>
			                                <option>2</option>
			                                <option>3</option>
			                            </select>
			                        </div>
			                    </div>
		                    </div>
						
							</div>
						</div>
			                
					</form>
						
				</div>
			
			</div>
		</div>
		<!--column-left-->
		
		<!--column-right-->
	    <?php echo \Yii::$app->view->render('invoices-table') ?>
	    <!--column-right-->
</div>