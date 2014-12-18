<?php 

use mcms\isloading\Isloading;
use mcms\maskmoney\MaskMoney;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use common\models\ymoClientsFiles;
use common\models\forms\ymoMemberForm;
use common\models\ymoClients;
use ymobiz\components\ymoTools;
use common\models\forms\ymoEmissionForm;
use common\models\grid\ymoCardsEmission;

$model = new ymoCardsEmission();
$viewCards = $model->viewEmissionCard();

?>
<?php $this->title = Yii::$app->getModule('site')->ymoTranslate->t('admin/modules/supervisor','form','Emission - ' . Yii::$app->name) ?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super-emission ymo-Panel">

            <?php echo $this->render('emission-table') ?>

            <!-- Start ymo-column-right-->
            <div class="col-md-6 ymo-column-right ymo-nopadding ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-nopadding ymo-Panel">
                
					<?php
					if($viewCards->one()!=false){
						
						$cards = $viewCards->one();
					
					?>
					
                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card name: ')?></strong>
                                <?=Inflector::camel2words($cards->title . ' ' . $cards->name)?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card number: ')?></strong>
                                <?php echo ymoCardsEmission::hideCardNumber($cards->cardnumber,'3','3') ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card status: ')?></strong>
                                <?=$cards->status_code?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','order date: ')?></strong>
                                <?=date("jS F Y",$cards->ordersOne->created_at)?>
                            </li>
                            <?php if($cards->ordersOne->payment_id==2){?>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card name: ')?></strong>
                                <?=($cards->ordersOne) ? $cards->ordersOne->card_name : false?>
                            </li>
                            <?php }?>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','compliance: ')?></strong>
                                <?=$cards->ordersOne->status_compliance?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment: ')?></strong>
                                <?=$cards->ordersOne->status_treasury?>
                            </li>
                        </ul>
                        <?php
		                      echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','download card details'),[
		                         'class' => 'btn ymo-btn-logout',
		                      	 'disabled' => 'disabled'	
		                  	]);
		                ?>
                    </div>
                    <!--ymo-card-details-->
                    
                    <?php 
                    	if( ymoCardsEmission::checkEmission($cards->id)!=false){
                    		
                    		$emissionModel = new ymoEmissionForm();
                    		$emissionModel->scenario ='SupervisorSaveEmission';
                    		
                    		$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
                    			'id' => 'SaveEmission',
                    			'action' => '/supervisor/save-emission',
                    			'model' => $emissionModel,
                    			'pluginOptions' => [
                    				'dataType' => 'json',
                    				'resetForm' => false,
                    				'data' => [
                    					'cardid' => $cards->id
                    				]	
                    			],
                    			'customCallbacks' => [
                    				'complete' => new \yii\web\JsExpression("
					            	var obj = JSON.parse(event.responseText);
					            	if(obj.status === 200){
					        			console.log(obj.message);
					        			".Isloading::widget([
		                    				'id' => 'response-emission',
		                    				'pluginOptions' => [
		                    					'text' => Yii::t('app','Generate your new card')
		                    				 ],
		                    				'response' => new \yii\web\JsExpression('
							        			jQuery(".ymo-json-response").html(obj.content);
							        			//jQuery("#NewMember").resetForm();
							        			//$("#NewMember :input[type=file]").fileinput("reset");
												$.isLoading("hide");
							        		')
		                    			 ])."
					             	}else if(obj.status === 500){
					        			jQuery('.ymo-json-response').html(obj.content);
					             	}
					            	 return false;
					        "	),
                    		],
                    		'loadingOptions' => "
						    {
						        text: '".Yii::t('app','Loading')."',
						        'class': \"fa fa-cog fa-spin fa-lg\",
						        'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
						    }"
                    	]);
                    ?>
                    
                    <!--ymo-compliance-->
                    <div class="col-md-12 ymo-compliance ymo-nopadding ymo-Panel">
                    	<ul class="col-md-6 col-md-offset-2 text-right checkbox-group list-inline ymo-nopadding ymo-Panel" style="margin-top:10px;">
			                <li>
			                	<div class="ymo-nopadding">
						            <?= $form->field($emissionModel, 'group', ['template'=>'{input}', 'options' => [
			                    		'class' => 'col-md-12 checkbox ymo-nopadding',
			                    	]])->checkboxList($emissionModel::emissionSendersSupervisor(), [
			                    		'inline' => true,	
			                    		'itemOptions' => [
			                    			'class' => 'ymo-nopadding ymo-checkbox',
				                    		'unchecked'=>'0',	
				                    		'labelOptions' => [
				                    			'class' => ' ymo-nopadding ymo-radio-label',
			                    				'style' => ' margin-right: 15px;',
				                    		],
			                    		]		
			                    	]);?>
						        </div>
			                </li>
			            </ul>
                        <?php
		                      echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','order emission'),[
		                         'class' => 'ymo-btn-light-pink',
		                  	]);
		                ?>
                    </div>
                    <!--ymo-compliance-->
                    
                    <?php \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
                    
                    <?php } ?>
                    
                    <?php 
						}else{
							echo '<div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
									<ul class="col-md-12 ymo-Panel"><li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no registered card').'</li></ul>
								</div>';	
						}
					?>

                </div>
            </div>
            <!-- End ymo-column-right-->

            <?php if($viewCards->one()!=false){ echo $this->render('comments'); } ?>

        </div>
    </div>
</div>