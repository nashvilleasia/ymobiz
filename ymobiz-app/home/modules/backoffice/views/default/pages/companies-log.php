<div class="col-md-12 ymo-user-log ymo-nopadding">

    <!--ymo-column-left-->
    <?php echo \Yii::$app->view->render('companies-sidebar')?>
    <!--ymo-column-left-->

    <!--ymo-column-right-->
    <div class="col-md-8 ymo-right-marketing ymo-nopadding">

        <!--ymo-right-list-->
        <div class="col-md-12 ymo-nopadding ymo-Panel">

            <div class="col-md-3 ymo-nopadding">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last week') ?></option>
                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 3 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','week') ?></option>
                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 6 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','week') ?></option>
                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last year') ?></option>
                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 2 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','years') ?></option>
                <option><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','last') ?> 3 <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','years') ?></option>
                </select>
            </div>

            <ul class="col-md-6 ymo-right-list list-inline ymo-nopadding ymo-Panel">
                <li>
                    <a class="ymo-icon-contact" href="/backoffice/user-contact">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','contact') ?>
                    </a>
                </li>
                <li>
                    <a class="ymo-icon-statistics active" href="/backoffice/user-statistics">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','statistics') ?>
                    </a>
                </li>
                <li class="active">
                    <a class="ymo-icon-log" href="/backoffice/user-log">
                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','log') ?>
                    </a>
                </li>
            </ul>
        </div>
        <!--ymo-right-list-->

        <!--ymo-general-->
        <div class="col-md-12 ymo-general ymo-scroll ymo-nopadding">

            <!--ymo-box-marketing-->
            <div class="col-md-12 ymo-box-marketing ymo-nopadding">

                <table class="ymo-table-user table table-responsive">
                    <tbody>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>22-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','0000Invited via email by') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>23-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz free plan') ?>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>23-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','register Info') ?>
                                        <strong>Soft Pvt Ltd</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>24-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz Premium plan') ?>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>23-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','register Info') ?>
                                        <strong>General Electric</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>23-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('network_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','network') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>23-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added by') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('network_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','network') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>24-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added product') ?>
                                        <strong>article 01</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('business-icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','business') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>24-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','sold 04 units') ?>
                                        <strong>article 01</strong>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','to') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('business-icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','business') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>22-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','video call ') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('marketing-icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','marketing') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>22-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Scheduled meeting with') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('marketing-icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','marketing') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>22-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Invited via email by') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('global_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','ymobiz') ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('ceo.jpg','img')?>" alt="...">
                                <span>23-07-2013</span>
                                <div class="ymo-description">
                                    <p>
                                        <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','added by') ?>
                                        <strong>John Doe</strong>
                                    </p>
                                </div>
                                <img class="ymo-global-icon" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('network_icon.png','img/icons')?>" alt="...">
                                <p>
                                    <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','network') ?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!--ymo-box-marketing-->

        </div>
        <!--ymo-general-->

    </div>
    <!--ymo-column-right-->

</div>