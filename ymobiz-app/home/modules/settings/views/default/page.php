<a href="#content" class="sr-only"><?php echo Yii::$app->getModule('settings')->ymoTranslate->t('settings','app','Skip to main content') ?></a>
<div id="wrap" class="container-fluid ymo-nopadding">
    <div class="container ymo-container ymo-nopadding">
        <?php echo \Yii::$app->view->render('header') ?>
        <div class="row ymo-nomargin">
        <div class="col-md-12 ymo-body ymo-nopadding">
            <?php echo $page ?>
        </div>
    </div>
</div>
</div>
<!--<div id="footer">
    <div class="container ymo-container">
        <?php /*echo \Yii::$app->view->render('footer') */?>
    </div>
</div>-->