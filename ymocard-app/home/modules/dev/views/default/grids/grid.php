<!-- Start ymo-column-left-->
<div class="col-md-6">

    <!-- Start ymo-card-list-->
    <div class="col-md-11 ymo-card-list ymo-nopadding ymo-Panel">

        <h1 class="">Grid With Model and \yii\data\Pagination and  \yii\widgets\LinkPager</h1>

        <h2 class="col-md-8 ymo-title-a">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','your ymocards')?>
        </h2>
        <a href="<?php echo \Yii::$app->urlManager->createUrl('/dev/grid')?>" class="col-md-4 btn ymo-btn-light-pink ymo-nopadding"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','refresh')?></a>
    </div>
    <!-- End ymo-card-list-->

    <!-- Start ymo-card-table-->
    <div class="col-md-11 ymo-card-table ymo-nopadding">

        <table class="table table-responsive ymo-table">
            <tbody>
            <?php

                $models = (Yii::$app->request->post('search') || Yii::$app->request->get('search')) ? $model->searchCountries()->models : $model->listCountries()->models;
                $pages = (Yii::$app->request->post('search') || Yii::$app->request->get('search')) ? $model->searchCountries()->pages : $model->listCountries()->pages;

                foreach($models as $row){
            ?>
            <tr class="ymo-item">
                <td><?=$row->id?> | <?=$row->name?> | <?=$row->code?></td>
                <td class="text-right">
                    <a href="<?php echo \yii\helpers\Url::toRoute(['default/grid','id' => $row->id, 'page' => Yii::$app->request->get('page')])?>"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','view statement')?></a>
                </td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        <div class="col-md-12">
            <?php
            if($pages->defaultPageSize <> 1){
                echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pages,
                    'nextPageLabel' => '>',
                    'prevPageLabel' => '<',
                    'options' => [
                        'class' => 'ymo-pagination list-inline'
                    ]
                ]);
            }
            ?>
        </div>
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
                    'action' => '/dev/grid',
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
                'page' => \$this->renderPartial('grids/grid',[
                    'model' => \$model
                ]),
            ]);
        }
    ",
        'gfm');
    ?>
</div>