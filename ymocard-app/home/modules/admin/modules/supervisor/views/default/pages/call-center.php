<?php 

use common\models\grid\ymoCardsSupervisor;
use mcms\isloading\Isloading;
use mcms\maskmoney\MaskMoney;
use yii\helpers\Inflector;
use ymobiz\models\common\ymoCountries;
use ymobiz\models\common\ymoStates;
use common\models\ymoClientsFiles;
use common\models\forms\ymoMemberForm;
use common\models\ymoClients;
use ymobiz\components\ymoTools;

$model = new ymoCardsSupervisor();
$viewCards = $model->viewCard();

?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super ymo-Panel">

            <?php echo $this->render('call-center-table') ?>

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
                                <?php echo ymoCardsSupervisor::hideCardNumber($cards->cardnumber,'3','3') ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card status: ')?></strong>
                                <?=$cards->status_code?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','order date: ')?></strong>
                                <?=date("jS F Y",$cards->ordersOne->created_at)?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment method: ')?></strong>
                                <?php if($cards->ordersOne->payment_id==1){?>
                                <p><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','bank transfer')?></p>
                                <?php }else{?>
                                <p><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card')?></p>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','nr: ')?></strong>
                                <?=($cards->ordersOne) ? $cards->ordersOne->card_number : false?>
                                <?php }?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','trough partner: ')?></strong>
                                <?=$cards->getPartnersById($cards->clientsOne->partner_id,'name')?>
                            </li>
                            <?php if($cards->ordersOne->payment_id==2){?>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card name: ')?></strong>
                                <?=($cards->ordersOne) ? $cards->ordersOne->card_name : false?>
                            </li>
                            <?php }?>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','compliance: ')?></strong>
                                <?=($cards->filesOne) ? $cards->ordersOne->status_compliance : Yii::$app->getModule('site')->ymoTranslate->t('site','app','not exist files for this compliance ')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment: ')?></strong>
                                <?=($cards->ordersOne) ? $cards->ordersOne->status_treasury : false?>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','user personal details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','first name: ')?></strong>
                                <?=Inflector::camel2words($cards->getClientsById($cards->clientsOne->user_id,'ufirstname'))?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','last name: ')?></strong>
                                <?=Inflector::camel2words($cards->getClientsById($cards->clientsOne->user_id,'ulastname'))?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','date of birth: ')?></strong>
                                 <?=($cards->getClientsById($cards->clientsOne->user_id,'dob')) ? date("jS F Y",$cards->getClientsById($cards->clientsOne->user_id,'dob')) : false?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','gender: ')?></strong>
                                 <?=$cards->getClientsById($cards->clientsOne->user_id,'gender')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country of birth: ')?></strong>
                                 <?=($cards->getClientsById($cards->clientsOne->user_id,'countryob_id')) ? ymoCountries::findOne($cards->getClientsById($cards->clientsOne->user_id,'countryob_id'))->name : false?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country of nationality: ')?></strong>
                                 <?=($cards->getClientsById($cards->clientsOne->user_id,'countrynat_id')) ? ymoCountries::findOne($cards->getClientsById($cards->clientsOne->user_id,'countrynat_id'))->name : false?>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','user contact details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','address: ')?></strong>
                                 <?=$cards->clientsOne->address?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','city: ')?></strong>
                                 <?=$cards->clientsOne->city?>
                            </li>
                            <li>
                                <strong>postal /zip code: </strong>
                                 <?=$cards->clientsOne->zipcode?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','state: ')?></strong>
                                 <?=($cards->clientsOne->state) ? (is_numeric($cards->clientsOne->state)) ? ymoStates::findOne(['id'=>$cards->clientsOne->state])->name 
                                 : $cards->clientsOne->state : false?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country: ')?></strong>
                                 <?=($cards->clientsOne->countries_id) ? ymoCountries::findOne($cards->clientsOne->countries_id)->name : false?>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <?php if(ymoCountries::findOne($cards->getShippingById($cards->clientsOne->user_id,'countries_id'))){?>
                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','shipping address')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','contact: ')?></strong>
                                 <?=Inflector::camel2words($cards->getShippingById($cards->clientsOne->user_id,'firstname') . ' ' . $cards->getShippingById($cards->clientsOne->id,'lastname'))?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','address: ')?></strong>
                                 <?=$cards->getShippingById($cards->clientsOne->user_id,'address')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','city: ')?></strong>
                                 <?=$cards->getShippingById($cards->clientsOne->user_id,'city')?>
                            </li>
                            <li>
                                <strong>postal /zip code: </strong>
                                 <?=$cards->getShippingById($cards->clientsOne->user_id,'zipcode')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','state: ')?></strong>
                                 <?=(is_numeric($cards->getShippingById($cards->clientsOne->user_id,'state'))) ? ymoStates::findOne($cards->getShippingById($cards->clientsOne->user_id,'state'))->name 
                                 : $cards->getShippingById($cards->clientsOne->user_id,'state')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country: ')?></strong>
                                 <?=ymoCountries::findOne($cards->getShippingById($cards->clientsOne->user_id,'countries_id'))->name?>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->
                    <?php } ?>

                    <!--ymo-card-documents-->
                    <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','check user docs')?>
                        </h2>
                        <ul class="col-md-12 ymo-Panel">
                             <?php 
								$listFiles = $cards->getDocuments($cards->clientsOne->user_id);
								
		                    	if($listFiles){

		                    		echo ymoTools::preloadModal([
		                    			['id'=>'more-documents','module' => 'admin/modules/supervisor','params'=>['clientid'=>$cards->clientsOne->user_id]],
		                    		]);
		                    		
		                    		echo $listFiles;
		                    	}else{
		                    		echo '<div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
									<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no files to compliance').'</li>
								</div>';
		                    	}
		                    ?>
                        </ul>
                         <?php if(ymoClientsFiles::findOne(['clients_id'=>$cards->clientsOne->user_id])!=false){?>
                    
	                    <!--End documents-->
	                    <div class="col-md-12 ymo-see-more ymo-nopadding">
	                    	<a class="dropdown-toggle" data-toggle="dropdown" href="#" data-action="more-documents" data-size="sm">
	                    		<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more')?>
	                    		<span class="caret"></span>
	                    	</a>
	                    </div>
	                    
	                    <?php } ?>
                    </div>
                    <!--ymo-card-documents-->
            
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