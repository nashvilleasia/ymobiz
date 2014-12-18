<?php 

use common\models\forms\ymoPartnerMemberForm;
use ymobiz\auth\ymoUser;
use common\models\ymoClients;

$model = new ymoPartnerMemberForm;

$memberID = (ymoPartnerMemberForm::checkMemberId()) ? ymoPartnerMemberForm::checkMemberId() : 'null';

$view = Yii::$app->getView();

$view->registerJs("

	jQuery(document).on('change','.filter-member', function(e){
		e.preventDefault();
		if(this.value!==''){
			var filterValue = this.value.replace(' ', '-');
			window.location = '/partner-supervisor/members/filter/' + decodeURI(filterValue);
		}
	});

	var memberID = $memberID;
	
	if(memberID!=='null'){
		jQuery('table tr.ymo-item').each(function(){
			var memberTR = jQuery(this);
			if(memberTR.data('key')===memberID){
				memberTR.addClass('ymo-item-hover');
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
    <div class="col-md-11 col-md-offset-1 ymo-members ymo-nopadding ymo-Panel">
        <h2 class="col-md-9 ymo-title-a">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','registered members')?>
        </h2>
        <div class="col-md-3 ymo-nopadding">
       	 	<a href="<?php echo \Yii::$app->urlManager->createUrl('/partner-supervisor/add-members')?>" class="col-md-12 btn ymo-btn-light-pink" style="margin-bottom: 5px;"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','add staff member')?></a>
        	<a href="<?php echo \Yii::$app->urlManager->createUrl('/partner-supervisor/members')?>" class="col-md-12 btn ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','refresh')?></a>
        </div>
    </div>
    <!-- End ymo-card-list-->

    <!-- Start ymo-card-table-->
    <div class="col-md-11 col-md-offset-1 ymo-card-table ymo-nopadding">
        
        <?php

         if(Yii::$app->request->get('filter')==false){
         	$models = (Yii::$app->request->post('search') || Yii::$app->request->get('search')) ? $model->searchMembers() : $model->listMembers();
         }else{
         	$models = (Yii::$app->request->get('filter')) ? $model->filterMembers() : false;
         }

         \yii\widgets\Pjax::begin([
             'id' => 'grid',
         ]);
         
         echo \yii\grid\GridView::widget([
            'id' => 'grid2',
            'dataProvider' => $models,
            'columns' => [
                ['value' => function ($model, $index, $widget) {
                        return $model['username'];
         	        }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => ['view-member' => function ($url, $model) {
                            return "<a href='".\yii\helpers\Url::toRoute(['default/members','memberid' => $model['id'],'search' => Yii::$app->request->get('search'), 'filter' => Yii::$app->request->get('filter'),  'page' => Yii::$app->request->get('page')])."' data-pjax=0>".Yii::$app->getModule('site')->ymoTranslate->t('site','app','view statement')."</a>";
                        }
                    ],
                    'template' => '{view-member}',
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
                echo \yii\helpers\Html::dropDownList('status',(Yii::$app->request->get('filter')) ? Yii::$app->request->get('filter') : null ,$model->listRoles(),[
                    'class' => 'form-control filter-member'
                ]);
            ?>
        </div>
        <div class="col-md-5 col-md-offset-2 ymo-nopadding ymo-Panel">
            <?php
            $form = \yii\bootstrap\ActiveForm::begin([
                'action' => '/partner-supervisor/members',
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