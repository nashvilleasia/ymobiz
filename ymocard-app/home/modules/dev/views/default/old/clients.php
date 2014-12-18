<?php

/*Namespace Ajax Form*/
use mcms\ajaxform\AjaxActiveForm;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/*Init Ajax Form*/
$form = AjaxActiveForm::begin([
    'id' => 'form-with-ajax',
    'options'=>[
        'enctype'=>'multipart/form-data'
    ],
    'pluginOptions' => [
        'target' => '#response-form-with-ajax',
        'resetForm' => false,
    ],
    'resetForm' => new \yii\web\JsExpression("
        if(jQuery('body').find('.error-summary ul li').size()===0) {
            jQuery('#form-with-ajax').resetForm();
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

<div class="container">

    <!-- This examnple using form with default model and form structure from Yii 2-->
        <div class="col-xs-6">
            <div class="col-xs-12 ymo-card-form">
                <h1 class="">Form Ajax Example With Extension</h1>

                <?= $form->field($ymoClients, 'ufirstname') ?>
                <?= $form->field($ymoClients, 'ulastname') ?>
                <?= $form->field($ymoClients, 'email') ?>
                <?= $form->field($ymoClients, 'countries_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\common\ymoCountries::find()->all(), 'id', 'name')); ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink']) ?>
                </div>

            </div>
        </div>
    </form>

<?php

/*Close Ajax Form Without Extension*/
AjaxActiveForm::end();

/*Init Ajax Form Without Extension*/
$form = ActiveForm::begin([
    'id' => 'form-without-ajax',
    'options'=>[
        'enctype'=>'multipart/form-data'
    ]
]);

?>

    <!--This examnple using form with default model and form structure from Yii 2-->
    <div class="col-xs-6">
        <div class="col-xs-12 ymo-card-form">

            <h1 class="">Form Ajax Example Without Extension</h1>

            <?= $form->field($ymoClients, 'ufirstname') ?>
            <?= $form->field($ymoClients, 'ulastname') ?>
            <?= $form->field($ymoClients, 'email') ?>
            <?= $form->field($ymoClients, 'countries_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\common\ymoCountries::find()->all(), 'id', 'name')); ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink']) ?>
            </div>

        </div>
    </div>

</div>
<?php

/*Close Ajax Form Without Extension*/
ActiveForm::end();

/*Init Ajax Form*/
/*$customForm = AjaxActiveForm::begin([
    'id' => 'ymoClients-custom-form',
    'enableClientValidation' => false,
    'options'=>[
        'enctype'=>'multipart/form-data'
    ],
    'pluginOptions' => [
        'target' => '#response-ymoClients-custom-form',
        'resetForm' => false,
    ],
    'resetForm' => new \yii\web\JsExpression("
        if(jQuery('body').find('.error-summary ul li').size()===0) {
            jQuery('#ymoClients-custom-form').resetForm();
        }
    ")
]);*/

?>

<!-- This examnple using form with default model and form structure from Yii 2-->
<!--<div class="container">

    <h2>Create Client Example</h2>

    <div class="form-group field-ymoclients-ufirstname">
        <?/*= Html::activeLabel($ymoClients,'ufirstname'); */?>
        <?/*= Html::activeTextInput($ymoClients,'ufirstname',[
            'class' => 'form-control'
        ]); */?>
        <?/*= Html::error($ymoClients,'ufirstname'); */?>
    </div>

    <div class="form-group field-ymoclients-ulastname">
        <?/*= Html::activeLabel($ymoClients,'ulastname'); */?>
        <?/*= Html::activeTextInput($ymoClients,'ulastname',[
            'class' => 'form-control'
        ]); */?>
        <?/*= Html::error($ymoClients,'ulastname'); */?>
    </div>

    <div class="form-group field-ymoclients-email">
        <?/*= Html::activeLabel($ymoClients,'email'); */?>
        <?/*= Html::activeTextInput($ymoClients,'email',[
            'class' => 'form-control'
        ]); */?>
        <?/*= Html::error($ymoClients,'email'); */?>
    </div>

    <div class="form-group">
        <?/*= Html::submitButton('Submit', ['class' => 'btn btn-primary']) */?>
    </div>

</div>-->

<?php
/*Close Ajax Form*/
//AjaxActiveForm::end();
?>
