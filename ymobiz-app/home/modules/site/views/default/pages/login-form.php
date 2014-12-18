<?php

use yii\widgets\ActiveForm;
use app\components\ymoTranslate;
use yii\helpers\Html;
use ymobiz\activeforms\ymoLoginForm;

$model = new ymoLoginForm();

?>
<div class="col-md-5 ymo-login ymo-Panel col-md-offset-4">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => '/site/login',
    ]); ?>


        <div class="form-group col-md-5">
            <div class="checkbox">
                <?= $form->field($model, 'rememberMe', [
                    'template' => "<div>{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                ])->checkbox()->label() ?>
            </div>
            <?php
            echo $form->field($model, 'username',[
                'template' => '{input}{error}',
                'options' => [
                    'class' => 'col-md-12 form-group ymo-nopadding ymo-group'
                ],
                'inputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => ymoTranslate::t('ymoUsers','form','email')
                ],
            ]);
            ?>
        </div>
        <div class="form-group col-md-7">
            <div class="link">
                <a href="#" data-action="password-recovery"><?php echo ymoTranslate::t('ymoUsers','form','forgot your password?') ?></a>
            </div>
            <div class="input-group">
                <?php
                echo $form->field($model, 'password',[
                    'template' => '{input}{error}',
                    'options' => [
                        'class' => 'col-md-12 form-group ymo-nopadding ymo-group'
                    ],
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => ymoTranslate::t('ymoUsers','form','password')
                    ]
                ])->passwordInput();
                ?>
                <span class="input-group-btn">
                     <?= Html::submitButton(ymoTranslate::t('ymoUsers','form','login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </span>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>