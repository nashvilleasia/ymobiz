<?php

/*Namespace Ajax Form*/
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/*Init Ajax Form Without Extension*/
$form = ActiveForm::begin([
    'id' => 'form-without-ajax',
    'options'=>[
        'enctype'=>'multipart/form-data'
    ]
]);

?>

<!--This examnple using form with default model and form structure from Yii 2-->
<div class="col-xs-12 ymo-card-form">

    <h1 class="">Form Non Ajax With Model</h1>

    <?= $form->field($model, 'ufirstname') ?>
    <?= $form->field($model, 'ulastname') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'countries_id')->dropDownList(\yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'id', 'name')); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn ymo-btn-dark-pink']) ?>
    </div>
<?php

/*Close Ajax Form Without Extension*/
ActiveForm::end();

?>

    <br/>
    <br/>

    <h1>Usage</h1>
<?php
echo \yii\helpers\Markdown::process(
    "
    \$form = ActiveForm::begin([
        'id' => 'form-without-ajax',
        'options'=>[
            'enctype'=>'multipart/form-data'
        ]
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
        public function actionFormModel()
        {
            /*Model ymoClients*/
            \$model = new ymoClients;
            \$model->scenario = 'registerClient';

            if (\$model->load(Yii::\$app->request->post()) && \$model->validate()) {
                if(\$model->registerClient()){
                    /*Return default view from form, and send model ymoClients to view*/
                    echo \$this->render('@common/errors/popup',[
                        'header' => Yii::t('app','Well done!'),
                        'body' => 'Record successfully saved',
                        'button' => Html::a(Yii::t('app','ok'),'',['class' => 'btn btn-blue center-block'])
                    ]);
                }
            }

            /*Return default view from form, and send model ymoClients to view*/
            return \$this->render('module',[
                'page' => \$this->renderPartial('forms/form-model',[
                    'model' => \$model
                ]),
            ]);
        }
    ",
        'gfm');
    ?>

</div>
