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

    $formMultiple = ActiveForm::begin([
        'id' => 'form-upload-multiple-model',
        'action' => '/dev/upload-multiple-model',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]);
    ?>
    <div class="col-xs-6">
        <div class="col-xs-12 ymo-card-form">
            <h1 class="">Form Non-Ajax Example With Model Multiple</h1>
            <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                <p class="ymo-text-a">
                    id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
                </p>
                <?php

                echo $formMultiple->field($model,'fileMultiple[]', ['template'=>'{input}'])->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                        'multiple'=>true,
                    ],
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => false,
                        'showUpload' => false,
                        'elCaptionText' => '#multipleCaption',
                        'browseClass' => 'col-md-4 ymo-btn-upload',
                        'removeClass' => 'ymo-btn-upload input-upload-espace',
                        'browseIcon' => '',
                        'removeIcon' => '',
                        'browseLabel' =>  'Upload'
                    ]
                ]);

                echo '<span id="multipleCaption" class="text-success" style="margin-top: -19px;"></span>';
                echo $formMultiple->field($model,'fileMultiple[]', ['template'=>'{error}']);

                if ($model->hasErrors()) { //it is necessary to see all the errors for all the files.
                    echo '<pre>';
                    print_r($model->getErrors());
                    echo '</pre>';
                }

                ?>
                <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink', 'style' => 'margin-top:0px;']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end() ?>

</div>