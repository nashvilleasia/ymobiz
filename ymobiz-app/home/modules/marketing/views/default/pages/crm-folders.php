<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
		<?php echo \Yii::$app->view->render('crm-sidebar-contact') ?>
	<!--ymo-column-left-->
	
	<!--ymo-column-right-->
	<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		<div class="col-xs-12 ymo-folders ymo-nopadding">
		
			<div class="col-md-12 ymo-menu-left ymo-nopadding">
				<ul class="list-inline ymo-nav-left">
					<li>
						<a class="ymo-icon-chat active" href="#">
							<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','chat') ?>
						</a>
					</li>
					<li>
						<a class="ymo-icon-mail" href="/marketing/crm-contact-mail">
							<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','mail') ?>
						</a>
					</li>
				</ul>
			</div>
		
			<div class="col-xs-7 ymo-menu-right ymo-nopadding">
				<?php echo $this->render('crm-submenu') ?>
			</div>
			
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
				
				<div class="col-md-12 ymo-table-contact ymo-scroll ymo-nopadding">
					<table class="ymo-table-message table table-responsive">
						<tbody>
	                        <tr style="display: flex;">
	                             <td width="75%">
	                                 <div class="custom-checkbox ymo-right-block list-inline">	
									 	<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
											</label>
										 </div>
									  </div>
	                                 <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
	                             </td>
	                             <td width="25%">
	                                 <span>20 <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','messages') ?></span>
	                             </td>
	                        </tr>
	                        <tr style="display: flex;">
	                             <td width="75%">
	                                 <div class="custom-checkbox ymo-right-block list-inline">	
									 	<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
											</label>
										 </div>
									  </div>
	                                 <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
	                             </td>
	                             <td width="25%">
	                                 <span>20 <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','messages') ?></span>
	                             </td>
	                        </tr>
	                        <tr style="display: flex;">
	                             <td width="75%">
	                                 <div class="custom-checkbox ymo-right-block list-inline">	
									 	<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
											</label>
										 </div>
									  </div>
	                                 <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
	                             </td>
	                             <td width="25%">
	                                 <span>20 <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','messages') ?></span>
	                             </td>
	                        </tr>
	                        <tr style="display: flex;">
	                             <td width="75%">
	                                 <div class="custom-checkbox ymo-right-block list-inline">	
									 	<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
											</label>
										 </div>
									  </div>
	                                 <p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
	                             </td>
	                             <td width="25%">
	                                 <span>20 <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','messages') ?></span>
	                             </td>
	                        </tr>
	                        <tr style="display: flex;">
	                             <td>
	                                 <div class="custom-checkbox ymo-right-block list-inline">	
									 	<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
											</label>
										 </div>
									  </div>
									  <form action="">
									  	<div class="input-group">
									    	<input type="text" class="form-control ymo-folder-name" placeholder="new folder name">
									      	<span class="input-group-btn">
									        	<button class="btn ymo-btn-pink" type="button">save</button>
									      	</span>
									  	</div>
									  </form>
								 </td>
	                        </tr>
                    	</tbody> 
					</table>
				</div>
				
				<div class="col-md-12 ymo-table-group ymo-nopadding ymo-panel">
                	<hr/>
                	
                	<div class="col-md-4 ymo-search ymo-nopadding">
		             	<input type="text" name="search" class="form-control ymo-search-md" placeholder="search">
						<input type="submit" name="magnifier" class="ymo-magnifier-md" value="">
		             </div>
				</div>
				
			</div>
			
			<div class="col-xs-12 ymo-footer-right ymo-nopadding">
			
				<div class="col-md-12 ymo-menu-left ymo-nopadding">
					<a class="ymo-icon-email" href="/marketing/crm-contact-mail">
						<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','back to inbox') ?>
					</a>
				</div>
				
				<div class="col-xs-12 ymo-menu-right ymo-nopadding">
					<ul class="list-inline">
				        <li class="active">
				            <a class="ymo-icon-plus active" href="#"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','new folder') ?></a>
				        </li>
				        <li>
				            <a class="ymo-icon-delete" href="#"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','delete folder') ?></a>
				        </li>
					</ul>
				</div>
				
			</div>
			
		</div>
	</div>
	<!--ymo-column-right-->
	
</div>