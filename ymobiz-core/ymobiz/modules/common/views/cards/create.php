<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ymoCards */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Cards',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-cards-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
