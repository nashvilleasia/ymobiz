<?php

use yii\helpers\Html;
use ymobiz\components\DetailView;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use ymobiz\modules\mcms\components\AccessHelper;
use kartik\widgets\Select2;
use yii\data\ArrayDataProvider;
use yii\rbac\Item;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="auth-item-view">

	<?php
	echo DetailView::widget([
		'model' => $model,
        'condensed'=>true,
        'mode'=>DetailView::MODE_VIEW,
        //'enableEditMode' => false,
        'buttons1' => '{update} {delete}',
        'updateOptions' => [
            'url' => \yii\helpers\Url::toRoute(['update', 'id' => $model->name]),
            'class' => 'btn btn-warning',
        ],
        'deleteOptions' => [
            'url' => \yii\helpers\Url::toRoute(['delete', 'id' => $model->name]),
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ],
        'panel'=>[
            'heading'=>'<h2>'.$this->title.'</h2>',
            'type' => DetailView::TYPE_PRIMARY,
        ],
		'attributes' => [
			'name',
			'rule_name',
			'description',
			[
				'attribute' => 'type',
				'value' => $model->roleType
			],
            [
                'attribute'=>'created_at',
                'label' => 'Created At',
                'format'=>'datetime',
                'widgetOptions'=>[
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'inputWidth'=>'40%'
            ],
            [
                'attribute'=>'updated_at',
                'label' => 'Updated At',
                'format'=>'datetime',
                'widgetOptions'=>[
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'inputWidth'=>'40%'
            ],
		],
	]);
	
	
	?>

	<?php $form = ActiveForm::begin(); ?>
	<br>
	<div class="row">
		<div class="form-group">
			<div class="col-lg-10">
				<?php
				
				$permissions = AccessHelper::getAvaliableChild(Item::TYPE_PERMISSION);
				
				echo Select2::widget([
					'name' => 'append',
					'addon' => 'append',
					//'value' => implode(', ', empty($states['append']) ? [] : $states['append']),
					'options' => [
						'placeholder' => 'Select permissions ...',
						'class'=>'form-control',
						'multiple' => true
					],
					'pluginOptions' => [
						'tags' =>  $permissions['permission'],
					],
				]);
				?>
			</div>
			<div class="col-lg-2">
				<?= Html::submitButton('Append', ['class' => 'btn btn-primary', 'name' => 'Submit', 'value' => 'append']); ?>
			</div>
		</div>
	<?php ActiveForm::end(); ?>
	<br><br>
		<div class="col-lg-12">
			<?php
			$deleted = empty($states['delete']) ? [] : $states['delete'];
			echo GridView::widget([
				'id' => Yii::$app->controller->id,
				'pjax'=>true,
			    'pjaxSettings'=>[
			        'neverTimeout'=>true,
			    ],
				'dataProvider' => new ArrayDataProvider([
					'allModels' => $model->getChildren(),
					'pagination' => [
						'pageSize' => 10,
					],
				]),
				'responsive' => true,
				'hover' => true,
                'export' => false,
				'panel' => [
					'heading'=>'<h1>Roles</b></h1>',
					'type'=>'primary',
					'showFooter'=>false,
                    'after'=>Html::button('Delete', [
                        'class' => 'btn btn-danger',
                        'name' => 'Submit',
                        'value' => 'deleteAll',
			            'data' => [
			                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
			                'method' => 'post',
			            	'pjax' => true,
			            ],
                    ]),
				],
				'columns' => [
					[
						'class' => '\kartik\grid\CheckboxColumn',
						'name' => 'deleteAll[]',
						'checkboxOptions' => function($model) use($deleted) {
							$name = ArrayHelper::getValue($model, 'name');
							return[
								'value' => $name,
								'checked' => in_array($name, $deleted),
							];
						}
					],
					'name',
				],
			]);
			?>
		</div>
	</div>
</div>
