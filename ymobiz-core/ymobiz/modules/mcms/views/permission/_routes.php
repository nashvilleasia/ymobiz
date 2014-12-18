<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>
<?php

echo Html::beginForm();
echo GridView::widget([
	'id' => Yii::$app->controller->id,
	'dataProvider' => new ArrayDataProvider([
		'id' => $type == 1 ? 'new' : 'exists',
		'allModels' => $data,
		'pagination' => [
			'pageSize' => 10,
		],
	]),
	'responsive' => true,
	'hover' => true,
	'panel' => [
		'heading'=>'<h1>Operations</b></h1>',
		'type'=>'primary',
		'before'=>  $createBtn .' '. Html::a('Create route', ['create'], ['class' => 'btn btn-success']),
		'showFooter'=>false
	],
	'export' => false,
	'columns' => [
		[
			'class' => 'yii\\grid\\CheckboxColumn',
			'checkboxOptions' => function($model) use($type) {
				return [
					'value' => ArrayHelper::getValue($model, 'name'),
				];
			},
		],
		[
			'class' => 'yii\\grid\\DataColumn',
			'attribute' => 'name',
		]
	]
]);
echo Html::submitButton($type == 1 ? 'Append' : 'Delete', [
	'name' => 'Submit',
	'value' => $type == 1 ? 'New' : 'Del',
	'class' => 'btn btn-primary']);
echo Html::endForm();
?>