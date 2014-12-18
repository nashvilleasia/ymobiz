<!-- Start ymo-column-left-->
<div class="col-md-6">

    <!-- Start ymo-card-list-->
    <div class="col-md-11 ymo-card-list ymo-nopadding ymo-Panel">

        <h1 class="">Grid With Model and \yii\data\ActiveDataProvider</h1>

        <h2 class="col-md-8 ymo-title-a">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','your ymocards')?>
        </h2>
        <a href="<?php echo \Yii::$app->urlManager->createUrl('/dev/grid-dataprovider')?>" class="col-md-4 btn ymo-btn-light-pink ymo-nopadding"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','refresh')?></a>
    </div>
    <!-- End ymo-card-list-->

    <!-- Start ymo-card-table-->
    <div class="col-md-11 ymo-card-table ymo-nopadding">

        <?php

         $models = (Yii::$app->request->post('search') || Yii::$app->request->get('search')) ? $model->searchCountriesByDataProvider() : $model->listCountriesByDataProvider();

         \yii\widgets\Pjax::begin([
             'id' => 'grid',
         ]);
         echo \yii\grid\GridView::widget([
            'id' => 'grid',
            'dataProvider' => $models,
            'columns' => [
                ['value' => function ($model, $index, $widget) {
                        return "{$model['id']} | {$model['name']} | {$model['code']}";
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => ['view-statement' => function ($url, $model) {
                            return "<a href='".\yii\helpers\Url::toRoute(['default/grid-dataprovider','id' => $model->id, 'page' => Yii::$app->request->get('page')])."'>".Yii::$app->getModule('site')->ymoTranslate->t('site','app','view statement')."</a>";
                        }
                    ],
                    'template' => '{view-statement}',
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
    <div class="col-md-11 ymo-search ymo-nopadding ymo-Panel">
        <div class="col-md-5 ymo-nopadding ymo-Panel">
            <?php
                echo \yii\helpers\Html::dropDownList('status',null,$model->listStatus(),[
                    'class' => 'form-control'
                ])
            ?>
        </div>
        <div class="col-md-5 col-md-offset-2 ymo-nopadding ymo-Panel">
            <?php
            $form = \yii\bootstrap\ActiveForm::begin([
                'action' => '/dev/grid-dataprovider',
                'method' => 'post',
            ])
            ?>
            <input type="text" name="search" class="form-control" placeholder="<?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','search')?>">
            <input type="submit" name="" value=""
                   style="background-image: url(<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/magnifier.png);
                       background-color: transparent; border: none; width: 18px; height: 20px; position: absolute; right: 8px; top: 8px;" />
            <?php \yii\bootstrap\ActiveForm::end()?>
        </div>
    </div>
    <!-- End ymo-search-->

</div>
<!-- End ymo-column-left-->

<div class="col-md-12">

    <br/>
    <br/>

    <h1>Usage</h1>
    <p>Check source this file</p>

    <br/>
    <br/>

    <h1>Controller</h1>
    <?php
    echo \yii\helpers\Markdown::process(
        "
        public function actionGrid()
        {
            \$model = new ymoCountries;

            return \$this->render('module',[
                'page' => \$this->renderPartial('grids/grid-dataprovider',[
                    'model' => \$model
                ]),
            ]);
        }
    ",
        'gfm');
    ?>
</div>