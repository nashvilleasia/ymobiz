<?php 
	
use mcms\isloading\Isloading;
use common\models\ymoClientsMessages;
use common\models\grid\ymoCardsSupervisor;
use ymobiz\auth\ymoUser;
use yii\helpers\Html;
use yii\helpers\Url;
use ymobiz\components\ymoTools;

$model = new ymoCardsSupervisor();
$viewCards = $model->viewCard();

if($viewCards->one()){

$checkMessages = ymoClientsMessages::find()->where(['card_id'=>$viewCards->one()->id,'module'=>Yii::$app->controller->action->id])->orderBy('created_at desc')->limit(5)->all();
				
echo ymoTools::preloadModal([
	['id'=>'more-comments','size'=>'lg', 'module' => 'staff/modules/call','params'=> ['cardid'=>$viewCards->one()->id,'moduleid'=>Yii::$app->controller->action->id]],
]);

$messagesModel = new ymoClientsMessages();
$messagesModel->scenario = 'SupervisorSendMessages';

?>

<!--Start comments-->
<div class="col-md-12 ymo-comments ymo-nopadding ymo-Panel">
    <hr/>

    <!--form-->
     <?php 
                
                	$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
					    'id' => 'sendMessageSupervisor',
					    'action' => '/staff-call/send-message', 
                		'options' => [
					        'enctype'=>'multipart/form-data'
					    ],
					    'model' => $messagesModel,
					    'pluginOptions' => [
					        'dataType' => 'json',
					        'resetForm' => false,
					    	'data' => [
					    		'cardid' => $viewCards->one()->id,
					    		'module' => Yii::$app->controller->action->id	
					    	]		
					    ],
					    'customCallbacks' => [
					        'complete' => new \yii\web\JsExpression("
					             var obj = JSON.parse(event.responseText);
					             if(obj.status === 200){
					        		console.log(obj.message);
					        		".Isloading::widget([
					        			'id' => 'response-sendMessageSupervisor',
					        			'pluginOptions' => [
											'text' => Yii::t('app','Generate your new card')
										],	
					        			'response' => new \yii\web\JsExpression('
					        				jQuery(".ymo-json-response").html(obj.content);
					        				jQuery("#sendMessageSupervisor").resetForm();		
											$.isLoading("hide");
					        			')
									])."
					             }else if(obj.status === 500){
					        		jQuery('.ymo-json-response').html(obj.content);
					             }
					             return false;
					        "),
					    ],
					    'loadingOptions' => "
					    {
					        text: '".Yii::t('app','Loading')."',
					        'class': \"fa fa-cog fa-spin fa-lg\",
					        'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
					    }"
					]);
                	
                ?> 
                
                
                
        <div class="col-md-6 form-group ymo-nopadding ymo-group">
           <?= $form->field($messagesModel, 'title', ['template'=>'{input}{error}','options' => [
                   'class' => 'col-md-12 ymo-nopadding ymo-group'
           ]])->textInput(['class'=>'form-control ymo-input','placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site','form','message title')]) ?>
        </div>
        
        <div class="col-md-5 col-md-offset-1 ymo-nopadding ymo-Panel">
            <div class="col-md-2 ymo-send ymo-nopadding ymo-Panel">
                <label for="">CC to:</label>
            </div>
            <ul class="col-md-6 checkbox-group list-inline ymo-nopadding ymo-Panel" style="margin-top:10px;">
                <li>
                	<div class="ymo-nopadding">
			            <?= $form->field($messagesModel, 'group', ['template'=>'{input}', 'options' => [
                    		'class' => 'col-md-12 checkbox ymo-nopadding',
                    	]])->checkboxList($messagesModel::messageSendersSupervisor(), [
                    		'inline' => true,	
                    		'itemOptions' => [
                    			'class' => 'ymo-nopadding ymo-checkbox',
	                    		'unchecked'=>'0',	
	                    		'labelOptions' => [
	                    			'class' => ' ymo-nopadding ymo-radio-label',
                    				'style' => ' margin-right: 15px;',
	                    		],
				            	'label'=>Yii::$app->getModule('site')->ymoTranslate->t('site','form','user'),
				            	'value'=>'user',
                    		]		
                    	]);?>
			        </div>
                </li>
            </ul>
            <?php
                 echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','add comment'),[
                      'class' => 'btn ymo-btn-logout',
                 ]);
             ?>
        </div>
        <div class="col-md-12 form-group ymo-nopadding ymo-group">
        	<?= $form->field($messagesModel, 'message', ['template'=>'{input}{error}','options' => [
                   'class' => 'col-md-12 ymo-nopadding ymo-group'
           ]])->textArea([
           		'class'=>'form-control ymo-input','cols'=>'30','rows'=>'10',
           		'style'=>'padding-left: 10px;',
           		'placeholder'=>Yii::$app->getModule('site')->ymoTranslate->t('site','form','text message'),
        	]) ?>
        </div>
        
     <?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
    <!--form-->

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
                <a href="<?=Url::toRoute(['default/members','memberid' => $message->user_id]) ?>" data-pjax=0 target="_blank"><?=$client->email?></a>
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

    <!--ymo-see-more-->
    <div class="col-md-12 ymo-see-more text-center">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" data-action="more-comments" data-size="lg">
        	<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more comments') ?>
            <span class="caret"></span>
        </a>
    </div>
    <!--ymo-see-more-->
    
    <?php 
		}else{
			echo '<div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
					<ul class="col-md-12 ymo-Panel"><li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no messages from this card').'</li></ul>
				</div>';	
		}
	?>

</div>
<!--End comments-->

<?php } ?>
