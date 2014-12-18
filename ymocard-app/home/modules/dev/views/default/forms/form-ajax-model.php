<?php

/*Namespace Ajax Form*/
use ymobiz\extensions\marciocamello\ajaxform\AjaxActiveFormOne;
use yii\helpers\Html;

/*Init Ajax Form*/
$form = AjaxActiveFormOne::begin([
    'id' => 'form-with-ajax',
    'options'=>[
        'enctype'=>'multipart/form-data'
    ],
    'pluginOptions' => [
        'target' => '#response-form-with-ajax',
        'resetForm' => false,
    ],
    'customCallbacks' => [
        'complete' => new \yii\web\JsExpression("
            if(jQuery('body').find('.error-summary ul li').size()===0) {
                jQuery('form').resetForm();
            }
        "),
    ],
]);

?>

<!-- This examnple using form with default model and form structure from Yii 2-->
<div class="col-xs-12 ymo-card-form">

    <h1 class="">Form Ajax With Model</h1>

    <?= $form->field($model, 'ufirstname') ?>
    <?= $form->field($model, 'ulastname') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'countries_id')->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name')); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink']) ?>
    </div>

</form>

<?php

/*Close Ajax Form Without Extension*/
AjaxActiveFormOne::end();

?>

<br/>
<br/>

<h1>Usage</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    \$form = AjaxActiveFormOne::begin([
        'id' => 'form-with-ajax',
        'options'=>[
            'enctype'=>'multipart/form-data'
        ],
        'pluginOptions' => [
            'target' => '#response-form-with-ajax',
            'resetForm' => false,
        ],
        'customCallbacks' => [
            'complete' => new \\yii\\web\\JsExpression(\"
                if(jQuery('body').find('.error-summary ul li').size()===0) {
                    jQuery('form').resetForm();
                }
            \"),
        ],
    ]);
",
    'gfm');
?>
<br/>
<br/>

<h1>Controller</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    public function actionFormAjaxModel()
    {

        /*Model ymoClients*/
        \$model = new ymoClients;
        \$model->scenario = 'registerClient';

        /*Check is Ajax Request*/
        if(Yii::\$app->request->isAjax){

            /*Check is Post Request*/
            if (\$model->load(Yii::\$app->request->post())) {

                /*Return save method in model ymoClients, this method default is save()*/
                if(\$model->registerClient())
                {
                    /*Return message success from register client*/
                    echo \$this->render('@common/errors/popup',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => 'Record successfully saved',
                        'footer' => Yii::t('app','ok'),
                    ]);

                }else{

                    /*Return form to validate form with ajax*/
                    \$form = new ActiveForm();

                    /*Return message error from register client*/
                    echo \$this->render('@common/errors/popup',[
                        'header' => Yii::t('app','Validation errors!'),
                        'body' => \$form->errorSummary(\$model),
                    ]);
                }
            }
        }else{

            /*Return default view from form, and send model ymoClients to view*/
            return \$this->render('module',[
                'page' => \$this->renderPartial('forms/form-ajax-model',[
                    'model' => \$model
                ]),
            ]);
        }
    }
",
    'gfm');
?>

</div>