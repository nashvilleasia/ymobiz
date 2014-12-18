<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use common\models\ymoClients;

/* @var $this yii\web\View */
/* @var $searchModel ymobiz\models\common\ymoSearchCards */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cards');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="ymo-cards-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php 
	Pjax::begin();

	echo GridView::widget([
		'id' => 'ymo-cards',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'responsive' => true,
		'hover' => true,
		'exportConfig' => [
			GridView::HTML => ['label' => 'Save as HTML'],
			GridView::CSV => ['label' => 'Save as CSV'],
			GridView::TEXT => ['label' => 'Save as Text'],
			GridView::EXCEL => ['label' => 'Save as Excel'],
		],
		'panel' => [
			'heading'=>'<h2>'.$this->title.'</h2>',
			'type'=>'primary',
			'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create Cards', [
    'modelClass' => 'Ymo Cards',
]), ['create'], ['class' => 'btn btn-success']),
			'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> '.Yii::t('app', 'Reset Grid Cards', [
    'modelClass' => 'Ymo Cards',
]), ['index'], ['class' => 'btn btn-primary']),
			'showFooter'=>false
		],
		'columns' => [
            'name',
            'cardnumber:ntext',
			[
				'attribute'=>'dateexpiration',
				'label' => 'Date Exp',
				'value'=>function ($model, $index, $widget) {
					return date('m/Y',$model->dateexpiration);
				}
			],
			[
				'class'=>'kartik\grid\BooleanColumn',
				'attribute'=>'status',
			],
			[
				'class' => '\kartik\grid\ActionColumn',
				'template' => '{view} {update} {update-email} {update-password} {delete}',
				'options' => [
					'class' => 'col-md-3',
				],
				'buttons' => [
					'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-folder-open"></span>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class' => 'col-md-2'
                        ]);
                    },
					'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Update Profile'),
                            'class' => 'col-md-2'
                        ]);
                    },
					'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'class' => 'col-md-2',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);
                    },
				],
			],
		],
	]);

	Pjax::end();

?>
    

</div>
