<a href="#content" class="sr-only"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Skip to main content') ?></a>
<div id="wrap" class="container-fluid ymo-nopadding">
        <?php echo $this->render('header') ?>
    <div class="container ymo-container ymo-nopadding">
        <div class="row ymo-nomargin">
	        <div class="col-md-12 ymo-body ymo-nopadding">
	            <?php echo $page ?>
	        </div>
	    </div>
	</div>
</div>
<!-- <div id="footer">
    <div class="container ymo-container">
        <?php echo $this->render('footer') ?>
	</div> 
</div>-->