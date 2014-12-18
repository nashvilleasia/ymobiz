<?php
use yii\helpers\Html;
use mcms\isloading\Isloading;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var \common\models\LoginForm $model
 */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
                <?php

                $form = \mcms\ajaxform\AjaxActiveFormOne::begin([
			        'id' => 'login-auth',
			        'action' => 'login',
			        'pluginOptions' => [
			            'dataType' => 'json',
			            'resetForm' => false,
			        ],
			        'customCallbacks' => [
			            'complete' => new \yii\web\JsExpression("
			            	 var obj = JSON.parse(event.responseText);
							 if(obj.status === 200){
								".Isloading::widget([
									'id' => 'response-contact-us',
									'pluginOptions' => [
										'text' => Yii::$app->getModule('site')->ymoTranslate->t('site','alerts','Verifying your data, please wait...')
									],	
									'response' => new \yii\web\JsExpression('
										jQuery("#load-modal-login-success").modal("hide"); 
										jQuery(".ymo-json-response").html(obj.content);  
										$.isLoading("hide");
									')
								])."
							}else if(obj.status === 500){
									jQuery('.ymo-json-response').html(obj.content);;
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
                <?= $form->field($model, 'ymo_email') ?>
                <?= $form->field($model, 'ymo_password')->passwordInput() ?>
                <?= $form->field($model, 'remember')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
    		<?= $form->field($model, 'cluster_id', ['template'=>'{input}'])->hiddenInput() ?>
            <?php  \mcms\ajaxform\AjaxActiveFormOne::end(); ?>
        </div>
    </div>
</div>
