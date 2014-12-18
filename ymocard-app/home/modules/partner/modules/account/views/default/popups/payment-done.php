<!-- Modal -->
<div class="popup-dialog ">
    <div class="bs-modal-sm ymo-popup">
        <div class="popup-header">
            <h4 class="modal-title" id="myModalLabel"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','done') ?></h4>
        </div>
        <div class="modal-body popup-body">
		    <div class="row">
			    <div class="col-md-8 popup-text col-md-offset-2">
                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','your payment was successfully submitted.') ?>
                </div>
		    </div>
        </div>
        <div class="modal-footer popup-footer">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <button type="button" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block" data-dismiss="modal" aria-hidden="true">ok</button>
            </div>
        </div>
    </div>
</div>