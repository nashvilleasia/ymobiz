<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/8/14
 * Time: 3:06 PM
 */

$step1 = new \ymobiz\models\common\Dev();
$step1->scenario = 'formStep1';

$step2 = new \ymobiz\models\common\Dev();
$step2->scenario = 'formStep2';

$step3 = new \ymobiz\models\common\Dev();
$step3->scenario = 'formStep3';

$view = Yii::$app->getView();
$view->registerJsFile('/home/web/themes/basic/js/jquery.steps.min.js',\yii\web\YiiAsset::className());
$view->registerJsFile('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js',\yii\web\YiiAsset::className());

$view->registerJs("

    function errorPlacement(error, element)
    {
        element.before(error);

        //element.popover({
        //    content: error.text(),
        //    placement: function ()
        //    {
        //        return (element.parents('.content').width() >= 550) ? 'right'' : 'top';
        //    },
        //    trigger: 'focus hover'
        //});
        //$('.popover-content', element.next('.popover')).empty().prepend(error);
    }


    /*$('#form-2').validate({
        errorPlacement: errorPlacement,
        rules: {
            confirm: {
            equalTo: '#password'
            }
        }
    });*/

var settings = {
    headerTag: 'h3',
    bodyTag: 'section',

    /* Behaviour */
    autoFocus: false,
    enableAllSteps: false,
    enableKeyNavigation: true,
    enablePagination: true,
    suppressPaginationOnFocus: true,
    enableContentCache: true,
    enableCancelButton: true,
    enableFinishButton: true,
    preloadContent: false,
    showFinishButtonAlways: false,
    forceMoveForward: false,
    saveState: false,
    startIndex: 0,

    /* Transition Effects */
    transitionEffect: $.fn.steps.transitionEffect.none,
    transitionEffectSpeed: 200,

    /* Templates */
    titleTemplate: '<span class=\"number\">#index#.</span> #title#',
    loadingTemplate: '<span class=\"spinner\"></span> #text#',


    onStepChanging: function (event, currentIndex, newIndex)
    {
        $('#form-2').validate().settings.ignore = ':disabled,:hidden';
        return $('#form-2').valid();
    },
    onFinishing: function (event, currentIndex)
    {
        $('#form-2').validate().settings.ignore = ':disabled';
        return $('#form-2').valid();
    },
    onFinished: function (event, currentIndex)
    {
        alert('Submitted!');
    },

    /* Labels */
    labels: {
        cancel: \"Cancel\",
        current: \"current step:\",
        pagination: \"Pagination\",
        finish: \"Finish\",
        next: \"Next\",
        previous: \"Previous\",
        loading: \"Loading ...\"
    }
}

$('#wizard-2').steps(settings);



");

$form = \yii\bootstrap\ActiveForm::begin([
    'id' => 'form-2',
    'action' => '/dev/form-wizard?step=step1',
    'options' => [
        'enctype'=>'multipart/form-data'
    ],
]);

?>

<section id="basic-form">
        <div id="wizard-2">
            <h3>Step 1</h3>
            <section class="col-md-12 ymo-nopadding">
                <?= $form->field($step1, 'name', ['template'=>'{label}{input}{error}','options' => [
                    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
                ]])->textInput(['class'=>'form-control ymo-input']) ?>
            </section>

            <h3>Step 2</h3>
            <section class="col-md-12 ymo-nopadding">
                <?= $form->field($step2, 'email', ['template'=>'{label}{input}{error}','options' => [
                    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
                ]])->textInput(['class'=>'form-control ymo-input']) ?>
            </section>

            <h3>Step 3</h3>
            <section class="col-md-12 ymo-nopadding">
                <?= $form->field($step3, 'file', ['template'=>'{label}{input}{error}','options' => [
                    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
                ]])->fileInput(['class'=>'form-control ymo-input']) ?>
            </section>

            <h3>Finish</h3>
            <section>
                <?php
                echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Finish'),[
                    'class' => 'col-md-3 btn ymo-btn-dark-pink',
                ]);
                ?>
            </section>
        </div>
</section>

<?php \yii\bootstrap\ActiveForm::end() ?>

<?php
/*
$form = \yii\bootstrap\ActiveForm::begin([
    'options' => [
        'enctype'=>'multipart/form-data'
    ],
]);

*/?><!--

<div class="form-response"></div>

<?/*= $form->field($step1, 'name', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
]])->textInput(['class'=>'form-control ymo-input']) */?>

<?/*= $form->field($step2, 'email', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
]])->textInput(['class'=>'form-control ymo-input']) */?>

<?/*= $form->field($step3, 'file', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
]])->fileInput(['class'=>'form-control ymo-input']) */?>

<div class="col-md-12 ymo-nopadding ymo-Panel">
    <?php
/*    echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
        'class' => 'col-md-3 btn ymo-btn-dark-pink',
    ]);
    */?>
</div>

--><?php /*\yii\bootstrap\ActiveForm::end() */?>

