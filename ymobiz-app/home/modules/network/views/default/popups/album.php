<?php
drmabuse\slick\SlickWidget::widget([
    'container' => '.single-item',
    'settings'  => [
        'slick' => [
            'infinite'      =>  true,
            'slidesToShow'  =>  6,
            'onBeforeChange'=> new \yii\web\JsExpression('function(){
                }'),
            'onAfterChange' => new \yii\web\JsExpression('function(){
                    console.debug(this);
                }'),
            'responsive' => [
                [
                    'breakpoint'=> 768,
                    'settings'=> [
                        'arrows'=> false,
                        'centerMode'=> true,
                        'centerPadding'=> 40,
                        'slidesToShow'=> 3
                    ]
                ]
            ],
        ],
        'slickGoTo'         => 3,
    ]
]);
?>

<div class="modal show">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ymo-popup">
            <div class="modal-header popup-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body popup-body">
                <div class="row ymo-Panel">
                    <div class="col-md-12 ymo-nopadding ymo-Panel">
                        <div class="col-md-9 popup-album ymo-nopadding ymo-Panel">
                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/post-image.jpg" alt="...">
                        </div>
                        <div class="col-md-12 ymo-nopadding ymo-Panel">
                            <!--ymo-slider-->
                            <div class="popup-slider slider single-item slick-slider">
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                                <div>
                                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/thumbnail-popup.jpg" alt="...">
                                </div>
                            </div>
                            <!--ymo-slider-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->