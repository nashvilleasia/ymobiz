<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoBusinessAreas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Business Areas',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ymo-business-areas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
