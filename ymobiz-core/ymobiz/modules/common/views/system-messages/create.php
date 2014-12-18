<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoSystemMessages */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'System Messages',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'System Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-system-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
