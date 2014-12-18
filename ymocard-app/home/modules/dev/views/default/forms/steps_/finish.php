<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/8/14
 * Time: 3:06 PM
 */

use yii\helpers\ArrayHelper;
use ymoext\ymoExt;

$view = Yii::$app->getView();
$view->registerJs("
    /*jQuery(document).on('click', '.file-preview-frame', function() {
		jQuery.ajax({
			url: '/dev/deleteFile',
			type: 'post',
			data: {fileId:this.id},
			success: function(data){
				if(data.status==='200'){
					jQuery('body').find('#' + this.id).remove();
				}else{
					alert('".\Yii::t('app','File id dont exist.')."');
				}
			},
			error: function(){
				alert('".\Yii::t('app','Post URL dont exist.')."');
			}
		});
    });*/
");

/*$steps = Yii::$app->session->get('steps');

if(\yii\helpers\ArrayHelper::getValue($steps,'step1') && \yii\helpers\ArrayHelper::getValue($steps,'formStep2'))
{
    $ymoClients = array_merge_recursive(\yii\helpers\ArrayHelper::getValue($steps,'formStep1'),\yii\helpers\ArrayHelper::getValue($steps,'formStep2'));
}

$initialPreview = [];
if(\yii\helpers\ArrayHelper::getValue($steps,'finish'))
{
    $ymoClientsFiles = \yii\helpers\ArrayHelper::getValue($steps,'finish');
    $initialPreview = \ymobiz\components\DisplayDocuments::preview($ymoClientsFiles['Dev']['fileStep']);
}*/

$step1 = new \ymobiz\models\common\Dev;
$step1->scenario = 'formStep1';

$step2 = new \ymobiz\models\common\Dev;
$step2->scenario = 'formStep2';

$step3 = new \ymobiz\models\common\Dev;
$step3->scenario = 'formStep3';

$model_ = ArrayHelper::merge($step1,$step2,$step3);


$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
    'id' => 'finish',
    'action' => '/dev/form-wizard?step=save',
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
             if(obj.status === 'save'){
                localStorage.clear();
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

<?= $form->field($model, 'name', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
]])->textInput(['class'=>'form-control ymo-input']) ?>

<div class="col-md-12 ymo-nopadding form-group ymo-group">
    <div class="col-md-12 ymo-nopadding">
    </div>
    <ul class="col-md-12 list-inline ymo-nopadding">
        <li>
			<?= \yii\helpers\Html::activeRadioList($model,'status',['0'=>'female','1'=>'male'],[
				'uncheckValue'=>null
			]);
			?>
        </li>
    </ul>
</div>

<?= $form->field($model, 'email', ['template'=>'{label}{input}{error}','options' => [
    'class' => 'col-md-8 form-group ymo-nopadding ymo-group'
]])->textInput(['class'=>'form-control ymo-input']) ?>


<div class="col-xs-12  ymo-nopadding ymo-card-form" style="margin: 7px 0px 7px 0px;">
	       <?php 
	       
		       $steps = Yii::$app->session->get('steps');
		       
		       if(\yii\helpers\ArrayHelper::getValue($steps,'finish'))
		       {
		       		$ymoClientsFiles = \yii\helpers\ArrayHelper::getValue($steps,'finish');
		       
		       		echo ymoExt::widget([
		       			'plugin' => 'previewFile',
		       			'pluginOptions' => 	[
		       				'url' => '/dev/delete-file',
		       				'route' => '/dev/display-document',
		       				'files' => $ymoClientsFiles['Dev']['fileStep'],
		       			]
		       		]);
		        }
	       ?>
</div>

<div class="col-md-12 ymo-nopadding ymo-Panel">
    <?php
    echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),'/dev/form-wizard?step=formStep2',[
        'class' => 'col-md-3 btn ymo-btn-dark-pink',
        'style' => 'margin-right: 15px;'
    ]);
    ?>

    <?php
    echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Finish'),[
        'class' => 'col-md-3 btn ymo-btn-dark-pink'
    ]);
    ?>
</div>

<div class="col-md-12 ymo-nopadding">
    <?php
    /*echo '<pre>';
    print_r(Yii::$app->session->get('steps'));
    echo '</pre>';*/
    ?>
</div>

<?php \mcms\ajaxform\AjaxActiveFormOne::end() ?>
