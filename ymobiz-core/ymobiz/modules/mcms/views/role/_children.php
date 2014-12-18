<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
?>
<br>
<div class="form-group col-lg-12">
	<div class="col-lg-10">
		<?php
		echo Select2::widget([
			'name' => 'append_' . $type,
			'value' => $append,
			'options' => [
				'style' => 'width:98%',
				'placeholder' => 'Select gan ... ',
				'multiple' => true,
			],
			'data' => $items,
		]);
		?>
	</div>
	<div class="col-lg-2">
		<?= Html::submitButton('Append', ['class' => 'btn btn-primary', 'name' => 'Submit', 'value' => $type . ':append']); ?>
	</div>
</div>
<br><br>
<div class="col-lg-12">
	<?php
	echo GridView::widget([
		'dataProvider' => new ArrayDataProvider([
			'allModels' => $data,
			'pagination' => [
				'pageSize' => 10,
			],
		]),
		'columns' => [
			[
				'class' => '\kartik\grid\ActionColumn',
				'name' => 'delete_' . $type,
				'checkboxOptions' => function($model) use($delete) {
					$name = ArrayHelper::getValue($model, 'name');
					return[
						'value' => $name,
						'checked' => in_array($name, $delete),
					];
				}
			],
			'name',
		],
	]);
	echo Html::submitButton('Delete', [
		'class' => 'btn btn-danger',
		'name' => 'Submit',
		'value' => $type . ':delete',
			//'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
	]);
	?>
</div>
