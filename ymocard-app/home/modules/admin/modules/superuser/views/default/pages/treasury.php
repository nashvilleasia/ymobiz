<?php
      use kartik\widgets\DatePicker;
?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super ymo-Panel">
            
        <?php echo $this->render('treasury-table') ?>

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
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment method: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','trough partner: ')?></strong>XPTO, Lda.
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card nº: ')?></strong>000000000000
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','credit card name : ')?></strong>Mr. Paulo Rodrigues
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','paid amount: ')?></strong>10.000,00 USD
                            </li>
                        </ul>
                        <a href="#" class="col-md-offset-9 btn ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','check statement')?></a>
                        <hr/>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-compliance-->
                    <div class="col-md-12 ymo-compliance ymo-nopadding ymo-Panel">
                        <ul class="col-md-6 col-md-offset-2 text-right list-inline ymo-nopadding ymo-Panel">
                            <li>
                                <label class="checkbox ymo-nopadding">
                                    <input type="checkbox" name="rememeber5" id="rememeber5" />
                                    <label for="rememeber5"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','sent receipt')?></label>
                                </label>
                            </li>
                        </ul>
                        <a href="#" class="btn ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','confirm payment')?></a>
                    </div>
                    <!--ymo-compliance-->

                </div>
            </div>
            <!-- End ymo-column-right-->

            <?php echo $this->render('comments') ?>

        </div>
    </div>
</div>