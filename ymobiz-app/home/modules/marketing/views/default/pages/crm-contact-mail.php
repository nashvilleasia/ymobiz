<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'delete-mail','module' => 'marketing','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
		<?php echo \Yii::$app->view->render('crm-sidebar-contact') ?>
	<!--ymo-column-left-->

	<!--ymo-column-right-->	
	<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		<div class="col-xs-12 ymo-mail ymo-nopadding">
		
			<div class="col-md-12 ymo-menu-left ymo-nopadding">
				<ul class="list-inline ymo-nav-left">
					<li>
						<a class="ymo-icon-chat active" href="/marketing/crm-contact-voip">
							<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','voip') ?>
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
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="0" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="1">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="2">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="3">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="4" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="5" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="6" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="7">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="8">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="9">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="10" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="11" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="12" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="13">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="14">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="15">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="16">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="17" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="18" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="19" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="20" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="21" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
                  			<tr style="display: flex;">
                         		<td width="75%">
                            		<div class="checkbox-group list-inline">	
										<div class="checkbox">
											<label>
										 		<input type="checkbox" class="ymo-checkbox" name="ymoCheckbox" value="22" checked="checked">
											</label>
										</div>
									</div>
                          			<img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            		<p><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></p>
                        		</td> 
                        		<td width="25%">
                             		<span>03.012013 | 12:30</span>
                         		</td> 
                     		</tr>
						</tbody>
					</table>
				</div>
				
				<div class="col-md-12 ymo-table-group ymo-nopadding ymo-panel">
             		<hr/> 
            
		             <div class="col-md-7 ymo-pagination ymo-nopadding">
		                 <ul class="pagination">
		                     <li>
		                         <a href="#">previous</a>
		                     </li>
		                     <li>
		                         <a href="#">«</a>
		                     </li>
		                     <li>
		                         <a href="#">1</a>
		                    </li>
		                     <li>
		                         <a href="#">2</a>
		                     </li>
		                     <li>
		                         <a href="#">3</a>
		                     </li>
		                     <li>
		                         <a href="#">4</a>
		                     </li>
		                     <li>
		                         <a href="#">5</a>
		                     </li>
		                     <li>
		                         <a href="#">»</a>
		                     </li> 
		                     <li> 
		                         <a href="#">next</a>
		                     </li> 
		                 </ul> 
		             </div>
		            
		             <div class="col-md-4 ymo-search ymo-nopadding">
		             	<input type="text" name="search" class="form-control ymo-search-md" placeholder="search">
						<input type="submit" name="magnifier" class="ymo-magnifier-md" value="">
		             </div> 
		         </div>
				
			</div>
			
			<div class="col-xs-12 ymo-footer-right ymo-nopadding">
			
				<div class="col-md-12 ymo-menu-left ymo-nopadding">
					<ul class="list-inline ymo-nav-left">
						<li>
							<a class="ymo-icon-folder active" href="/marketing/crm-folders">
								<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','folders') ?>
							</a>
						</li>
						<li>
							<a class="dropdown-toggle ymo-move" data-toggle="dropdown" href="#">
                     			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','move to folder') ?>
                     			<span class="caret"></span>
                 			</a>
							<!--<ul class="dropdown-menu"> -->
							<!--<li><a href="#">my folder</a></li> -->
							<!--<li><a href="#">others</a></li> -->
							<!--</ul> -->
						</li>
					</ul>
				</div>
			
				<div class="col-xs-12 ymo-menu-right ymo-nopadding">
					<ul class="list-inline">
				        <li class="active">
				            <a class="ymo-icon-plus active" href="/marketing/crm-new-mail"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','new mail') ?></a>
				        </li>
				        <li>
				            <a class="ymo-icon-delete" data-action="delete-mail" data-size="lg"><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','delete mail') ?></a>
				        </li>
					</ul>
				</div>
			</div>
		
		</div>		
	</div>
	<!--ymo-column-right-->
	
</div>