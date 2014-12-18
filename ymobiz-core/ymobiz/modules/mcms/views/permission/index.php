<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

$this->title = 'Permissions';
$this->params['breadcrumbs'][] = $this->title;

$createBtn = $new ? Html::a("Generate route ($new)", ['generate'], ['class' => 'btn btn-success']) : '';

?>

<?php
echo Html::beginForm();
	echo GridView::widget([
			'id' => Yii::$app->controller->id,
			'dataProvider' => new ArrayDataProvider([
				'allModels' => $exists,
				'pagination' => [
					'pageSize' => 10,
				],
			]),
			'responsive' => true,
			'hover' => true,
			'panel' => [
				'heading'=>'<h2>'.Yii::t('app','Permissions').'</h2>',
				'type'=>'primary',
				'before'=>  $createBtn .' '. Html::a('Create route', ['create'], ['class' => 'btn btn-success']). ' '.
                    Html::submitButton('Delete', [
                        'class' => 'btn btn-danger',
                        'name' => 'Submit',
                        'value' => 'delete',
			            'data' => [
			                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
			                'method' => 'post',
			            	'pjax' => true,
			            ],
                    ]),
			],
			'export' => false,
			'columns' => [
			[
				'class' => '\kartik\grid\CheckboxColumn',
				'name' => 'selection[]',	
				'checkboxOptions' => function($model) {
					return [
						'value' => ArrayHelper::getValue($model, 'name'),
					];
				},
			],
			[
				'class' => '\kartik\grid\DataColumn',
				'attribute' => 'name',
			]
		]
	]);

	echo Html::endForm();
?>
