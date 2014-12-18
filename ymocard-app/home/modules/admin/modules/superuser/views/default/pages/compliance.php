<?php
      use kartik\widgets\DatePicker;
?>
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-super ymo-Panel">

        <?php echo $this->render('compliance-table') ?>

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
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','user personal details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','first name: ')?></strong>Pedro Joaquim
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','last name: ')?></strong>Pires de Almeida
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','date of birth: ')?></strong>1st September, 2013
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','gender: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','male')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country of birth: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Brazil')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country of nationality: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Brazil')?>
                            </li>
                            <li>
                                <strong>RG: </strong>000000
                            </li>
                            <li>
                                <strong>CPF: </strong>000.000.000-00
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','user contact details')?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','address: ')?></strong>dsvfdabagnajryn,trhar
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','city: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Lisbon')?>
                            </li>
                            <li>
                                <strong>postal /zip code: </strong>1234 - 897
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','state: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Lisbon')?>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','country: ')?></strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Portugal')?>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-details-->

                    <!--ymo-card-documents-->
                    <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','check user docs')?>
                        </h2>
                        <ul class="col-md-12 ymo-Panel">
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

                </div>
            </div>
            <!-- End ymo-column-right-->

            <!--ymo-compliance-->
            <div class="col-md-12 ymo-compliance ymo-nopadding ymo-Panel">

                <!--form-->
                <form action="">

                    <ul class="col-md-7 col-md-offset-3 text-right list-inline ymo-nopadding ymo-Panel">
                        <li>
                            <label class="checkbox ymo-nopadding">
                                <input type="checkbox" name="rememeber5" id="rememeber5" />
                                <label for="rememeber5"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','driver licence')?></label>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox ymo-nopadding">
                                <input type="checkbox" name="rememeber6" id="rememeber6" />
                                <label for="rememeber6"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','id compliance')?></label>
                            </label>
                        </li>
                        <li>
                            <label class="checkbox ymo-nopadding">
                                <input type="checkbox" name="rememeber7" id="rememeber7" />
                                <label for="rememeber7"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','residence compliance')?></label>
                            </label>
                        </li>
                    </ul>
                    <button class="btn ymo-btn-light-pink"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','form','confirm compliance')?></button>

                </form>
                <!--form-->

            </div>
            <!--ymo-compliance-->

            <?php echo $this->render('comments') ?>
        </div>
    </div>
</div>