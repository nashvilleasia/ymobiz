<?php
	use kartik\widgets\DatePicker;
?>
<div class="">
	<div class="col-md-12 ymo-body ymo-Panel">
		<div class="col-md-7 ymo-nopadding ymo-Panel">

            <?php echo $this->render('order-text') ?>

            <!--form-->
			<div class="col-md-10 col-md-offset-1 ymo-nopadding ymo-Panel">
                <form action="order-payment" method="post">

                    <!--ymo-card-form-->
                    <div class="col-md-12 ymo-card-form ymo-group ymo-nopadding ymo-Panel">
                        <span class="badge ymo-badge-a">4</span>
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Card Name') ?>
                        </h2>
                        <p class="ymo-required">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','(all fields required)') ?>
                        </p>
                        <div class="col-md-12 ymo-nopadding">
                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','title') ?></label>
                                <select class="form-control ymo-input">
                                    <option value=""></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-md-8 form-group ymo-nopadding ymo-group">
                                <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','card name <span>(max. 20 carachters)</span>') ?></label>
                                <input type="text" class="form-control ymo-input" id="">
                            </div>
                        </div>
                    </div>
                    <!--ymo-card-form-->

                    <!--ymo-card-form-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                        <span class="badge ymo-badge-a">5</span>
                        <h2 class="ymo-title-b">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Compliance') ?>
                        </h2>
                        <div class="col-md-12 ymo-nopadding ymo-Panel">
                            <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                                <p class="ymo-text-a">
                                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','id document <span>(such as national id card, passport or driver licence)</span>') ?>
                                    <span class="badge ymo-badge-b">?</span>
                                </p>
                                <button class="ymo-btn-upload" ><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Upload') ?></button>
                            </div>
                            <div class="col-md-12 form-group ymo-nopadding ymo-group ymo-Panel">
                                <p class="ymo-text-a">
                                    <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','proof of residence <span>(such as, power or phone bil)</span>') ?>
                                    <a href="#"><span class="badge ymo-badge-b">?</span></a>
                                </p>
                                <button class="ymo-btn-upload" ><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Upload') ?></button>
                            </div>
                            <?php
                            echo \yii\helpers\Html::a(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Back'),null,[
                                'href' => 'javascript:history.go(-1);',
                                'class' => 'col-md-3 btn ymo-btn-dark-pink'
                            ]);
                            ?>
                            <?php
                            echo \yii\helpers\Html::submitButton(Yii::$app->getModule('site')->ymoTranslate->t('site','form','Next'),[
                                'class' => 'col-md-3 col-md-offset-1 btn ymo-btn-dark-pink'
                            ]);
                            ?>
                        </div>
                    </div>
                    <!--ymo-card-form-->

                </form>
                <!--form-->

			</div>
		</div>
		<?php echo $this->render('info-card') ?>
	</div>
</div>