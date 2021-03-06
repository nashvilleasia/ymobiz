<?php

use yii\helpers\Url;
use yii\bootstrap\Modal;

if(@$htmlResponse!=false){
	Yii::$app->controller->layout = '/main-docs';
	
	Yii::$app->controller->getView()->assetManager->bundles = [
		'yii\bootstrap\BootstrapAsset' => [
			'css' => []
		],
	];
}

$view = Yii::$app->getView();
$view->registerJs("
		
	var registrationSuccess = jQuery(document);
	registrationSuccess.on('click','button.registration-success',function(){
		window.location = '/partner-seller/registered-cards';
	});
");

Modal::begin([
    'id' => 'registration-sucess',
    'clientOptions' => [
        'show' => true,
     	'backdrop' => 'static',
     	'keyboard' => false,		
    ],
    'closeButton' => false,
    'size' => 'modal-sm',
]);

?>
<!-- Body Modal -->
<div class="popup-dialog">
    <div class="bs-modal-sm ymo-popup">
        <div class="popup-header">
            <h4 class="modal-title" id="myModalLabel"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','done')?></h4>
        </div>
        <div class="modal-body popup-body">
            <div class="row">
                <div class="col-md-12 popup-text">
                    <?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','your order was successfully submitted.')?>
                </div>
            </div>
        </div>
        <div class="modal-footer popup-footer">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                <button type="button" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block registration-success" data-dismiss="modal" aria-hidden="true"><?=Yii::$app->getModule('site')->ymoTranslate->t('site','popups','ok')?></button>
            </div>
        </div>
    </div>
</div>
<!-- Body Modal -->
<?php 
Modal::end();
?>