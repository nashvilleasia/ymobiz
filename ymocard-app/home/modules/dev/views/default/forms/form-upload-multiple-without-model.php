<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;

?>

<div class="container">

    <?php

    $formMultiple = ActiveForm::begin([
        'id' => 'form-upload-multiple-without-model',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]);
    ?>
    <div class="col-xs-12 ymo-card-form">
        <h1 class="">Form Non-Ajax Upload Example Without Model Multiple</h1>
        <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
            <p class="ymo-text-a">
                id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
            </p>
            <?php
            echo '<div class="form-group" style="margin-bottom: -4px;">';
            echo FileInput::widget([
                'name' => 'fileMultiple[]',
                'options' => [
                    'accept' => 'image/*',
                    'multiple'=>true,
                ],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => false,
                    'showUpload' => false,
                    'elCaptionText' => '#withoutModel',
                    'browseClass' => 'col-md-2 ymo-btn-upload',
                    'removeClass' => 'ymo-btn-upload input-upload-espace',
                    'browseIcon' => '',
                    'removeIcon' => '',
                    'browseLabel' =>  'Upload'
                ]
            ]);
            echo '</div>';
            ?>
            <span id="withoutModel" class="text-success upload-caption"></span>
            <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink' ,'style' => 'margin-top: 15px']) ?>
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
        'id' => 'form-upload-multiple-without-model',
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

    echo '</div>';

    ?>
    <span id=\"withoutModel\" class=\"text-success\"></span>
",
    'gfm');
?>
<br/>
<br/>

<h1>Controller</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    public function actionFormUploadWithoutModel()
    {
        \$model = new Dev;
        \$model->scenario = 'singleUpload';

        if (Yii::\$app->request->isPost) {

            if(@\$_FILES['file']['size'] > 0)
            {
                \$_FILES = \$this->getFileArray(\$model->formName(),\$_FILES);
            }

            \$model->file  = Upload::singleUpload(\$model, 'file');

            if (\$model->validate()) {

                echo \$this->render('@common/errors/response',[
                    'header' => Yii::t('app','Well done!'),
                    'body' => \$this->uploadResponse(\$model->file),
                    'footer' => Yii::t('app','ok'),
                ]);

            }else {

                /*Return form to validate form with modal*/
                \$form = new ActiveForm();

                echo \$this->render('@common/errors/popup',[
                    'header' => Yii::t('app','Validation errors!'),
                    'body' => \$form->errorSummary(\$model),
                ]);
            }
        }

        return \$this->render('module',[
            'page' => \$this->renderPartial('forms/form-upload-without-model',[
                'model' => \$model
            ]),
        ]);
    }
",
    'gfm');
?>

</div>