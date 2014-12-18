<?php

use ymobiz\components\DetailView;
use ymobiz\modules\mcms\models\Role;

/**
 * @var yii\base\View $this
 * @var mdm\admin\models\User $model
 */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-view">

	<?php echo DetailView::widget([
		'model' => $model,
        'condensed'=>true,
        'mode'=>DetailView::MODE_VIEW,
        //'enableEditMode' => false,
        'buttons1' => '{update} {delete}',
        'updateOptions' => [
            'title' => Yii::t('app','Update Profile'),
            'url' => \yii\helpers\Url::toRoute(['update', 'id' => $model->id]),
            'class' => 'btn btn-warning',
        ],
        'deleteOptions' => [
            'url' => \yii\helpers\Url::toRoute(['delete', 'id' => $model->id]),
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
			'id',
			'username',
			[
				'attribute'=>'role',
				'value' => Role::getNamePermissionsByUser($model->id),
                'format' => 'raw',
			],
			'email:email',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>$model->status ?
                        '<span class="label label-success">Yes</span>' :
                        '<span class="label label-danger">No</span>',
                'type'=>DetailView::INPUT_SWITCH
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
	]); ?>

</div>
