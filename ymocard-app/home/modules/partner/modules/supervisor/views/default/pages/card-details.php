<?php 

use mcms\isloading\Isloading;
use mcms\maskmoney\MaskMoney;
use yii\helpers\Inflector;
use common\models\grid\ymoCardsPartner;

$model = new ymoCardsPartner();
$viewCards = $model->viewPartnersCard();

?>

                    <h2 class="ymo-title-a">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card details')?>
                    </h2>
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
<?php
if($viewCards->one()!=false){
	
	$cards = $viewCards->one();
	
?>
<!-- Start ymo-card-details-->
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card name: ')?></strong>
                                <?php echo Inflector::camel2words($cards->title . ' ' . $cards->name) ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card number: ')?></strong>
                                <?php echo ymoCardsPartner::hideCardNumber($cards->cardnumber,'3','3') ?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card status: ')?></strong>
                                <?php echo $cards->status_code ?>
                            </li>
                            <li>
                            	<strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card authorized plafond: ')?></strong>
                                <?=Yii::$app->formatter->asCurrency($cards->plafond)?> <span style="margin-left: 4px;"><?php echo Yii::$app->formatter->currencyCode ?></span>
                            </li>
                        </ul>
                        
                        <?php 
            
				            echo \ymobiz\extensions\marciocamello\ajaxform\AjaxButtonOne::widget([
				            	'id' => ($cards->status_code=='active' || $cards->status_code=='pendent') ? 'block-ymocard' : 'unblock-ymocard',
				            	'buttonClass' => 'btn ymo-btn-logout',
				            	'name' => Yii::$app->getModule('site')->ymoTranslate->t('site','form',($cards->status_code=='active' || $cards->status_code=='pendent') ? 'block this ymocard' : 'unblock this ymocard'),
				            	'pluginOptions' => [
				            		'url' => ($cards->status_code=='active') ? '/partner-supervisor/block-ymocard' : '/partner-supervisor/unblock-ymocard',
						            'dataType' => 'json',
						            'resetForm' => false,
				            		'data' => [
				            			'cardid' => "$cards->id",
				            		],
				            	],
				            	'customCallbacks' => [
				            		'complete' => new \yii\web\JsExpression("
										 var obj = JSON.parse(event.responseText);
										 if(obj.status === 200){
											".Isloading::widget([
												'id' => ($cards->status_code=='active') ? 'response-block-ymocard' : 'response-block-ymocard',
												'pluginOptions' => [
													'text' => Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','Verifying your data, please wait...')
												],	
												'response' => new \yii\web\JsExpression('
													jQuery(".ymo-json-response").html(obj.content);
													$.isLoading("hide");
												')
											])."
										}else if(obj.status === 500){
											jQuery('.ymo-json-response').html(obj.content);;
										}
										return false;
									"),
				            	],
				            	'events' => [
				            		'confirmation' => [
				            			'message' => 'Are you sure?',
				            			'error' => 'There was an error!',
				            		]
				            	],
				            ]);
				            	            
				       ?>
				       
				       <a class="col-md-3 ymo-btn-light-pink" href="<?php echo \yii\helpers\Url::toRoute(['default/order-card','userid'=>$cards->client_id])?>" style="margin-right: 5px; display: block; float: right;"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','add new ymocard')?></a>
				       
                    
<?php 
	}else{
		echo '<li>'.Yii::$app->getModule('site')->ymoTranslate->t('site','app','there is no registered card').'</li>';	
	}
?>
                    </div>
                    <!-- End ymo-card-details-->