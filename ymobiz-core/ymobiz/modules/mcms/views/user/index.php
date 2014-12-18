<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app','Users');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;

$createBtn = Html::a(Yii::t('app','Create User'), ['create'], ['class' => 'btn btn-success']);

?>
<div class="user-index">

	<?php

	Pjax::begin();

	echo GridView::widget([
		'id' => Yii::$app->controller->id,
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
			'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app','Create User'), ['create'], ['class' => 'btn btn-success']),
			'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> '.Yii::t('app','Reset Grid'), ['index'], ['class' => 'btn btn-primary']),
			'showFooter'=>false
		],
		'columns' => [
			[
				'label' => 'Cluster',	
				'attribute'=>'cluster_id',
			],
			[
				'attribute'=>'username',
			],
			[
				'attribute'=>'email',
			],
			[
				'class'=>'kartik\grid\BooleanColumn',
				'attribute'=>'status',
			],
			[
				'class' => '\kartik\grid\ActionColumn',
				//'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {update-email} {update-password} {delete}',
				'options' => [
					'class' => 'col-md-3',
				],
				//'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
				'buttons' => [
					'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-folder-open"></span>', $url, [
                            'title' => Yii::t('yii', 'View'),
                            'class' => 'col-md-2'
                        ]);
                    },
					'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('yii', 'Update Profile'),
                            'class' => 'col-md-2'
                        ]);
                    },
                    'update-email' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-envelope"></span>', $url, [
                            'title' => Yii::t('yii', 'Update Email'),
                            'class' => 'col-md-2'
                        ]);
                    },
                    'update-password' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-lock"></span>', $url, [
                            'title' => Yii::t('yii', 'Update Password'),
                            'class' => 'col-md-2'
                        ]);
                    },
					'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
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
