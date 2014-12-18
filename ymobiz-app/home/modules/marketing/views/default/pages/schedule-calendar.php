<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
		<?php echo \Yii::$app->view->render('schedule-sidebar') ?>
	<!--ymo-column-left-->
	
	<!--ymo-column-right-->
	<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		<div class="col-xs-12 ymo-calendar ymo-nopadding">
	
			<div class="col-xs-12 ymo-menu-left ymo-nopadding">
				<ul class="list-inline ymo-nav-left">
					<li class="active">
                    	<a href="#">
                        	<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('arrow_prev.png','img/icons')?>" alt="...">
                     	</a>
                 	</li> 
                 	<li> 
                     <?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','january') ?> 2013
                 	</li> 
                    <li>
                    	<a href="#">
                        	<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('arrow_next.png','img/icons')?>" alt="...">
                     	</a>
                 	</li>
				</ul>
			</div>
		
			<div class="col-xs-12 ymo-menu-right ymo-nopadding">
				<?php echo $this->render('schedule-menu') ?>
			</div>
	
			<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
				<div class="col-xs-12 ymo-aside ymo-nopadding">
				
					<div class="ymo-calendar-image">
                    	<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('calendar-month.png','img')?>" alt="...">
                	</div>
				
				</div>
			</div>
		
			<div class="col-xs-12 ymo-footer-right ymo-nopadding">
				<div class="col-xs-12 ymo-menu-right ymo-nopadding">
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
	</div>
	<!--ymo-column-right-->
	
</div>