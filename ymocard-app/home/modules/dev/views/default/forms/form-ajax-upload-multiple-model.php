<?php

use mcms\ajaxform\AjaxActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;

?>

<?php

$form = AjaxActiveForm::begin([
    'id' => 'form-ajax-upload-multiple-without-model',
    'options'=>[
        'enctype'=>'multipart/form-data'
    ],
    'pluginOptions' => [
        'target' => '#response-form-ajax-upload-multiple-model',
        'resetForm' => false,
    ],
    'customCallbacks' => [
        'complete' => new \yii\web\JsExpression("
            if(jQuery('body').find('.error-summary ul li').size()===0) {
                jQuery('form').resetForm();
            }
        "),
    ],
    'loadingOptions' => "
    {
        text: '".Yii::t('app','Loading')."',
        'class': \"fa fa-cog fa-spin fa-lg\",
        'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
    }
"
]);
?>

<div class="col-xs-12 ymo-card-form">
    <h1 class="">Form Ajax Upload Example With Model Multiple</h1>
    <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">

        <p class="ymo-text-a">
            id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
        </p>

        <?php

        echo $form->field($model,'fileMultiple[]', ['template'=>'{input}'])->widget(FileInput::classname(), [
            'id' => 'form-ajax-upload-multiple-model',
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

    </form>
<?php AjaxActiveForm::end() ?>

<br/>
<br/>

<h1>Usage</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    \$form = AjaxActiveForm::begin([
        'id' => 'form-ajax-upload-multiple-without-model',
        'options'=>[
            'enctype'=>'multipart/form-data'
        ],
        'pluginOptions' => [
            'target' => '#response-form-ajax-upload-multiple-model',
            'resetForm' => false,
        ],
        'customCallbacks' => [
            'complete' => new \\yii\\web\\JsExpression(\"
                if(jQuery('body').find('.error-summary ul li').size()===0) {
                    jQuery('form').resetForm();
                }
            \"),
        ],
        'loadingOptions' => \"
        {
            text: '".Yii::t('app','Loading')."',
            'class': \"fa fa-cog fa-spin fa-lg\",
            'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
        }
    \"
    ]);
\"
]);

/*Input file*/
echo \$form->field(\$model,'file', ['template'=>'{input}'])->widget(FileInput::classname(), [
    'options' => [
        'accept' => 'image/*',
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
    public function actionFormUploadMultipleWithoutModel()
    {
        \$model = new Dev;
        \$model->scenario = 'multipleUpload';

        if (Yii::\$app->request->isPost) {

            if(\$_FILES){

                foreach(\$_FILES as \$fileKey => \$fileValue){
                    if(@\$fileValue['size'][0] != 0)
                    {
                        \$_FILES = \$this->getFileArray(\$model->formName(),\$_FILES);
                    }else{
                        if (!\$model->validate()){

                            /*Return form to validate form with ajax*/
                            \$form = new ActiveForm();

                            /*Return message success from register client*/
                            echo \$this->render('@common/errors/popup',[
                                'header' => Yii::t('app','Validation errors!'),
                                'body' => \$form->errorSummary(\$model),
                            ]);
                        }
                    }
                }

                \$files  = Upload::multipleUpload(\$model, 'fileMultiple', []);

                \$filesUploaded = false;

                foreach (\$files as \$file) {

                    \$_model = new Dev;
                    \$_model->scenario = 'multipleUpload';

                    $\_model->fileMultiple = \$file;

                    if (\$_model->validate()) {

                        \$filesUploaded .= \$this->uploadResponse(\$_model->fileMultiple);

                    } else {

                        /*Return form to validate form with ajax*/
                        \$form = new ActiveForm();

                        /*Return message success from register client*/
                        echo \$this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => \$form->errorSummary(\$_model),
                        ]);
                    }
                }

                if (!\model->hasErrors('fileMultiple')){

                    echo \$this->render('@common/errors/response',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => \$filesUploaded,
                        'footer' => Yii::t('app','ok'),
                    ]);
                }
            }
        }

        return \$this->render('module',[
            'page' => \$this->renderPartial('forms/form-upload-multiple-without-model',[
                'model' => \$model
            ]),
        ]);
    }
",
    'gfm');
?>
</div>