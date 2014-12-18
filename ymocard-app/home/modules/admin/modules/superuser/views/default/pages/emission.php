<?php
      use kartik\widgets\DatePicker;
?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super-emission ymo-Panel">

        <?php echo $this->render('emission-table') ?>

            <!-- Start ymo-column-right-->
            <div class="col-md-6 ymo-column-right ymo-nopadding ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-nopadding ymo-Panel">

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card name: ')?></strong>Mr. Pedro Almeida
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card number: ')?></strong>1234567890
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card status: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','card pendent')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','order date: ')?></strong>1st September, 2013
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','compliance: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','confirmed')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','confirmed')?>
                            </li>
                        </ul>
                        <a href="#" class="ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','download card details')?></a>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-compliance-->
                    <div class="col-md-12 ymo-compliance ymo-nopadding ymo-Panel">
                        <ul class="col-md-7 col-md-offset-2 text-right list-inline ymo-nopadding ymo-Panel">
                            <li>
                                <label class="checkbox ymo-nopadding">
                                    <input type="checkbox" name="rememeber5" id="rememeber5" />
                                    <label for="rememeber5"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','notify partner')?></label>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox ymo-nopadding">
                                    <input type="checkbox" name="rememeber6" id="rememeber6" />
                                    <label for="rememeber6"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','notify user')?></label>
                                </label>
                            </li>
                        </ul>
                        <a href="#" class="ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','order emission')?></a>
                    </div>
                    <!--ymo-compliance-->

                </div>
            </div>
            <!-- End ymo-column-right-->

            <?php echo $this->render('comments') ?>

        </div>
    </div>
</div>