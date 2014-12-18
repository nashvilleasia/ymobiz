<?php

/*Namespace Ajax Form*/
use kartik\widgets\ActiveForm;
use yii\helpers\Html;


?>


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
<div class="container">

    <h2>Form Ajax Example Without Extension</h2>

    <?= $form->field($ymoClients, 'ufirstname') ?>
    <?= $form->field($ymoClients, 'ulastname') ?>
    <?= $form->field($ymoClients, 'email') ?>
    <?= $form->field($ymoClients, 'countries_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

</div>

<?php
/*Close Ajax Form Without Extension*/
ActiveForm::end();
