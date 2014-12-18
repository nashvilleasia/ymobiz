<?php 

use common\models\ymoClientsMessages;
use ymobiz\components\ymoTools;
use common\models\ymoCards;

$model = new ymoCards();
$viewCards = $model->viewCardByClient();

if($viewCards->one()!=false){
	
	$cards = $viewCards->one();

	echo ymoTools::preloadModal([
		['id'=>'more-message','size'=>'md', 'module' => 'cardholder'],
	]);

?>
<!-- Start ymo-card-message-->
                    <div class="col-md-12 ymo-card-message ymo-nopadding">
                        <h5 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','messages:')?>
                        </h5>
                        <ul>
                        	<?php 
					            $model = new ymoClientsMessages();
					            echo $model->getListMessage([
					             	'limit' => 5
					            ]);
					        ?>
                        </ul>
                        
    
    <?php if($model->findOne(['user_id'=>Yii::$app->user->id])){?>
	<div class="col-md-12 ymo-see-more">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" data-action="more-message" data-size="sm">
	        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more')?>
	        <span class="caret"></span>
	    </a>
	</div>
	<?php } ?>
</div>
<!-- End ymo-card-message-->

<?php 
	}
?>