<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/8/14
 * Time: 3:06 PM
 */

$model->scenario = 'formStep2';

?>

<?php

$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
    'id' => 'step1',
    'action' => '/dev/form-wizard?step=formStep2',
    'options' => [
        'enctype'=>'multipart/form-data'
    ],
    'model' => $model,
    'localStorage' => true,
    'pluginOptions' => [
        'dataType' => 'json',
        'resetForm' => false,
    ],
    'customCallbacks' => [
        'complete' => new \yii\web\JsExpression("
             var obj = JSON.parse(event.responseText);
             if(obj.status === 200){
                window.location = obj.redirect;
             }
             return false;
        "),
    ],
    'loadingOptions' => "
    {
        text: '".Yii::t('app','Loading')."',
        'class': \"fa fa-cog fa-spin fa-lg\",
        'tpl': '<span class=\"isloading-wrapper %wrapper%\">%text%<i class=\"%class% icon-spin\"></i></span>',
    }"
]);

?>


<?= $form->field($model, 'email', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
]])->textInput(['class'=>'form-control ymo-input']) ?>

<div class="col-md-12 ymo-nopadding ymo-Panel">

    <?php
    echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),'/dev/form-wizard',[
        'class' => 'col-md-3 btn ymo-btn-dark-pink',
        'style' => 'margin-right: 15px;'
    ]);
    ?>

    <?php
    echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
        'class' => 'col-md-3 btn ymo-btn-dark-pink',
    ]);
    ?>

</div>

<div class="col-md-12 ymo-nopadding">
    <?php
    echo '<pre>';
    print_r(Yii::$app->session->get('steps'));
    echo '</pre>';
    ?>
</div>

<?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
