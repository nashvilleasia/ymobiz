<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/8/14
 * Time: 3:06 PM
 */


use ymoext\ymoExt;

/*foreach($ymoClientsFiles['Dev']['fileStep'] as $fileKey => $files)
{
    if($files!=false){
        if(preg_match('/^image\/(jpeg|png|gif|bmp)$/', $files['mimetype']))
        {
            //echo \yii\helpers\Html::img('/dev/display-document?id='.$fileKey.'&mode=decode',[
               // 'width'=>'100',
                //'height'=>'100',
                //'style'=>'margin: 10px; outline: 1px solid #f00;'
            //]);
            $initialPreview[] = \yii\helpers\Html::img("/dev/display-document?id=$fileKey", [
                'class'=>'file-preview-image',
                'alt'=>$files['name'],
                'title'=>$files['name'],
                'width'=>'150',
            ]);
        }else{
            $initialPreview[] = "<div class='file-preview-text'><h2><i class='glyphicon glyphicon-file'></i></h2>".$files['name']."</div>";
        }
    }
}*/



$model->scenario = 'formStep3';

//$ymoClientFiles = [];

//unset($_SESSION['steps']);

//$_SESSION['stepsTest']['Dev']['files'] = [];

/*f(@$_FILES){

    $files = \ymobiz\components\Upload::multipleUpload($model, 'fileStep', []);

    $clientPrivateKey = 1234;

    if (isset($files) && count($files) > 0) {
        foreach ($files as $key=>$file) {

            $protect = new \ymobiz\helpers\Password();

            $ymoClientFiles = [
                'clients_id'=>Yii::$app->user->id,
                'name'=>$file->name,
                'size'=>$file->size,
                'mimetype'=>$file->type,
                'extension'=>$file->extension,
                //'filecontent'=>base64_encode($protect->encrypt(@file_get_contents($file->tempName),$clientPrivateKey)),
            ];

            $_SESSION['stepsTest']['Dev']['files'][]=$ymoClientFiles;

            //$file->saveAs(\Yii::getAlias('@ymobiz/upload/') . $file->baseName . '.' . $file->extension);
        }
    }
}

$form = \yii\widgets\ActiveForm::begin([
    'id' => 'step2',
    'options' => [
        'enctype'=>'multipart/form-data'
    ],
]);*/

$form = \mcms\ajaxform\AjaxActiveFormOne::begin([
    'id' => 'step3',
    'action' => '/dev/form-wizard?step=step3',
    'options' => [
        'enctype'=>'multipart/form-data'
    ],
    'model' => $model,
    'localStorage' => true,
    'pluginOptions' => [
        'dataType' => 'json',
        'resetForm' => false,
    	'data' => [
    		'scenario' => 'formStep3'
    	]
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
<div class="col-xs-12  ymo-nopadding ymo-card-form">
    <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
        <?php
        echo $form->field($model,'fileStep[]', ['template'=>'{input}'])->widget(\kartik\widgets\FileInput::classname(), [
            'options' => [
                'accept' => 'any/*',
                'multiple'=>true,
            ],
            'pluginOptions' => [
                'showPreview' => false,
                'showCaption' => false,
                'showUpload' => false,
                'elCaptionText' => '#customCaption',
                'browseClass' => 'col-md-2 ymo-btn-upload',
                'removeClass' => 'ymo-btn-upload input-upload-espace',
                'browseIcon' => '',
                'removeIcon' => '',
                'browseLabel' =>  'Upload'
            ]
        ]);
        echo '<span id="customCaption" class="text-success upload-caption" style="margin-top: -19px;"></span>';
        echo $form->field($model,'fileStep', ['template'=>'{error}']);
        ?>
    </div>

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
    echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),'/dev/form-wizard?step=formStep1',[
        'class' => 'col-md-3 btn ymo-btn-dark-pink',
        'style' => 'margin-right: 15px;'
    ]);
    ?>

    <?php
    echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
        'class' => 'col-md-3 btn ymo-btn-dark-pink'
    ]);
    ?>
</div>

<div class="col-md-12 ymo-nopadding">
    <?php
    echo '<pre>';
    //print_r($_SESSION['stepsTest']);
    print_r(Yii::$app->session->get('steps'));
    echo '</pre>';
    ?>
</div>

<?php

//\yii\widgets\ActiveForm::end();
\mcms\ajaxform\AjaxActiveFormOne::end() ;

?>
