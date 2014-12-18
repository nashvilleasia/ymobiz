<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoSystemMessages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'System Messages',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'System Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ymo-system-messages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
