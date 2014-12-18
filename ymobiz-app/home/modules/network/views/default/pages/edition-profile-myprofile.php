<?php




echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'save-profile-edition','module' => 'network','size'=>'sm'],
    ['id'=>'profile-edited','module' => 'network','size'=>'sm'],
]);

?>

<?php echo \Yii::$app->view->render('edition-profile-header') ?>

<!--ymo-column-left-->
<div class="col-md-8 ymo-left ymo-nopadding ymo-Panel">

    <!--form-->
    <form action="">

        <!--ymo-form-profile-->
        <ul class="col-md-12 ymo-form-profile ymo-nopadding ymo-Panel">
            <li>
                <h4 class="ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','who are we?') ?></h4>
                <div class="form-group">
                    <div class="col-sm-12 ymo-nopadding">
                        <textarea class="form-control" rows="3" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','insert a brief company presentation') ?>"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5 ymo-nopadding">
                        <input type="text" class="form-control input-sm ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','URL: insert a video') ?>">
                    </div>
                </div>
            </li>
            <li>
                <h4 class="ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brief description') ?></h4>
                <div class="form-group">
                    <div class="col-sm-12 ymo-nopadding">
                        <textarea class="form-control" rows="3" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','insert a brief description about your company activities') ?>"></textarea>
                    </div>
                </div>
            </li>
            <li>
                <h4 class="ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','keywords') ?></h4>
                <div class="form-group">
                    <div class="col-sm-12 ymo-nopadding">
                        <textarea class="form-control" rows="3" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','insert keywords (separate by commas)') ?>"></textarea>
                    </div>
                </div>
            </li>
            <li>
                <h4 class="ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','album description') ?></h4>
                <div class="form-group">
                    <div class="col-sm-12 ymo-nopadding">
                        <textarea class="form-control" rows="3" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','insert a brief album description') ?>"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 ymo-form-album ymo-nopadding">
                    <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','insert one or more images to your company album') ?></p>
                    <div class="col-lg-6">
                        <div class="input-group ymo-upload">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn ymo-btn-blue" type="button"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','upload image') ?></button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </li>
            <li>
                <h4 class="ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','our team') ?></h4>
                <div class="form-group">
                    <div class="col-sm-12 ymo-nopadding">
                        <textarea class="form-control" rows="3" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','insert a brief presentation about your company team') ?>"></textarea>
                    </div>
                </div>

                <!--ymo-staff-member-->
                <ul class="col-md-12 ymo-staff-member ymo-nopadding">
                    <li class="col-md-6 ymo-staff-member-left ymo-nopadding ymo-Panel">
                        <div class="form-group ymo-staff-form ymo-nopadding">
                            <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','upload staff member photo') ?></p>
                        </div>
                        <div class="form-group ymo-nopadding">
                            <div class="col-sm-5 input-sm ymo-nopadding">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?>">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','position') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','email') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','phone number') ?>">
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6 ymo-staff-member-right ymo-nopadding ymo-Panel">
                        <div class="form-group ymo-staff-form ymo-nopadding">
                            <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','upload staff member photo') ?></p>
                        </div>
                        <div class="form-group ymo-nopadding">
                            <div class="col-sm-5 input-sm ymo-nopadding">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?>">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','position') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','email') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','phone number') ?>">
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6 ymo-staff-member-left ymo-nopadding ymo-Panel">
                        <div class="form-group ymo-staff-form ymo-nopadding">
                            <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','upload staff member photo') ?></p>
                        </div>
                        <div class="form-group ymo-nopadding">
                            <div class="col-sm-5 input-sm ymo-nopadding">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?>">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','position') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','email') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','phone number') ?>">
                            </div>
                        </div>
                    </li>
                    <li class="col-md-6 ymo-staff-member-right ymo-nopadding ymo-Panel">
                        <div class="form-group ymo-staff-form ymo-nopadding">
                            <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','upload staff member photo') ?></p>
                        </div>
                        <div class="form-group ymo-nopadding">
                            <div class="col-sm-5 input-sm ymo-nopadding">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?>">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','position') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','email') ?> ">
                                <input type="text" class="form-control ymo-nopadding" id="" placeholder="<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','phone number') ?>">
                            </div>
                        </div>
                    </li>
                </ul>
                <!--ymo-staff-member-->

            </li>

            <div class="col-md-12 ymo-nopadding">
                <div class="col-md-5 ymo-add-member ymo-nopadding">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add more staff members') ?>
                        <span class="caret"></span>
                    </a>
                </div>
                <div class="col-md-4 ymo-buttons ymo-nopadding ymo-Panel">
                    <a href="#" data-action="save-profile-edition" data-size="lg" type="button"  class="col-md-6 btn ymo-btn-blue btn-sm"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','save') ?>
                    <a>
                    <button type="button" class="col-md-6 btn ymo-btn-blue btn-sm"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','cancel') ?></button>
                </div>
            </div>

        </ul>
        <!--ymo-form-profile-->


    </form>
    <!--form-->

</div>
<!--ymo-column-left-->

<!--ymo-column-right-->
<?php echo \Yii::$app->view->render('sidebar') ?>
<!--ymo-column-right-->