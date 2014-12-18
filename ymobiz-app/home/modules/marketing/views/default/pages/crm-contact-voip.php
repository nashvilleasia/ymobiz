<div class="col-xs-12 ymo-interface ymo-nopadding">

	<!--ymo-column-left-->
		<?php echo \Yii::$app->view->render('crm-sidebar-contact') ?>
	<!--ymo-column-left-->

		
	<!--ymo-column-right-->
	<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		<div class="col-xs-12 ymo-voip ymo-nopadding">
		
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
				<div class="col-xs-12 ymo-aside ymo-nopadding">
				
					<div class="ymo-voip-image">
						<img src="<?php echo \Yii::$app->getModule('marketing')->ymoTools->imageSrc('voip.jpg','img')?>	" alt="" />
					</div>
					
				</div>
			</div>
			
		</div>			
	</div>
	<!--ymo-column-right-->
	
</div>