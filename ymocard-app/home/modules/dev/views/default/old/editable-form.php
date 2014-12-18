<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;
use common\extensions\marciocamello\ajaxform\AjaxActiveFormOne;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = \common\models\common\Dev::findOne(1);
$model->scenario = 'editableForm';

?>


<div class="col-xs-12 ymo-card-form">
<div class="col-md-6 ymo-account-left ymo-nopadding ymo-Panel">

    <div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">
        <h2 class="col-md-7 ymo-title-a ymo-Panel">account details</h2>

                <?php

                echo \mcms\ajaxform\EditableActiveForm::widget([
                    'id' => 'form-account-details',
                    'model' => $model,
                    'attributes' => [
                        'email' => [
                            'type' => 'field',
                            'options' => [
                                'inputType' => 'textInput',
                                'fieldOptions' => ['template'=>'{input}'],
                                'inputOptions' => ['class'=>'ymo-input form-control']
                            ]
                        ],
                        'password' => [
                            'type' => 'field',
                            'options' => [
                                'inputType' => 'textInput',
                                'fieldOptions' => ['template'=>'{input}'],
                                'inputOptions' => ['class'=>'ymo-input form-control']
                            ]
                        ],
                    ],
                    'activeForm' => [
                        'class' => 'common\extensions\marciocamello\ajaxform\AjaxActiveFormOne',
                    ]
                ]);

                ?>
        </div>
    </div>

    <!--Start contact details-->
    <div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">
        <h2 class="col-md-7 ymo-title-a ymo-Panel">
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','contact details')?>
        </h2>

        <?php

       echo \mcms\ajaxform\EditableActiveForm::widget([
            'id' => 'form-contact-details',
            'model' => $model,
            'attributes' => [
                'name' => [
                    'label' => 'country',
                    'type' => 'field',
                    'options' => [
                        'inputType' => 'dropDownList',
                        'fieldOptions' => ['template'=>'{input}'],
                        'inputOptions' => \yii\helpers\ArrayHelper::map(\common\models\common\ymoCountries::find()->all(), 'name', 'name'),
                    ]
                ],
            ],
            'activeForm' => [
                'class' => 'common\extensions\marciocamello\ajaxform\AjaxActiveFormOne',
            ]
        ]);

        ?>
    </div>
</div>

<?php
/*

    $form = AjaxActiveFormOne::begin([
        'id' => 'form-with-ajax',
        'options'=>[
            'enctype'=>'multipart/form-data'
        ],
        'pluginOptions' => [
            'dataType' => 'json',
            'target' => '#response-form-with-ajax',
            'resetForm' => false,
        ],
        'resetForm' => new \yii\web\JsExpression("
            if(jQuery('body').find('.error-summary ul li').size()===0) {
                jQuery('#form-with-ajax').resetForm();
            }
        "),
        'customCallbacks' => [
            'complete' => new \yii\web\JsExpression("
                var obj = JSON.parse(event.responseText);
                console.log(obj);
                jQuery('.form-response').html(obj.content);
                if(obj.status===200){
                    ymoFormEditable.hideForm();
                    ymoFormEditable.updateForm(obj.response);
                }
            ")
        ]
    ]);

    */?><!--

    <div class="form-response"></div>

        <div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">
            <h2 class="col-md-7 ymo-title-a ymo-Panel">account details</h2>

            <a href="#" class="edit-form ymo-btn-logout">edit</a>
            <?/*= Html::submitButton('save', ['class' => 'save-form ymo-btn-logout','style' => 'display:none;']) */?>
            <?/*= Html::tag('span','cancel', ['class' => 'cancel-form ymo-btn-logout','style' => 'display:none;']) */?>

            <ul class="col-md-12 ymo-Panel">

                <li class="form-objects">
                    <strong>email</strong>
                    <?/*= $form->field($model, 'email', ['template'=>'{input}'])->textInput(['class'=>'ymo-input form-control']) */?>
                    <p class="value-editable" id="dev-email"><?/*=$model->email*/?></p>
                </li>

                <li class="form-objects">
                    <strong>password</strong>
                    <?/*= $form->field($model, 'password', ['template'=>'{input}'])->passwordInput(['class'=>'ymo-input form-control']) */?>
                    <p class="value-editable" id="dev-password"><?/*=$model->password*/?></p>
                </li>

                <li class="form-objects">
                    <strong>country</strong>
                    <?/*= $form->field($model, 'name', ['template'=>'{input}'])->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\common\ymoCountries::find()->all(), 'name', 'name')); */?>
                    <p class="value-editable" id="dev-name"><?/*=$model->name*/?></p>
                </li>

            </ul>

        </div>

    --><?php /*AjaxActiveFormOne::end();*/?>
<?php

/*$('#address').editable({
                url: '/editable',
                toggle:'manual',
                value: {
                    city: \"Moscow\",
                    street: \"Lenina\",
                    building: \"1\"
                },
                validate: function(value) {
                    if(value.city == '') return 'city is required!';
                },
                display: function(value) {
                    if(!value) {
                        $(this).empty();
                        return;
                    }
                    var html = ".$this->formValue2Html()."
                    $(this).html(html);
                }
            });

            $('#edit-address').click(function(e) {
                e.stopPropagation();
                e.preventDefault();
                $('#address').editable('toggle');
            });

$('#form-editable').editable({
    mode:"inline",
    id:"form-editable",
    type:"yiiForm",
    url:"editable",
    placement:"top",
    emptytext:"",
    showbuttons:"bottom",
    send:"auto",
    tpl:false,
    name:"content",
    pk:1,
    value:{"city":"Moscow","street":"Lenina","building":1},
    display: function(value) {
        if(!value) {
            $(this).empty();
            return;
        }
        var html = $("<div>").text(value.city).html() + " </br> " + $("<div>").text(value.street).html() + " </br> " + $("<div>").text(value.building).html();
        $(this).html(html);
    },
    validate: function(value) {
        if(value.city == "") return "city is required!";
    }
});
*/
$view = Yii::$app->getView();

?>
<!--<div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">
    <h2 class="col-md-7 ymo-title-a ymo-Panel">account details</h2>

    <span class="editable-container editable-inline" style="">
        <a href="#" class="ymo-btn-logout" id="edit-form-editable">edit</a>
        <?/*= Html::tag('span','save', ['class' => 'ymo-btn-logout','id' => 'save-form-editable']) */?>
    </span>

    <ul class="col-md-12 ymo-Panel">

        <?php
/*
        echo \common\extensions\marciocamello\xeditable\XEditableFormOne::widget([
            'id' => 'form-editable',
            'model' => $model,
            'type' => 'yiiForm',
            'pluginOptions' => [
                'url' => 'post-form',
                'toggle' => 'manual',
                'name' => 'content',
                'pk' => 1,
                'value' => [
                    'email' => 'p.almeida85@gmail.com',
                    'password' => '123456789',
                ],
            ],
        ]);

        */?>
        </ul>
    </div>
</div>-->

</div>
</div>