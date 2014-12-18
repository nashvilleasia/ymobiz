<?php

use yii\helpers\Url;
use yii\bootstrap\Modal;

Yii::$app->controller->layout = '/main-docs';

$this->registerCss("
	.error-summary li{
		list-style:none;
		color: #d02391;
        font-family: 'microsoft_tai_leregular';
	}

	.error-summary ul{
	    display: inline;
	}

	.modal-dialog pre{
	    font-size: 1.2em;
	    text-align: left;
	}

");

$modalDefault = [
    'id' => 'result-popup',
    'clientOptions' => [
    	'show' => true,
     	'backdrop' => 'static'
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
                            <button type="button" class="col-md-12 col-sm-12 col-xs-12 btn btn-primary center-block" data-dismiss="modal" aria-hidden="true"><?=Yii::t('app','ok') ?></button>
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