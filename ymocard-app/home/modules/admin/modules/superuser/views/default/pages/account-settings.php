<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-Panel">

            <!-- Start ymo-account-left-->
            <div class="col-md-6 ymo-account-left ymo-nopadding ymo-Panel">
                <div class="col-md-10 col-md-offset-2 ymo-nopadding ymo-Panel">

                    <!--Start personal details-->
                    <div class="col-md-12 ymo-card-details ymo-nopadding ymo-Panel">
                        <h2 class="ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','personal details') ?>
                        </h2>
                        <ul class="ymo-Panel">
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','name : ') ?></strong>Pedro Almeida
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','partner : ') ?></strong> XPTO, lda.
                            </li>
                        </ul>
                    </div>
                    <!--End personal details-->

                    <!--Start documents-->
                    <div class="col-md-12 ymo-card-documents ymo-nopadding ymo-Panel">
                        <h2 class="col-md-6 ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','documents') ?>
                        </h2>
                        <a href="#" class="ymo-btn-logout"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','edit documents') ?></a>
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
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','see older documents') ?>
                                <span class="caret"></span>
                            </a>
                        </div>
                    </div>
                    <!--End documents-->

                </div>
            </div>
            <!-- End ymo-account-left-->

            <!-- Start ymo-account-right-->
            <div class="col-md-6 ymo-account-right ymo-nopadding ymo-Panel">
                <div class="col-md-10 col-md-offset-2 ymo-nopadding ymo-Panel">

                    <!--ymo-card-account-->
                    <div class="col-md-12 ymo-card-account ymo-nopadding ymo-Panel">
                        <h2 class="col-md-7 ymo-title-a ymo-Panel">
                            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','account details') ?>
                        </h2>
                        <a href="#" class="ymo-btn-logout">edit</a>
                        <ul class="col-md-12 ymo-Panel">
                            <li>
                                <strong>email</strong>
                                <p>
                                    p.almeida85@gmail.com
                                </p>
                            </li>
                            <li>
                                <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','password') ?></strong><br/>
                                <p>
                                    123456789
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!--ymo-card-account-->

                </div>
            </div>
            <!-- End ymo-account-right-->

        </div>
    </div>
</div>