<?php 

use ymobiz\models\common\ymoClientsActivity;
use common\models\forms\ymoMemberForm;

$model = new ymoMemberForm;
$viewMembers = json_decode(json_encode($model->viewMembers(),true));
$members = $viewMembers;

?>
<!-- Modal -->
<div class="popup-dialog ">
    <div class="bs-modal-md ymo-popup">
        <div class="popup-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="more-activity"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','all activities')?></h4>
        </div>
        <div class="modal-body popup-body">
		    <div class="row">
		    	<div class="col-md-12 ymo-card-activity ymo-nopadding" style="margin-top: 0px; height: 200px; overflow: auto;">
					<ul>
					<?php 
                    	$model = new ymoClientsActivity();
                    	echo $model->getListActivity(false,$members->id);
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