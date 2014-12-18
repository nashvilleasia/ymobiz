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
use common\models\forms\ymoTreasuryForm;
use common\models\grid\ymoCardsPayment;

$model = new ymoCardsPayment();
$viewCards = $model->viewPaymentCard();

?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super ymo-Panel">

            <?php echo $this->render('treasury-table') ?>

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
                                <?php echo ymoCardsPayment::hideCardNumber($cards->cardnumber,'3','3') ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card status: ')?></strong>
                                <?=$cards->status_code?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','order date: ')?></strong>
                                <?=date("jS F Y",$cards->ordersOne->created_at)?>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment method: ')?></strong>
                                <?php 
                                	if($cards->ordersOne->payment_id==1){
                                		echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','bank transfer:');
                                	}else{
                               			echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card:');
                                	}
                                ?>
                            </li>
                            
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','trough partner: ')?></strong>
                                <?=$cards->getPartnersById($cards->clientsOne->partner_id,'name')?>
                            </li>
                            
                            <li>
                                <?php if($cards->ordersOne->payment_id==1){?>
                                <!-- <div class="col-md-12 ymo-nopadding ymo-Panel ymo-bank-details" style="margin-top:3px;">
	                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','bank info: ')?></strong><br><br>
                                	<?php echo ymobiz\models\common\ymoPaymentMethods::getMethodsByCondition(['name'=>'bank transfer'])->content; ?>
                                </div> -->
                                <?php }else{?>
                                <div class="col-md-12 ymo-nopadding">
	                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card nº: ')?></strong>
	                                <?=($cards->ordersOne) ? $cards->ordersOne->card_number : false?>
                                </div>
                                <?php }?>
                            </li>
                            
                            <?php if($cards->ordersOne->payment_id==2){?>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card name: ')?></strong>
                                <?=($cards->ordersOne) ? $cards->ordersOne->card_name : false?>
                            </li>
                            <?php }?>
                            
                            <li style="<?=($cards->ordersOne->payment_id==1) ? 'margin-top:-7px;' : ''?>">
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','paid amount: ')?></strong>
                                <?=Yii::$app->formatter->asCurrency($cards->plafond)?> <span style="margin-left: 4px;"><?php echo Yii::$app->formatter->currencyCode ?></span>
                            </li>
                        </ul>
                        <a href="#" class="col-md-offset-9 btn ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','check statement')?></a>
                        <hr/>
                    </div>
                    <!--ymo-card-details-->
					
					 <?php 
                    	if( ymoCardsPayment::checkTreasury($cards->id)!=false){
                    		
                    		$treasuryModel = new ymoTreasuryForm();
                    		$treasuryModel->scenario ='SupervisorSaveTreasury';
                    		
                    		$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
                    			'id' => 'SaveTreasury',
                    			'action' => '/supervisor/save-treasury',
                    			'model' => $treasuryModel,
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
		                    				'id' => 'response-save-treasury',
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
						            <?= $form->field($treasuryModel, 'receipt', ['template'=>'{input}', 'options' => [
			                    		'class' => 'col-md-12 checkbox ymo-nopadding',
			                    	]])->checkboxList($treasuryModel::treasurySendersSupervisor(), [
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
		                      echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','confirm payment'),[
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