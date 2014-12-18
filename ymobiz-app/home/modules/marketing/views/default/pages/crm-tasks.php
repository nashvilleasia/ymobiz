<?php

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'new-task','module' => 'marketing','size'=>'md'],
]);
?>

<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
		<?php echo \Yii::$app->view->render('crm-sidebar-contact') ?>
	<!--ymo-column-left-->

	
	<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		<div class="col-xs-12 ymo-tasks ymo-nopadding">
		
			<div class="col-xs-12 ymo-menu-right ymo-nopadding">
				<?php echo $this->render('crm-submenu') ?>
			</div>
	
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
				<div class="col-xs-12 ymo-aside ymo-nopadding">
				
					<div class="ymo-tasks-image">
						<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('tasks.png','img') ?>" alt="...">
					</div>
				
				</div>
			</div>
		
			<div class="col-xs-12 ymo-footer-right ymo-nopadding">
				<div class="col-xs-12 ymo-menu-right ymo-nopadding">
					<ul class="list-inline">
				        <li class="active">
				            <a class="ymo-icon-plus active" data-action="new-task" data-size="lg">
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
	</div>
	<!--ymo-column-right-->
	
</div>