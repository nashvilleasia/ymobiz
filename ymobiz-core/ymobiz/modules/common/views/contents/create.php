<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoContents */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Contents',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-contents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
