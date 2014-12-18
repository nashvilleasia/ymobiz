<?php

use yii\helpers\Html;
use mcms\isloading\Isloading;
use kartik\widgets\SwitchInput;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ymobiz\models\common\ymoSearchClientsActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ymo-clients-activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'message') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
