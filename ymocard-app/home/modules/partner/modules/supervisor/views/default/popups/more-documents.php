<?php 

use common\models\auth\ymoAccountSettings;
use common\models\forms\ymoPartnerMemberForm;
use common\models\ymoClients;

?>
<!-- Modal -->
<div class="popup-dialog ">
    <div class="bs-modal-sm ymo-popup">
        <div class="popup-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="more-documents"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','all documents')?></h4>
        </div>
        <div class="modal-body popup-body">
		    <div class="row">
			    <div class="col-md-12 ymo-card-documents" style="margin-top: 0px; height: 200px; overflow: auto;">
			    	<ul class="col-md-12 ymo-card-form ymo-Panel">
                    <?php 
                    	$documents = new ymoPartnerMemberForm();
                    	
                    	if(method_exists($documents->documents, 'one')){
                    		echo $documents->documents->one()->getListUploadDocs(false,(@$clientid) ? $clientid : ymoClients::findOne(['user_id'=>ymoPartnerMemberForm::findMemberId()])->user_id);
                    	}else{
                    		echo $documents->documents->getListUploadDocs(false,(@$clientid) ? $clientid : @ymoClients::findOne(['user_id'=>ymoPartnerMemberForm::findMemberId()])->user_id);
                    	}
                    ?>
                    </ul>
                </div>
		    </div>
        </div>
        <div class="modal-footer popup-footer">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <button type="button" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block close-modal" data-dismiss="modal" aria-hidden="true">ok</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->