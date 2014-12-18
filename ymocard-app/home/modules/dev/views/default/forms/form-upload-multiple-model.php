<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;

?>

<div class="container">

    <?php

    $formMultiple = ActiveForm::begin([
        'id' => 'form-upload-multiple-model',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]);
    ?>
    <div class="col-xs-12 ymo-card-form">
        <h1 class="">Form Non-Ajax Upload Example With Model Multiple</h1>
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
                    'browseClass' => 'col-md-2 ymo-btn-upload',
                    'removeClass' => 'ymo-btn-upload input-upload-espace',
                    'browseIcon' => '',
                    'removeIcon' => '',
                    'browseLabel' =>  'Upload'
                ]
            ]);

            echo '<span id="multipleCaption" class="text-success upload-caption" style="margin-top: -19px;"></span>';
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

    <?php ActiveForm::end() ?>


<br/>
<br/>

<h1>Usage</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    \$form = ActiveForm::begin([
        'id' => 'form-upload-multiple-model',
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

    echo '<span id=\"multipleCaption\" class=\"text-success\" style=\"margin-top: -19px;\"></span>';
    echo \$formMultiple->field(\$model,'fileMultiple[]', ['template'=>'{error}']);

    if (\$model->hasErrors()) { //it is necessary to see all the errors for all the files.
        echo '<pre>';
        print_r(\$model->getErrors());
        echo '</pre>';
    }
",
    'gfm');
?>
<br/>
<br/>

<h1>Controller</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    public function actionFormUploadMultipleModel()
    {
        \$model = new Dev;
        \$model->scenario = 'multipleUpload';

        if (Yii::\$app->request->isPost) {

            //\$files  = UploadedFile::getInstances(\$model, 'fileMultiple');

            \$files  = Upload::multipleUpload(\$model, 'fileMultiple', []);

            \$filesUploaded = false;

            foreach (\$files as \$file) {

                \$_model = new Dev;
                \$_model->scenario = 'multipleUpload';

                \$_model->fileMultiple = \$file;

                if (\$_model->validate()) {
                    /*Call saveSingleUpload to default path /home/web/upload/*/
                    // \$model->file->saveSingleUpload(\$model->fileMultiple,[
                    /*'fileName' => 'customName',
                    'basePath' => '@webroot/upload2/',*/
                    // ]);

                    \$filesUploaded .= \$this->uploadResponse(\$_model->fileMultiple);

                } else {
                    foreach (\$_model->getErrors('fileMultiple') as \$error) {
                        \$model->addError('fileMultiple', \$error);
                    }
                }
            }

            if (\$model->hasErrors('fileMultiple')){

                \$model->addError(
                    'fileMultiple',
                    count(\$model->getErrors('fileMultiple')) . ' of ' . count(\$files) . ' files not uploaded'
                );

            }else{

                echo \$this->render('@common/errors/response',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => \$filesUploaded,
                    'footer' => Yii::t('app','ok'),
                ]);
            }
        }

        return \$this->render('module',[
            'page' => \$this->renderPartial('forms/form-upload-multiple-model',[
                'model' => \$model
            ]),
        ]);
    }
",
    'gfm');
?>

</div>