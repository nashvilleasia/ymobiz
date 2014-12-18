<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/8/14
 * Time: 3:06 PM
 */

$model->scenario = 'formStep1';

//unset($_SESSION['steps']);
$view = Yii::$app->getView();
//$view->registerJs("localStorage.clear();");

?>

<?php

$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
    'id' => 'form',
    'action' => '/dev/form-wizard?step=formStep1',
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

<div class="form-response"></div>

<?= $form->field($model, 'name', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group',
]])->textInput(['class'=>'form-control ymo-input']); ?>

<div class="col-md-12 ymo-nopadding ymo-Panel">
    <?php
    echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
        'class' => 'col-md-3 btn ymo-btn-dark-pink',
    ]);
    ?>
</div>

<div class="col-md-12 ymo-nopadding form-group ymo-group">
    <div class="col-md-12 ymo-nopadding">
    </div>
    <ul class="col-md-12 list-inline ymo-nopadding">
        <li>
            <?php
            /*echo $form->field($model, 'status', ['template'=>'{label}{input}{error}','options' =>[
                'class' => 'col-md-12 ymo-nopadding ymo-group',
            ]
            ])->radioList(array('0'=>"Yes",'1'=>"No"), [
                'inline'=>true,
                'class'=>'radio-name ymo-nopadding'
            ]);*/

            /*echo \yii\helpers\Html::activeRadioList($model,'status',['0'=>'female','1'=>'male'],[	
                'uncheckValue'=>null,
            	'class' => 'custom-radio',	
				'itemOptions' => [
            		'class' => 'ymo-radio',
					'labelOptions' => [
            			'class' => 'ymo-radio-label',
            		],
            	],
            ]);*/
            
            echo $form->field($model, 'status', ['template'=>'{label}{input}{error}','options' =>[
            	'class' => 'col-md-12 ymo-nopadding ymo-group',
            ]
            ])->radioList(['0'=>'female','1'=>'male'], [
            	'inline'=>true,
            	'class' => 'radio-name ymo-nopadding custom-radio',	
				'itemOptions' => [
            		'class' => 'ymo-radio',
					'labelOptions' => [
            			'class' => 'ymo-radio-label',
            		],
            	],
            ]);
            
            /*echo \yii\helpers\Html::activeCheckboxList($model,'status',['0'=>'female','1'=>'male'],[
            	'uncheckValue'=>null,
            	'class' => 'radio-name',
            	'itemOptions' => [
            		'class' => 'ymo-checkbox',
            		'labelOptions' => [
            			'class' => 'ymo-checkbox-label checkbox-inline',
            		],
            	],
            ]);*/
            
            
            ?>
        </li>
    </ul>
</div>

<div class="col-md-12 ymo-nopadding">
    <?php
    echo '<pre>';
    print_r(Yii::$app->session->get('steps'));
    echo '</pre>';
    ?>
</div>
<?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>

