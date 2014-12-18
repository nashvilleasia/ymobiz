<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoPaymentMethods */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Payment Methods',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Methods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ymo-payment-methods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
