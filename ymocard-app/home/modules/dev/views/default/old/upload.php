<?php

use yii\bootstrap\ActiveForm;
use mcms\ajaxform\AjaxActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;

?>

<!--<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="file" value="">
        </div>
        <div class="form-group">
            <div class="col-xs-11">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</div>-->


<div class="container">

    <?php

        $form = ActiveForm::begin([
            'id' => 'form-upload-model',
            'action' => '/dev/upload-model',
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]);
    ?>

    <div class="col-xs-6">
        <div class="col-xs-12 ymo-card-form">
            <h1 class="">Form Non-Ajax Example With Model</h1>
            <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                <p class="ymo-text-a">
                    id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
                </p>
                <?php
                    echo $form->field($model,'file', ['template'=>'{input}'])->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                            'multiple'=>true,
                        ],
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showCaption' => false,
                            'showUpload' => false,
                            'elCaptionText' => '#customCaption',
                            'browseClass' => 'col-md-4 ymo-btn-upload',
                            'removeClass' => 'ymo-btn-upload input-upload-espace',
                            'browseIcon' => '',
                            'removeIcon' => '',
                            'browseLabel' =>  'Upload'
                        ]
                    ]);
                echo '<span id="customCaption" class="text-success" style="margin-top: -19px;"></span>';
                echo $form->field($model,'file', ['template'=>'{error}']);
                ?>
                    <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink', 'style' => 'margin-top:0px;']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?php

        $form = ActiveForm::begin([
            'id' => 'form-upload-without-model',
            'action' => '/dev/upload-file',
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]);
    ?>
    <div class="col-xs-6">
        <div class="col-xs-12 ymo-card-form">
            <h1 class="">Form Non-Ajax Example Without Model</h1>
            <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">

                <p class="ymo-text-a">
                    id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
                </p>

                <?php
                echo '<div class="form-group" style="margin-bottom: -4px;">';
                echo FileInput::widget([
                    'name' => 'file',
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>true,
                    ],
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => false,
                        'showUpload' => false,
                        'elCaptionText' => '#withoutModel',
                        'browseClass' => 'col-md-4 ymo-btn-upload',
                        'removeClass' => 'ymo-btn-upload input-upload-espace',
                        'browseIcon' => '',
                        'removeIcon' => '',
                        'browseLabel' =>  'Upload'
                    ]
                ]);
                echo '</div>';
                ?>
                <span id="withoutModel" class="text-success"></span>
                <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink' ,'style' => 'margin-top: 15px']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

    <?php

    $form = AjaxActiveForm::begin([
        'id' => 'form-ajax-upload-without-model',
        'action' => '/dev/upload-ajax-model',
        'options'=>[
            'enctype'=>'multipart/form-data'
        ],
        'pluginOptions' => [
            'target' => '#response-form-ajax-upload-without-model',
            'resetForm' => false,
        ],
        'resetForm' => new \yii\web\JsExpression("
            if(jQuery('body').find('.error-summary ul li').size()===0) {
                jQuery('#form-ajax-upload-without-model').resetForm();
            }
        "),
        'loadingOptions' => "
        {
            text: '".Yii::t('app','Loading')."',
            'class': \"fa fa-cog fa-spin fa-lg\",
            'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
        }
    "
    ]);
    ?>

    <div class="col-xs-6">
        <div class="col-xs-12 ymo-card-form">
            <h1 class="">Form Ajax Example With Model</h1>
            <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">

                <p class="ymo-text-a">
                    id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
                </p>

                <?php
                echo '<div class="form-group" style="margin-bottom: -4px;">';
                echo FileInput::widget([
                    'name' => 'file',
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>true,
                    ],
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => false,
                        'showUpload' => false,
                        'elCaptionText' => '#ajaxModel',
                        'browseClass' => 'col-md-4 ymo-btn-upload',
                        'removeClass' => 'ymo-btn-upload input-upload-espace',
                        'browseIcon' => '',
                        'removeIcon' => '',
                        'browseLabel' =>  'Upload'
                    ]
                ]);
                echo '<span id="ajaxModel" class="text-success"></span>';
                echo '</div>';
                ?>
                <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink' ,'style' => 'margin-top: 15px']) ?>
            </div>
        </div>
    </div>

    </form>
    <?php AjaxActiveForm::end() ?>

</div>