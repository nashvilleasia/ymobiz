<?php

use mcms\ajaxform\AjaxActiveForm;
use yii\helpers\Html;
use kartik\widgets\FileInput;

?>

<?php

$form = AjaxActiveForm::begin([
    'id' => 'form-ajax-upload-model',
    'options'=>[
        'enctype'=>'multipart/form-data'
    ],
    'pluginOptions' => [
        'target' => '#response-form-ajax-upload-model',
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
    <h1 class="">Form Ajax Upload Example With Model</h1>
    <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">

        <p class="ymo-text-a">
            id document <span>(such as national id card, passport or driver licence)</span><span class="badge ymo-badge-b">?</span>
        </p>

        <?php

        echo $form->field($model,'file', ['template'=>'{input}'])->widget(FileInput::classname(), [
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
        'id' => 'form-ajax-upload-model',
        'options'=>[
            'enctype'=>'multipart/form-data'
        ],
        'pluginOptions' => [
            'target' => '#response-form-ajax-upload-model',
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
            'text': '".Yii::t('app','Loading')."',
            'class': \"fa fa-cog fa-spin fa-lg\",
            'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
        }
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
    public function actionFormAjaxUploadModel()
    {
        \$model = new Dev;
        \$model->scenario = 'singleUpload';

        if(Yii::\$app->request->isAjax){

            /*Check is Post Request*/
            if (Yii::\$app->request->isPost) {

                if(@\$_FILES['file']['size'] > 0)
                {
                    \$_FILES = \$this->getFileArray(\$model->formName(),\$_FILES);
                }

                \$model->file  = UploadedFile::getInstance(\$model, 'file');

                /*Return save method in model ymoClients, this method default is save()*/
                if(\$model->validate())
                {

                    echo \$this->render('@common/errors/response',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => \$this->uploadResponse(\$model->file),
                        'footer' => Yii::t('app','ok'),
                    ]);

            }else {

                /*Return form to validate form with ajax*/
                \$form = new ActiveForm();

                /*Return message success from register client*/
                echo \$this->render('@common/errors/popup',[
                    'header' => Yii::t('app','Validation errors!'),
                    'body' => \$form->errorSummary(\$model),
                ]);
            }
        }
        }else{

            return \$this->render('module',[
                'page' => \$this->renderPartial('forms/form-ajax-upload-model',[
                    'model' => \$model
                ]),
            ]);
        }
    }
",
    'gfm');
?>

</div>