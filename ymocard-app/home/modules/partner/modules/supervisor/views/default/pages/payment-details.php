<?php
      use kartik\widgets\DatePicker;
?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-partner-supervisor ymo-Panel">

        <?php echo $this->render('card-table') ?>

            <!-- Start ymo-column-right-->
            <div class="col-md-6 ymo-column-right ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-card-order ymo-partner ymo-nopadding ymo-Panel">

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment details') ?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','nr. of pending ymocard payments: ') ?></strong>120
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','registered between: ') ?></strong>
                                <p>1st September, 2014</p>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','and: ') ?></strong>
                                5th September, 2014
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','ymocard status: ') ?></strong>pendent
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','total payment amount: ') ?></strong>10.000,00 USD
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-form-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','payment method') ?>
                        </h2>
                        <div class="col-md-12 ymo-nopadding">

                            <!--form-->
                            <form action="">

                                <div class="col-md-12 ymo-payment ymo-nopadding">
                                    <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','select payment method') ?></label>
                                </div>
                                <ul class="col-md-12 list-inline ymo-Panel">
                                    <li>
                                        <label class="radio-inline ymo-nopadding">
                                            <input type="radio" name="ymo-method" value="paypal" id="national" checked="checked" />
                                            <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','paypal') ?></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-inline ymo-nopadding">
                                            <input type="radio" name="ymo-method" value="bank-transfer" id="passport" />
                                            <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','bank transfer') ?></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-inline ymo-nopadding">
                                            <input type="radio" name="ymo-method" value="credit-card" id="driver" />
                                            <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card') ?></span>
                                        </label>
                                    </li>
                                </ul>
                                <div class="ymo-methods">
                                    <li class="col-md-12 ymo-paypal ymo-method-view method-active">

                                    </li>
                                    <li class="col-md-12 ymo-bank-transfer ymo-method-view ymo-nopadding ymo-Panel">
                                        <div class="col-md-10 ymo-nopadding ymo-Panel">
                                            <p class="ymo-text-b">
                                                <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','
                                                After payment by bank transfer, please send us by email a
                                                certificate referring the following order identification number:
                                                ID ') ?>149986
                                            </p>
                                        </div>
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        <div class="col-md-8 ymo-text ymo-nopadding ymo-Panel">
                                            <ul class="ymo-nopadding ymo-Panel">
                                                <li>
                                                    <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','NIB:') ?></span> XXX XXXX XXXXXXXXX XX
                                                </li>
                                                <li>
                                                    <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IBAN:') ?></span> XXXX XXXX XXXX XXXX XXXX XXXX X
                                                </li>
                                                <li>
                                                    <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','BIC/END SWIFT:') ?></span> BESCPTPL
                                                </li>
                                                <li>
                                                    <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Name:') ?></span> Ymocard, LLC
                                                </li>
                                                <li>
                                                    <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Bank:') ?></span> Banco XPTO
                                                </li>
                                                <li>
                                                    <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Account:') ?></span> XXXXX XXXXX XXXXX
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="col-md-12 ymo-credit-card ymo-method-view ymo-nopadding">
                                        <div class="col-md-9 form-group ymo-nopadding ymo-group">
                                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card nº') ?></label>
                                            <input type="text" class="form-control ymo-input" id="">
                                        </div>
                                        <div class="col-md-9 form-group ymo-nopadding ymo-expiration">
                                            <label class="control-label" for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card expiration date') ?></label>
                                            <?php
                                            echo DatePicker::widget([
                                                'name' => 'dp_2',
                                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                                //'value' => '23-Feb-2014',
                                                'pluginOptions' => [
                                                    'autoclose'=>true,
                                                    'format' => 'dd-M-yyyy'
                                                ],
                                                'options' => [
                                                    'class' => 'form-control ymo-input'
                                                ]
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-md-12 ymo-nopadding">
                                            <div class="col-md-9 form-group ymo-nopadding ymo-group">
                                                <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','security code') ?></label>
                                                <input type="text" class="form-control ymo-input" id="">
                                            </div>
                                            <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        </div>
                                    </li>
                                </div>
                                <button class="btn ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','submit') ?></button>

                            </form>
                            <!--form-->

                        </div>
                    </div>
                    <!--ymo-card-form-->

                </div>
            </div>
            <!-- End ymo-column-right-->

        </div>
    </div>
</div>