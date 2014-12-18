<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoBusinessAreas */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Business Areas',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-business-areas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
