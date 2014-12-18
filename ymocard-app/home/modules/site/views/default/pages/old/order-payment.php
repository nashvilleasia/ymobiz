<?php
	use kartik\widgets\DatePicker;
?>
<div class="">
	<div class="col-md-12 ymo-body ymo-Panel">
		<div class="col-md-7 ymo-nopadding ymo-Panel">

            <?php echo $this->render('order-text') ?>

			<div class="col-md-10 col-md-offset-1 ymo-nopadding ymo-Panel">
                <form action="">

                    <!--Start ymo payment method-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                        <span class="badge ymo-badge-a">6</span>
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Payment Method') ?>
                        </h2>

                        <div class="col-md-12 ymo-group ymo-nopadding">
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
                                    <div class="col-md-10 ymo-bank-text ymo-nopadding ymo-Panel">
                                        <p>
                                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','
                                                    After payment by bank transfer, please send us by email a
                                                    certificate referring the following order identification number:
                                                    ID')?> 149986
                                        </p>
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        <div class="col-md-12 ymo-important ymo-nopadding ymo-Panel">
                                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/arrow-order.png" alt="...">
                                            <p>
                                                (1) <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password')?>
                                            </p>
                                        </div>
                                    </div>
                                    <ul class="col-md-8 ymo-bank-details ymo-nopadding ymo-Panel">
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','NIB:')?></span> XXX XXXX XXXXXXXXX XX
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IBAN:')?></span> XXXX XXXX XXXX XXXX XXXX XXXX X
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','BIC/END SWIFT:')?></span> BESCPTPL
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Name:')?></span> Ymocard, LLC
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Banco:')?></span> Banco XPTO
                                        </li>
                                        <li>
                                            <span><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Conta:')?></span> XXXXX XXXXX XXXXX
                                        </li>
                                    </ul>
                                </li>
                                <li class="col-md-12 ymo-credit-card ymo-method-view ymo-nopadding">
                                    <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                        <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','credit card nº') ?></label>
                                        <input type="text" class="form-control ymo-input" id="">
                                    </div>
                                    <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-expiration">
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
                                        <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','security code')?></label>
                                            <input type="text" class="form-control ymo-input" id="">
                                        </div>
                                        <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                        <div class="col-md-12 ymo-important ymo-nopadding ymo-Panel">
                                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/arrow-order.png" alt="...">
                                            <p>
                                                (1) <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','IMPORTANT: you will need your password')?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <button type="button" class="col-md-3 btn ymo-btn-dark-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Submit') ?></button>

                        </div>
                    </div>
                    <!--End ymo payment method-->

                </form>
			</div>
		</div>
		<?php echo $this->render('info-card') ?>
	</div>
</div>