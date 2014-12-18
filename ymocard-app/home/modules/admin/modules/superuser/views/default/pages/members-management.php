<?php
	use kartik\widgets\DatePicker;
?>
<div class="">
	<div class="col-md-12 ymo-body ymo-Panel">

        <?php echo $this->render('members-table') ?>

        <!-- Start ymo-column-right-->
        <div class="col-md-6 ymo-column-right ymo-Panel">
            <div class="col-md-11 col-md-offset-1 ymo-management ymo-nopadding ymo-Panel">

                <!-- Start ymo-card-details-->
                <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                    <h2 class="ymo-title-a">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','member account details')?>
                    </h2>
                    <ul class="ymo-Panel">
                        <li>
                            <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','name: ')?></strong>Mr. Pedro Almeida
                        </li>
                        <li>
                            <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','email: ')?></strong>p.almeida86@hotmail.com
                        </li>
                        <li>
                            <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','password: ')?></strong>123456789
                        </li>
                    </ul>
                </div>
                <!-- End ymo-card-details-->

                <!--form-->
                <form action="">

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
                            </li>
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
                        </ul>
                    </div>
                    <!--ymo-type-members-->

                </form>
                <!--form-->

                <!--ymo-card-documents-->
                <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                    <h2 class="ymo-title-a ymo-Panel">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Account')?>member documents
                    </h2>
                    <ul class="col-md-8 ymo-Panel">
                        <li>
                            <strong>30.03.1013  </strong>
                            <a href="#">residence compliance.pdf</a>
                        </li>
                        <li>
                            <strong>30.03.2013  </strong>
                            <a href="#">id document.pdf</a>
                        </li>
                        <li>
                            <strong>30.03.2013  </strong>
                            <a href="#">driverlicence.pdf</a>
                        </li>
                    </ul>
                    <div class="col-md-12 ymo-see-more">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see older documents')?>
                            <span class="caret"></span>
                        </a>
                    </div>
                </div>
                <!--ymo-card-documents-->


                <a href="#" class="col-md-offset-6 ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','define plafond')?></a>
                <a href="<?php echo \Yii::$app->urlManager->createUrl('partner-seller/popups/block-ymocard')?>" class="ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','block this ymocard')?></a>
                <hr/>

                <!-- Start ymo-card-activity-->
                <div class="col-md-12 ymo-card-activity ymo-member-activity ymo-nopadding">
                    <h5 class="ymo-title-b">
                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','member track record:')?>
                    </h5>
                    <ul>
                        <li>
                            > <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','staff member registered on: ')?>03.06.2013
                        </li>
                        <li>
                            > <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','staff member edition on: ')?>12.07.2013
                        </li>
                        <li>
                            > <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','staff member blocked on: ')?>19. 02. 2014
                        </li>
                    </ul>
                    <div class="col-md-12 ymo-see-more">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see more')?>
                            <span class="caret"></span>
                        </a>
                    </div>
                </div>
                <!-- End ymo-card-activity-->

            </div>
        </div>
        <!-- End ymo-column-right-->

	</div>
</div>