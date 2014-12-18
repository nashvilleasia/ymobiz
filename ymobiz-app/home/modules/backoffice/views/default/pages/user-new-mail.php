<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'send-mail','module' => 'backoffice','size'=>'sm'],
    ['id'=>'mail-sent','module' => 'backoffice','size'=>'sm'],
    ['id'=>'save-draft','module' => 'backoffice','size'=>'sm'],
    ['id'=>'draft-saved','module' => 'backoffice','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">
	<div class="ymo-user-log">

		<!--column-left-->
		<?php echo \Yii::$app->view->render('user-sidebar') ?>
		<!--column-left-->
		
		<!--column-right-->
		<div class="col-xs-8 ymo-aside-right ymo-nopadding">
			<div class="col-xs-12 ymo-new-mail ymo-nopadding">
			
				<div class="col-xs-7 ymo-menu-right ymo-nopadding">
					<?php echo $this->render('user-menu') ?>
				</div>
			
				<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
					<div class="col-xs-12 ymo-aside ymo-nopadding">
					
						<div class="col-md-12 ymo-title-mail ymo-nopadding">
	                        <form action="">
	                        	<input type="text" class="form-control ymo-input-title" placeholder="<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','mail subject') ?>">
	                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','to') ?>:</p>
	                             <div class="col-md-4 ymo-search ymo-nopadding">
	                                 <input type="text" name="search" class="form-control ymo-search-md" placeholder="<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','search contacts') ?>">
									 <input type="submit" name="magnifier" class="ymo-magnifier-md" value="">
	                             </div>
	                             <h6><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','add') ?> Bcc/Ccc</h6>
	                         </form>
	                     
	                     	 <hr/>
	                     
	                     </div>
	                         
						 <div class="col-md-12 ymo-text-mail ymo-nopadding">
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
				
					<div class="col-md-12 ymo-menu-left ymo-nopadding">
						<a class="ymo-icon-email" href="/backoffice/user-contact">
							<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','back to inbox') ?>
						</a>
					</div>
				
					<div class="col-xs-12 ymo-menu-right ymo-nopadding">
						<ul class="list-inline">
					        <li class="active">
					            <a class="ymo-icon-save" data-action="save-draft" data-size="lg">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','save draft') ?>
					            </a>
					        </li>
					        <li>
					            <a class="ymo-icon-attachment" href="#">
					            	<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','attachment') ?>
					            </a>
					        </li>
						</ul>
						<a class="btn ymo-btn-pink" data-action="send-mail" data-size="lg">
							<?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','send mail') ?>
						</a>
					</div>
					
				</div>
				
			</div>			
		</div>
		<!--column-right-->
		
	</div>	
</div>