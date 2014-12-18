<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\data\ArrayDataProvider;
use ymobiz\modules\mcms\components\AccessHelper;
use yii\rbac\Item;

?>
<br>
<?= Html::beginForm() ?>
<div class="row">
	<div class="form-group">
		<div class="col-lg-10">
			<?php
			
			$permissions = AccessHelper::getAvaliableChild(Item::TYPE_ROLE);
			
			echo Select2::widget([
				'name' => 'append',
				'options' => [
						'placeholder' => 'Select role ...',
						'class'=>'form-control',
						'multiple' => true
					],
				'pluginOptions' => [
					'tags' =>  (Yii::$app->authManager->getRoles()==false) ? array_keys(array_diff($permissions['role'],array_keys(Yii::$app->authManager->getRoles()))) : $permissions['role'],
				],
			]);
			?>
		</div>
		<div class="col-lg-2">
			<?= Html::submitButton('Append', ['class' => 'btn btn-primary', 'name' => 'Submit', 'value' => 'append']); ?>
		</div>
	</div>
<br><br>
<div class="col-lg-12">
	<?php
	echo GridView::widget([
		'id' => Yii::$app->controller->id,
		'dataProvider' => new ArrayDataProvider([
			'allModels' => $assigments,
			'pagination' => [
				'pageSize' => 10,
			],
		]),
		'responsive' => true,
		'hover' => true,
		'panel' => [
			'heading'=>'<h1>Assigment User <b>'.$title.'</b></h1>',
			'type'=>'primary',
			'showFooter'=>false
		],
		'columns' => [
			[
				'class' => '\kartik\grid\CheckboxColumn',
				'name' => 'delete[]',
				'checkboxOptions' => function($model) use($delete) {
					return[
						'value' => $model,
						'checked' => in_array($model, $delete),
					];
				},
			],
			[
				'class'=>'\kartik\grid\DataColumn',
				'label'=>'Roles',
				'value'=>function($model){
					return $model;
				}
			],
		],
	]);
	echo Html::submitButton('Delete', [
		'class' => 'btn btn-danger',
		'name' => 'Submit',
		'value' => 'delete',
		'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
	]);
	?>
</div>
<?= Html::endForm() ?>

</div>