<?php

$this->registerCss('
    .ymo-wallpaper{
        background: url('.\Yii::$app->getModule('marketing')->ymoTools->imageSrc('wallpaper-marketing.jpg','img').')no-repeat;
        background-size: cover;
        width: 100%;
        height: 118px;
    }
');

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'delete-note','module' => 'marketing','size'=>'sm'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
		<?php echo \Yii::$app->view->render('crm-sidebar-contact') ?>
	<!--ymo-column-left-->

	
	
	<!--ymo-column-right-->
	<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		
		<div class="col-xs-12 ymo-menu-right ymo-nopadding">
			<?php echo $this->render('crm-submenu') ?>
		</div>
	
		<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
			<div class="col-xs-12 ymo-aside ymo-nopadding">
			
				<div class="col-xs-12 ymo-wallpaper ymo-nopadding">
	            	<div class="ymo-profile-marketing">
	                	<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('profile-marketing.jpg','img')?>" alt="...">
	            	</div>
				</div>
				
				<div class="col-xs-12 ymo-profile-notes ymo-nopadding">
	             	<h4><?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','sun infotech') ?></h4>
				
					<span class="ymo-icon-notes">
                    	<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','notes') ?>
                 	</span>
					
					<hr />
					
					<div class="col-xs-12 ymo-notes ymo-scroll ymo-nopadding">
						<div class="col-xs-6 ymo-note-title ymo-nopadding">
							<input type="text" class="form-control" placeholder="<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','note title') ?>">
						</div>
						<p>
							<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','
		                        Lorem ipsum dolor sit amet, consectetur<br/><br/>
		                        - adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br/><br/>
		                        - Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br/><br/>
		                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br/>
		                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
		                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.cupidatat non
		                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. npteur sint occaecat cupidatacupidatat non proident, 
		                        sunt in culpa qui officia deserunt mollit anim id est laborum. sint occaecat cupidatacupidatat non proident, sunt in culpa 
		                        qui officia deserunt mollit anim id est laborum. sint occaecat cupidata.
							') ?>
						</p>
					</div>
					
				</div>
			
			</div>
		</div>
		
		<div class="col-xs-12 ymo-footer-right ymo-nopadding">
			<div class="col-xs-12 ymo-menu-right ymo-nopadding">
				<ul class="list-inline">
			        <li class="active">
			            <a class="ymo-icon-save active" href="#">save note</a>
			        </li>
			        <li>
			            <a class="ymo-icon-email" href="#">email note</a>
			        </li>
			        <li>
			            <a class="ymo-icon-delete" data-action="delete-note" data-size="lg">delete note</a>
			        </li>
				</ul>
			</div>
		</div>
				
	</div>
	<!--ymo-column-right-->	
	
</div>