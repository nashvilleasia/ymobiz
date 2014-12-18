<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app','Assigments');
$this->params['breadcrumbs'][] = Yii::t('app','Admin');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigment-index">

	<?php
	$manager = Yii::$app->authManager;
	echo GridView::widget([
		'id' => Yii::$app->controller->id,
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'responsive' => true,
		'hover' => true,
		'panel' => [
			'heading'=>'<h2>'.$this->title.'</h2>',
			'type'=>'primary',
			'showFooter'=>false
		],
		'columns' => [
			[
				'class' => 'kartik\grid\DataColumn',
				'attribute' => 'username',
				'value' => function ($model) use($usernameField) {
					return ArrayHelper::getValue($model, $usernameField);
				}
			],
			[
				'class' => 'kartik\grid\DataColumn',
				'hAlign'=>'center',
				'mergeHeader'=>true,
				'label' => 'Roles',
				'value' => function($model) use($manager, $useridField) {
					$roles = array_keys($manager->getRolesByUser($model->{$useridField}));
					if (count($roles) > 5) {
						$roles = array_slice($roles, 0, 5);
						$roles[] = '...';
					} elseif (empty($roles)) {
						$roles = ['&minus;'];
					}
					return Html::a(implode(', ', $roles), ['view', 'id' => $model->{$useridField}]);
				},
				'format' => 'raw',
			],
		],
	]);

	?>

</div>
