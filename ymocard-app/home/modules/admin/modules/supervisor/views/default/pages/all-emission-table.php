<?php 

use yii\helpers\Inflector;
use common\models\grid\ymoCardsEmission;

$model = new ymoCardsEmission();

$cardID = (ymoCardsEmission::findCardId()) ? ymoCardsEmission::findCardId() : 'null';

$view = Yii::$app->getView();

$view->registerJs("
		
	jQuery(document).on('change','.filter-card', function(e){
		e.preventDefault();
		if(this.value!==''){
			var filterValue = this.value.replace(' ', '-');
			window.location = '/supervisor/emission/filter/' + decodeURI(filterValue);
		}
	});	
		
	var cardID = $cardID;	
		
	if(cardID!=='null'){	
		jQuery('table tr.ymo-item').each(function(){
			var cartTR = jQuery(this);
			if(cartTR.data('key')===cardID){	
				cartTR.addClass('ymo-item-hover');
			}	
		});		
	}else{
		var firstTD = jQuery('table tr.ymo-item:first');
		firstTD.addClass('ymo-item-hover');
	}
");

?>

<!-- Start ymo-column-left-->
<div class="col-md-6 ymo-column-left ymo-nopadding ymo-Panel">

    <!-- Start ymo-card-list-->
    <div class="col-md-11 col-md-offset-1 ymo-card-list ymo-nopadding ymo-Panel">
    
        <h2 class="col-md-8 ymo-title-a">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','registered ymocards')?>
        </h2>
        
        <div class="col-md-4 ymo-nopadding">
        	<?php if(Yii::$app->controller->action->id!='order-emission'){?>
        	<a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/order-emission')?>" class="col-md-12 btn ymo-btn-light-pink" style="margin-bottom: 5px;"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','emit all ymocards')?></a>
        	<?php } ?>
        	<a href="<?php echo \Yii::$app->urlManager->createUrl('/supervisor/emission')?>" class="col-md-12 btn ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','refresh')?></a>
        </div>
        
    </div>
    <!-- End ymo-card-list-->

    <!-- Start ymo-card-table-->
    <div class="col-md-11 col-md-offset-1 ymo-card-table ymo-nopadding">
         <?php

         if(Yii::$app->request->get('filter')==false){
         	$models = (Yii::$app->request->post('search') || Yii::$app->request->get('search')) ? $model->searchEmissionCards('default/emission') : $model->listEmissionCards();
         }else{
         	$models = (Yii::$app->request->get('filter')) ? $model->filterEmissionCards('/supervisor/emission') : false;
         }

         \yii\widgets\Pjax::begin([
             'id' => 'grid',
         ]);
         echo \yii\grid\GridView::widget([
            'id' => 'grid',
            'dataProvider' => $models,
            'columns' => [
                [
                	'format'=>'raw',
                	'value' => function ($model, $index, $widget) {
                		
                		$status = ymoCardsEmission::checkEmission($model->id);
                	
                        return '<span '.$status.'>' . ymoCardsEmission::hideCardNumber($model->cardnumber,'3','3') . " | " . 
                        Inflector::camel2words($model->title . ' ' . $model->name) . " | " .
                         $model->ordersOne->status_emission . '</span>';
         	        }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => ['view-card' => function ($url, $model) {
                    
		                    $status = ymoCardsEmission::checkEmission($model['id']);
		                    
                            return "<a $status href='".\yii\helpers\Url::toRoute(['default/emission','cardid' => $model->id,'search' => Yii::$app->request->get('search'), 'filter' => Yii::$app->request->get('filter'),  'page' => Yii::$app->request->get('page')])."' data-pjax=0>".Yii::$app->getModule('site')->ymoTranslate->t('site','app',($status) ? 'order emission' : 'order emission sent')."</a>";
                			
                        }
                    ],
                    'template' => '{view-card}',
                    'contentOptions' => ['class'=>'text-right']
                ]
            ],
            'summary' => false,
            'showHeader' => false,
            'pager' => [
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
                'options' => ['class' => 'ymo-pagination list-inline'],
            ],
            'tableOptions' => ['class' => 'table table-responsive ymo-table'],
            'rowOptions' => ['class' => 'ymo-item'],
        ]);
        \yii\widgets\Pjax::end();
        ?>
    </div>
    <!-- End ymo-card-table-->
    
    <!-- Start ymo-search-->
    <div class="col-md-11 col-md-offset-1 ymo-search ymo-nopadding ymo-Panel">
        <div class="col-md-5 ymo-nopadding ymo-Panel">
            <?php
                echo \yii\helpers\Html::dropDownList('status',(Yii::$app->request->get('filter')) ? Yii::$app->request->get('filter') : null ,$model->listStatus(),[
                    'class' => 'form-control filter-card'
                ]);
            ?>
        </div>
        <div class="col-md-5 col-md-offset-2 ymo-nopadding ymo-Panel">
            <?php
            $form = \yii\bootstrap\ActiveForm::begin([
                'action' => '/supervisor/emission',
                'method' => 'post',
            ])
            ?>
            <input type="text" name="search" class="form-control" placeholder="<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','search')?>">
            <input type="submit" name="" value=""
                   style="background-image: url(<?php echo  Yii::$app->getModule('site')->ymoTools->imageSrc('magnifier.png','img/icons')?>);
                       background-color: transparent; border: none; width: 18px; height: 20px; position: absolute; right: 8px; top: 8px;" />
            <?php \yii\bootstrap\ActiveForm::end()?>
        </div>
    </div>
    <!-- End ymo-search-->
    
</div>
<!-- End ymo-column-left-->