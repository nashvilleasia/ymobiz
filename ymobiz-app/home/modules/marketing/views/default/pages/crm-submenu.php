<ul class="list-inline ymo-nav-right">
	<li class="active">
		<a class="ymo-icon-info active" href="/marketing">
			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','info') ?>
		</a>
	</li>
	<li>
		<a class="ymo-icon-tasks" href="/marketing/crm-tasks">
			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','tasks') ?>
		</a>
	</li>
	<li>
		<a class="ymo-icon-contact" href="/marketing/crm-contact-chat">
			<?php echo Yii::$app->getModule('marketing')->ymoTranslate->t('marketing','app','contact') ?>
		</a>
	</li>
</ul>
