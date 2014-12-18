<?php

use mcms\ajaxform\AjaxActiveFormOne;
use yii\helpers\Html;

if($response!=false){
    echo '<pre>';
    print_r($response);
    echo '</pre>';
}

?>

<div class="ymo-card-form">
    <h1 class="">Form Ajax Upload Example With Model Multiple</h1>
<?php
    $form = AjaxActiveFormOne::begin([
        'options' => [
            'enctype'=>'multipart/form-data'
        ],
        'customCallbacks' => [
            'complete' => "
                if(jQuery('body').find('.error-summary ul li').size()===0) {
                    jQuery(form).resetForm();
                }
            "
        ]
        /*'pluginOptions' => [
            'dataType' => 'html',
            'resetForm' => false,
            'target' => '#modal-response',
        ]*/
    ]);
?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'status')->checkbox() ?>

<?= $form->field($model,'file[]')->widget(\kartik\widgets\FileInput::classname(), [
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
echo '<span id="customCaption" class="text-success upload-caption" style="margin-top: -19px;"></span>';
?>

<div class="col-md-12 ymo-nopadding">
    <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink']) ?>
</div>

<?php AjaxActiveFormOne::end(); ?>

</div>