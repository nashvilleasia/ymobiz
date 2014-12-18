<?php
	use kartik\widgets\DatePicker;
?>
<div class="">
	<div class="col-md-12 ymo-body ymo-super ymo-Panel">

        <?php echo $this->render('members-table') ?>

        <!-- Start ymo-column-right-->
        <div class="col-md-6 ymo-column-right ymo-Panel">
            <div class="col-md-11 col-md-offset-1 ymo-nopadding ymo-Panel">

                <!--form-->
                <form action="">

                    <!--ymo-card-form-->
                    <div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member account details')?>
                        </h2>
                        <div class="col-md-8 form-group ymo-nopadding ymo-group">
                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','name')?></label>
                            <input type="text" class="form-control ymo-input" id="">
                        </div>
                        <div class="col-md-8 form-group ymo-nopadding ymo-group">
                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','email')?></label>
                            <input type="text" class="form-control ymo-input" id="">
                        </div>
                        <div class="col-md-8 form-group ymo-nopadding ymo-group">
                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','repeat email')?></label>
                            <input type="text" class="form-control ymo-input" id="">
                        </div>
                        <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-Panel">
                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','password')?></label>
                            <input type="text" class="form-control ymo-input" id="">
                        </div>
                        <div class="col-md-8 form-group ymo-nopadding ymo-group ymo-Panel">
                            <label for=""><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','repeat password')?></label>
                            <input type="text" class="form-control ymo-input" id="">
                        </div>
                    </div>
                    <!--ymo-card-form-->

                    <!--ymo-type-members-->
                    <div class="col-md-12 ymo-type-members ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','type of member')?>
                        </h2>
                        <ul class="col-md-12 ymo-Panel">
                            <li>
                                <label class="radio-inline ymo-nopadding">
                                    <input type="radio" name="ymo-method" value="seller" id="national" checked="checked" />
                                    <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Seller')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-inline ymo-nopadding">
                                    <input type="radio" name="ymo-method" value="account" id="passport" />
                                    <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Account')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-inline ymo-nopadding">
                                    <input type="radio" name="ymo-method" value="partner" />
                                    <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Partner')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-inline ymo-nopadding">
                                    <input type="radio" name="ymo-method" value="staff" />
                                    <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Staff')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-inline ymo-nopadding">
                                    <input type="radio" name="ymo-method" value="supervisor" />
                                    <span class="radio-name"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Supervisor')?></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-type-members-->

                    <!--ymo-type-members-->
                    <div class="col-md-12 ymo-type-members ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member permissions')?>
                        </h2>
                        <ul class="col-md-12 checkbox-inline ymo-Panel">
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber1" id="rememeber3" checked="checked" />
                                    <span class="checkbox-name" for="rememeber1"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Order New Ymocard')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber2" id="rememeber3" />
                                    <span class="checkbox-name" for="rememeber2"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Ymocard Payments')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber3" id="rememeber3" />
                                    <span class="checkbox-name" for="rememeber3"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Members Management')?></span>
                                </label>
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber4" id="rememeber4" />
                                    <span class="checkbox-name" for="rememeber4"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Compliance')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber5" id="rememeber5" />
                                    <span class="checkbox-name" for="rememeber5"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Treasury')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber6" id="rememeber6" />
                                    <span class="checkbox-name" for="rememeber6"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Emission')?></span>
                                </label>
                            </li>
                            <li>
                                <label class="checkbox-inline ymo-nopadding">
                                    <input type="checkbox" name="rememeber7" id="rememeber7" />
                                    <span class="checkbox-name" for="rememeber7"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','Call Center')?></span>
                                </label>
                            </li>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-type-members-->

                    <!--ymo-card-documents-->
                    <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                        <h2 class="col-md-7 ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','member documents')?>
                        </h2>
                        <button type="button" class="btn ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','upload docs')?></button>
                        <hr/>
                    </div>
                    <!--ymo-card-documents-->

                    <button class="btn ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','add staff member')?></button>

                </form>
                <!--form-->

            </div>
        </div>
        <!-- End ymo-column-right-->

	</div>
</div>