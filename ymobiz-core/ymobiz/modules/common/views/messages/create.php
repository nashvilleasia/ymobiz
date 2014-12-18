<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ymoClientsMessages */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Ymo Clients Messages',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ymo Clients Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-clients-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
