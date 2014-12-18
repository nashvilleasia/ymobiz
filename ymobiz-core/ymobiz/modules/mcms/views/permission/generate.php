<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

$this->title = 'Generate Permissions';
$this->params['breadcrumbs'][] = ['label' => 'Operation', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
echo Html::beginForm();
echo GridView::widget([
	'id' => Yii::$app->controller->id,
	'dataProvider' => new ArrayDataProvider([
		'allModels' => $new,
		'pagination' => [
			'pageSize' => 10,
		],
	]),
	'responsive' => true,
	'hover' => true,
	'panel' => [
		'heading'=>'<h1>Generate Permissions</b></h1>',
		'type'=>'primary',
		'showFooter'=>false
	],
	'columns' => [
		[
			'class' => '\kartik\grid\CheckboxColumn',
			'checkboxOptions' => function($model){
				return [
					'value' => ArrayHelper::getValue($model, 'name'),
					'checked' => true,
				];
			},
		],
		[
			'class' => 'yii\\grid\\DataColumn',
			'attribute' => 'name',
		]
	]
]);
echo Html::submitButton('Append', ['name' => 'Submit','class' => 'btn btn-primary']);
echo Html::endForm();
?>
