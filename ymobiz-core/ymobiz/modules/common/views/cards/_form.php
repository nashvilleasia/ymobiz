<?php

use yii\helpers\Html;
use mcms\isloading\Isloading;
use kartik\widgets\SwitchInput;
use \mcms\ajaxform\AjaxActiveFormOne;
use kartik\widgets\DatePicker;
use common\models\ymoClients;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ymoCards */
/* @var $form \mcms\ajaxform\AjaxActiveFormOne */
?>

<div class="ymo-cards-form">

<?php 	
	$beforeSend = false;
	if($model->isNewRecord==true)
	{
		$beforeSend = "
			if(jQuery('body').find('.error-summary ul li').size()===0) {
				jQuery('form').resetForm();
			}
		";
	}
	
	$form = AjaxActiveFormOne::begin([
		'id' => 'ymo-cards-form',
        'model' => $model,
        'pluginOptions' => [
			'dataType' => 'json',
			'resetForm' => $beforeSend,
		],
		'customCallbacks' => [
			'complete' => new \yii\web\JsExpression("
				var obj = JSON.parse(event.responseText);
				if(obj.status === 200){
					".Isloading::widget([
						'id' => 'response-result-popup',
						'pluginOptions' => [
							'text' => Yii::t('app','Sending, wait...')
						],	
						'response' => new \yii\web\JsExpression('
							jQuery("#load-modal-result-popup").modal("hide"); 
						    	jQuery("#ajax-msg").html(obj.content);  
						        $.isLoading("hide");
						')
					])."
				}else if(obj.status === 500){
					jQuery('#ajax-msg').html(obj.content);;
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


		$model->dateissue = date('d/m/Y', $model->dateissue);
		$model->dateexpiration = date('d', $model->dateexpiration) . '/' . date('Y', $model->dateexpiration);
		
	?>
	
	<div id="ajax-msg"></div>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map(ymoClients::find()->all(),'id','email')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 20,'disabled'=>$model->isNewRecord ? false : false]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 20,'disabled'=>$model->isNewRecord ? false : false]) ?>

    <?= $form->field($model, 'cardnumber')->textInput(['maxlength' => 16,'disabled'=>$model->isNewRecord ? false : false]) ?>

    <?= $form->field($model, 'cardpin')->textInput(['maxlength' => 10,'disabled'=>$model->isNewRecord ? false : false]) ?>
    
    <?= $form->field($model, 'security')->textInput(['maxlength' => 3,'disabled'=>$model->isNewRecord ? false : false]) ?>

    <?= $form->field($model, 'dateissue')->widget(DatePicker::className(),[
                'name' => 'dateissue',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => '15/',
                'pluginOptions' => [
                    'autoclose'=>true,
                ],
        	]) ?>

    <?= $form->field($model, 'dateexpiration')->widget(DatePicker::className(),[
                'name' => 'dateexpiration',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                	'format' => 'mm/yyyy',
					'minViewMode' => 1
                ],
        	]) ?>
    
 	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [ 
         'inlineLabel' => false, 
    ]) ?>

	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div id="form-response"></div>
			<div class="form-group" style= " width: 200px; margin: 20px auto;">
				<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg' : 'btn btn-primary btn-lg']) ?>
				<?= Html::a('Reset', '',['class' => 'btn btn-default btn-lg']) ?>
			</div>
		</div>
	</div>

    <?php AjaxActiveFormOne::end(); ?>

</div>
