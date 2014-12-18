<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;

?>

<?php

    $form = ActiveForm::begin([
        'id' => 'form-upload-model',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]);
?>
<div class="col-xs-12 ymo-card-form">
    <h1 class="">Form Non-Ajax Upload Example With Model</h1>
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
                    'browseClass' => 'col-md-2 ymo-btn-upload',
                    'removeClass' => 'ymo-btn-upload input-upload-espace',
                    'browseIcon' => '',
                    'removeIcon' => '',
                    'browseLabel' =>  'Upload'
                ]
            ]);
        echo '<span id="customCaption" class="text-success upload-caption" style="margin-top: -19px;"></span>';
        echo $form->field($model,'file', ['template'=>'{error}']);
        ?>
        <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink', 'style' => 'margin-top:0px;']) ?>
    </div>

<?php ActiveForm::end() ?>

    <br/>
    <br/>

    <h1>Usage</h1>
    <?php
    echo \yii\helpers\Markdown::process(
        "
        \$form = ActiveForm::begin([
            'id' => 'form-upload-model',
            'options' => [
                'enctype' => 'multipart/form-data'
            ]
        ]);

        /*Input file*/
        echo \$form->field(\$model,'file', ['template'=>'{input}'])->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple'=>true,
                ],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => false,
                    'showUpload' => false,
                    'elCaptionText' => '#customCaption',
                    'browseClass' => 'col-md-2 ymo-btn-upload',
                    'removeClass' => 'ymo-btn-upload input-upload-espace',
                    'browseIcon' => '',
                    'removeIcon' => '',
                    'browseLabel' =>  'Upload'
                ]
            ]);
        echo '<span id=\"customCaption\" class=\"text-success\" style=\"margin-top: -19px;\"></span>';
        echo \$form->field(\$model,'file', ['template'=>'{error}']);
    ",
        'gfm');
    ?>
    <br/>
    <br/>

    <h1>Controller</h1>
    <?php
    echo \yii\helpers\Markdown::process(
        "
        public function actionFormUploadModel()
        {
            \$model = new ymoClientsFiles;
            \$model->scenario = 'singleUpload';

            if (Yii::\$app->request->isPost) {
                \$model->file  = Upload::singleUpload(\$model, 'file', []);

                if (\$model->validate()) {
                    /*Call saveSingleUpload to default path /home/web/upload/*/
                    // \model->file->saveSingleUpload(\$model->file,[
                    /*'fileName' => 'customName',
                    'basePath' => '@webroot/upload2/',*/
                    // ]);

                    echo \$this->render('@common/errors/response',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => \$this->uploadResponse(\$model->file),
                        'footer' => Yii::t('app','ok'),
                    ]);
                }
            }

            return \$this->render('module',[
                'page' => \$this->renderPartial('forms/form-upload-model',[
                    'model' => \$model
                ]),
            ]);
        }
    ",
        'gfm');
    ?>

</div>