<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="col-xs-12 ymo-user-log ymo-nopadding">

		<!--column-left-->
		<?php echo \Yii::$app->view->render('user-sidebar') ?>
		<!--column-left-->
		
		<!--column-right-->
		<div class="col-xs-8 ymo-aside-right ymo-nopadding">
			<div class="col-xs-12 ymo-read-mail ymo-nopadding">
			
				<div class="col-xs-7 ymo-menu-right ymo-nopadding">
					<?php echo $this->render('user-menu') ?>
				</div>
			
				<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
					<div class="col-xs-12 ymo-aside ymo-nopadding">
					
						<div class="col-xs-12 ymo-title-mail ymo-nopadding">
							<img src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
							<h4><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','lorem ipsum dolor sit a lorem ipsum dolor sit amet?') ?></h4>
							<span>03.012013 | 12:30</span>
							
	                     	<hr/>
	                     	
						</div>
	                         
						 <div class="col-xs-12 ymo-text-mail ymo-nopadding">
						 	<p>
						 		<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','
			                  		Lorem ipsum dolor sit amet,<br/><br/>
			                        consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
			                        fugiat nulla pariatur.<br/>
			                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
			                        id est laborum.<br/>
			                        consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
			                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
			                        eu fugiat nulla pariatur.<br/>
			                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
			                        id est laborum.<br/>
			                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
			                        id est laborum.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
			                        deserunt mollit anim id est laborum.<br/>
			                        consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
						 		') ?>
							</p>
						</div>
					
					</div>
				</div>
					
				<div class="col-xs-12 ymo-footer-right ymo-nopadding">
				
					<div class="col-xs-12 ymo-menu-left ymo-nopadding">
						<a class="ymo-icon-email" href="/backoffice/user-contact">
							<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','back to inbox') ?>
						</a>
					</div>
				
					<div class="col-xs-12 ymo-menu-right ymo-nopadding">
						<ul class="list-inline">
					        <li class="active">
					            <a class="ymo-icon-reply" href="#">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','reply') ?>
					            </a>
					        </li>
					        <li>
					            <a class="ymo-icon-forward" href="#">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','forward') ?>
					            </a>
					        </li>
					        <li>
					            <a class="ymo-icon-delete" href="#">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','delete mail') ?>
					            </a>
					        </li>
						</ul>
					</div>
					
				</div>
				
			</div>			
		</div>
		<!--column-right-->
	
	</div>
</div>