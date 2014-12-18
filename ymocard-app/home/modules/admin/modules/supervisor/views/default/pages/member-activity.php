<?php 

use ymobiz\models\common\ymoClientsActivity;
use ymobiz\components\ymoTools;
use common\models\ymoCards;
use common\models\forms\ymoMemberForm;

$model = new ymoMemberForm;
$viewMembers = json_decode(json_encode($model->viewMembers(),true));

if($viewMembers!=false){

	$members = $viewMembers;
	
	echo ymoTools::preloadModal([
		['id'=>'more-activity','size'=>'md', 'module' => 'admin/modules/supervisor'],
	]);

?>


<!-- Start ymo-card-activity-->
<div class="col-md-12 ymo-card-activity ymo-member-activity ymo-nopadding" style="margin-top: 25px;">

	<h5 class="ymo-title-b">
		<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','member track record:')?>
	</h5>
	
	 <ul class="col-md-12 ymo-nopadding" style="margin-left: 15px;">
		<?php 
            $model = new ymoClientsActivity();
            echo $model->getListActivity([
             	'limit' => 5
            ],$members->id);
        ?>
    </ul>
    <?php if($model->findOne(['user_id'=>$members->id])){?>
	<div class="col-md-12 ymo-see-more">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" data-action="more-activity" data-size="sm">
	        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more')?>
	        <span class="caret"></span>
	    </a>
	</div>
	<?php }?>
	
</div>
<!-- End ymo-card-activity-->

<?php 
	}
?>