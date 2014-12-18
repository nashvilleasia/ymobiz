<?php

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;

Yii::$app->controller->layout = '/main-docs';

Yii::$app->controller->getView()->assetManager->bundles = [
	'yii\bootstrap\BootstrapAsset' => [
		'css' => []
	],
];

$customCss = (@$customCss) ? @$customCss : false;

$this->registerCss("
	.error-summary li{
		list-style:none;
		color: #d02391;
	    font-size: 1.12em;
        font-family: 'microsoft_tai_leregular';
	}

	.error-summary ul{
	    display: inline;
	}
		
	$customCss
");

$this->registerJs((@$customJs) ? @$customJs : false);

$modalDefault = [
    'id' => 'result-popup',
    'clientOptions' => [
    	'show' => true,
     	'backdrop' => 'static',
     	'keyboard' => false,	
    ],
	'closeButton' => false,
    'size' => (@$size) ? @$size : 'modal-sm',			
];

Modal::begin(ArrayHelper::merge($modalDefault,(@$modalOptions) ? $modalOptions : []));
?>

            <!-- Modal -->
            <div class="popup-dialog">
                <div class="bs-modal-sm ymo-popup">
                    <?php
                    if(@$custom){
                        echo $custom;
                    }else{
                    ?>
                    <div class="popup-header">
                        <h4 class="modal-title" id="resultPopupLabel"><?=@$header ?></h4>
                    </div>
                    <div class="modal-body popup-body">
                        <div class="row">
                            <div class="col-md-12 popup-text">
                                <?=@$body ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer popup-footer">
                        <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
                            <?php
                                if(@$button){
                                    echo @$button;
                                }else{
                             ?>
                            <button type="button" id="buttom-modal-<?=@$id?>" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block close-modal" data-dismiss="modal" aria-hidden="true"><?=Yii::t('app','ok') ?></button>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
<!-- Modal -->
<?php Modal::end()?>