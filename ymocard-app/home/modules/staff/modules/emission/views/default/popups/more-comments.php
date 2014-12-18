<?php 

use ymobiz\models\common\ymoClientsActivity;
use common\models\ymoClientsMessages;
use ymobiz\auth\ymoUser;
use yii\helpers\Url;

$checkMessages = ymoClientsMessages::find()->where(['card_id'=>$cardid,'module'=>$moduleid])->orderBy('created_at desc')->all();

?>
<!-- Modal -->
<div class="popup-dialog ">
    <div class="bs-modal-sm ymo-popup">
        <div class="popup-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="more-activity"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','all comments')?></h4>
        </div>
        <div class="modal-body popup-body">
		    <div class="row">
		    	<div class="col-md-12 ymo-comments ymo-nopadding ymo-Panel" style="margin-top: 0px; max-height: 400px; overflow: auto;">
		    	 <?php
					if($checkMessages!=false){
							
						foreach ($checkMessages as $message){
							
							if($message!='cc'){
							
							$client = ymoUser::findOne($message->user_id);
							
								if($client){
							
					?>
				     
				    <!--ymo-post-->
				    <div class="col-md-12 ymo-post ymo-nopadding ymo-Panel">
				        <ul class="list-inline ymo-nopadding">
				            <li>
				                <a href="<?=Url::toRoute(['default/members','memberid' => $message->user_id]) ?>" data-pjax=0 target="_blank"><?=$client->clients->ufirstname . ' ' . $client->clients->ulastname?></a>
				            </li>
				            <li>
				                <?=Yii::$app->formatter->asDate($message->created_at,'php:d.m.Y')?>
				            </li>
				            <li>
				            	<?=Yii::$app->formatter->asDate($message->created_at,'php:H:m a')?>
				            </li>
				            <li>
				                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','message title ') ?><?=$message->title?>
				            </li>
				        </ul>
				        <p class="ymo-text-a">
				            <?=$message->message?>
				        </p>
				    </div>
				    <!--ymo-post-->
				    <?php 
								}
							}
						} 
					?>
				    
				    <?php 
						}else{
							echo '<div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
									<ul class="col-md-12 ymo-Panel"><li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no messages from this card').'</li></ul>
								</div>';	
						}
					?>
        		</div>
		    </div>
        </div>
    </div>
</div>
<!-- Modal -->