<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use ymobiz\modules\mcms\models\Role;

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="role-index">

	<?php

	$typeNames = Role::getTypeName();

	Pjax::begin();

	echo GridView::widget([
		'id' => Yii::$app->controller->id,
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'responsive' => true,
		'hover' => true,
		'pjax'=>true,
	    'pjaxSettings'=>[
	        'neverTimeout'=>true,
	    ],
		'panel' => [
			'heading'=>'<h2>'.$this->title.'</h2>',
			'type'=>'primary',
			'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Role', ['create'], ['class' => 'btn btn-success']),
			'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-primary']),
			'showFooter'=>false
		],
		'columns' => [
			'name',
			[
				'class' => '\kartik\grid\ActionColumn',
				'template' => '{view} {update} {delete}',
				'options' => [
					'class' => 'col-md-2',
				],
				'buttons' => [
					'view' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-folder-open"></span>', $url, [
								'title' => Yii::t('yii', 'View'),
								'class' => 'col-md-4'
							]);
						},
					'update' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
								'title' => Yii::t('yii', 'Update'),
								'class' => 'col-md-4'
							]);
						},
					'delete' => function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
							'title' => Yii::t('yii', 'Delete'),
							'class' => 'col-md-4',
							'data' => [
								'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
								'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
								'method' => 'POST',
							],
						]);
					},
				],
			],
		],
	]);

	Pjax::end();

	$this->registerJs('

	jQuery("a[id=reloadGrid]").click(function(){
		$.pjax.reload({container: "#'.Yii::$app->controller->id.'", timeout: 1000});
	});

	', \yii\web\View::POS_READY , 'my-options');


	?>

</div>
