<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ymoTranslate;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';

$this->registerCss("
.label-check label{
    padding-left: 0px;
    margin: 5px 0px 5px 0px;
}
");

?>
<div class="site-login col-md-6">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-2',
    ]); ?>

    <?= $form->field($model, 'username',[
        'template' => '{input}{error}',
        'options' => [
            'class' => 'col-md-12 form-group ymo-nopadding ymo-group'
        ],
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => ymoTranslate::t('ymoUsers','form','email')
        ],
        'labelOptions' => [
            'style' => 'margin: 5px 0px 5px 0px;'
        ]
    ]) ?>

    <?= $form->field($model, 'password',[
        'options' => [
            'class' => 'col-md-12 form-group ymo-nopadding ymo-group'
        ],
        'inputOptions' => [
            'class' => 'form-control',
            'placeholder' => ymoTranslate::t('ymoUsers','form','email'),
        ],
        'labelOptions' => [
            'style' => 'margin: 5px 0px 5px 0px;'
        ]
    ])->passwordInput() ?>

    <br><br><br><br><br><br>

    <div class="form-group">
        <div class="col-lg-12 ymo-nopadding">
            <?= Html::submitButton('Login', ['class' => 'btn ymo-btn-pink', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>