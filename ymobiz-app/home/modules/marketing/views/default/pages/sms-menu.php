<ul class="ymo-menu-edit list-inline ymo-nav-left">
	<li class="active">
		<a href="<?php echo \Yii::$app->urlManager->createUrl('/marketing/advertising-sms') ?>">
			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','budget') ?>
		</a>
	</li>
	<li>
		<a href="<?php echo \Yii::$app->urlManager->createUrl('marketing/sms-target') ?>">
			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','target') ?>
		</a>
	</li>
	<li>
		<a href="<?php echo \Yii::$app->urlManager->createUrl('marketing/sms-info') ?>">
			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','info') ?>
		</a>
	</li>
</ul>
<hr />