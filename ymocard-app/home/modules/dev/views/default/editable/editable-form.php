<?php

use yii\helpers\Markdown;
use cebe\markdown\GithubMarkdown;
use mcms\ajaxform\AjaxActiveFormOne;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = \ymobiz\models\common\Dev::findOne(1);
$model->scenario = 'editableForm';

?>

<div class="col-xs-12 ymo-card-form">

    <h1>Editable form with AjaxActiveForm</h1>

    <div class="col-md-6 ymo-nopadding">

            <h2 class="col-md-12 ymo-nopadding">Default usage</h2>

            <?php

            echo \ymobiz\extensions\marciocamello\ajaxform\EditableActiveFormOne::widget([
                'model' => $model,
                'attributes' => [
                    'email',
                    'password',
                    'name',
                ]
            ]);

            ?>
    </div>

    <br/>
    <br/>

    <div class="col-md-12 ymo-account-left ymo-nopadding ymo-Panel">

        <h1>Usage</h1>
<?php
echo Markdown::process(
    "
    echo \\ymobiz\\extensions\\marciocamello\\ajaxform\\EditableActiveFormOne::widget([
        'model' => \$model,
        'attributes' => [
            'email',
            'password',
            'name',
        ]
    ]);
",
    'gfm');
?>
    </div>

        <!--Start contact details-->
        <div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">

            <h2 class="col-md-12 ymo-nopadding">Ymocard Editable Objects based in design project</h2>

            <h2 class="col-md-4 ymo-title-a ymo-Panel">
                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','contact details')?>
            </h2>

            <?php

            echo \ymobiz\extensions\marciocamello\ajaxform\EditableActiveFormOne::widget([
               'id' => 'form-contact-details',
               'model' => $model,
               'formTemplate' => '<li class="form-objects {displaylabel}" id="{formid}"><strong>{label}</strong>{field}<p class="value-editable" id="{formid}-{fieldid}">{value}</p></li>',
               'tagTemplate' => '<ul class="col-md-12 ymo-Panel">{activeform}</ul>',
               'editButtomClass' => 'ymo-btn-logout',
               'saveButtomClass' => 'ymo-btn-logout',
               'cancelButtomClass' => 'ymo-btn-logout',
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
                   'repassword' => [
                       'type' => 'field',
                       'displayLabel' => 'none',
                       'options' => [
                           'inputType' => 'textInput',
                           'fieldOptions' => ['template'=>'{input}'],
                           'inputOptions' => ['class'=>'ymo-input form-control']
                       ]
                   ],
                   'name' => [
                       'label' => 'country',
                       'type' => 'field',
                       'options' => [
                           'inputType' => 'dropDownList',
                           'fieldOptions' => ['template'=>'{input}'],
                           'inputOptions' => \yii\helpers\ArrayHelper::map(\ymobiz\models\common\ymoCountries::find()->all(), 'name', 'name'),
                       ]
                   ],
               ],
               'activeForm' => [
                   'class' => 'ymobiz\extensions\marciocamello\ajaxform\AjaxActiveFormOne',
                   'options' => [
                       'customCallbacks' => [
                           'complete' => new \yii\web\JsExpression("
                            var obj = JSON.parse(event.responseText);
                            jQuery('.form-response').html(obj.content);
                            if(obj.status===200){
                                activeFormPlugin.updateForm();
                            }
                       ")
                       ]
                   ],
               ]
            ]);

            ?>
        </div>
        <!--Start contact details-->

    <br/>
    <br/>

    <div class="col-md-12 ymo-account-left ymo-nopadding ymo-Panel">

        <h1>Usage</h1>
    <?php
    echo Markdown::process(
        "
       'id' => 'form-contact-details',
               'model' => \$model,
               'formTemplate' => '<li class=\"form-objects\" id=\"{formid}\"><strong>{label}</strong>{field}<p class=\"value-editable\" id=\"{formid}-{fieldid}\">{value}</p></li>',
               'tagTemplate' => '<ul class=\"col-md-12 ymo-Panel\">{activeform}</ul>',
               'editButtomClass' => 'ymo-btn-logout',
               'saveButtomClass' => 'ymo-btn-logout',
               'cancelButtomClass' => 'ymo-btn-logout',
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
                   'repassword' => [
                       'type' => 'field',
                       'displayLabel' => 'none',
                       'options' => [
                           'inputType' => 'textInput',
                           'fieldOptions' => ['template'=>'{input}'],
                           'inputOptions' => ['class'=>'ymo-input form-control']
                       ]
                   ],
                   'name' => [
                       'label' => 'country',
                       'type' => 'field',
                       'options' => [
                           'inputType' => 'dropDownList',
                           'fieldOptions' => ['template'=>'{input}'],
                           'inputOptions' => \\yii\\helpers\\ArrayHelper::map(\\ymobiz\\models\\common\\ymoCountries::find()->all(), 'name', 'name'),
                       ]
                   ],
               ],
               'activeForm' => [
                   'class' => 'ymobiz\\extensions\\marciocamello\\ajaxform\\AjaxActiveFormOne',

    ",
        'gfm');
    ?>

<br/>
<br/>

<h1>Controller Example</h1>
<?php
echo Markdown::process(
    "
    /**
     * @inheritdoc
     */
    public function actionEditableForm()
    {
        /*Model Dev*/
        \$model = Dev::findOne(1);
        \$model->scenario = 'editableForm';

        \$function = new \ReflectionClass(\$model);

        /*Check is Ajax Request*/
        if(Yii::\$app->request->isAjax){

            /*Check is Post Request*/
            if (\$model->load(Yii::\$app->request->post())) {

                /*Return save method in model ymoClients, this method default is save()*/
                if(\$model->update())
                {
                    /*Return message success from register client*/
                    \Yii::\$app->response->format = \\yii\\web\\Response::FORMAT_JSON;

                    return [
                        'name' => 'success',
                        'message' => 'Successfull.',
                        'response' => Yii::\$app->request->post(\$function->getShortName()),
                        'content' => \$this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Well done!'),
                            'body' => 'Record successfully saved',
                            'footer' => Yii::t('app','ok'),
                        ]),
                        'status' => 200,
                    ];

                }else{

                    /*Return form to validate form with ajax*/
                    \Yii::\$app->response->format = \\yii\\web\\Response::FORMAT_JSON;

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
                        'errors' => \$model->getErrors(),
                        'content' => \$this->render('@common/errors/popup',[
                            'header' => Yii::t('app','Validation errors!'),
                            'body' => Html::errorSummary(\$model,['class'=>'error-summary']),
                        ]),
                        'status' => 400,
                    ];
                }
            }
        }else{

            return \$this->render('module',[
                'page' => \$this->renderPartial('editable/editable-form'),
            ]);
        }
    }

",
    'gfm');
?>

    </div>

</div>
</div>

</div>