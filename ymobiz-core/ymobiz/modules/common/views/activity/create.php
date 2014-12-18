<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoClientsActivity */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Ymo Clients Activity',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ymo Clients Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-clients-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
