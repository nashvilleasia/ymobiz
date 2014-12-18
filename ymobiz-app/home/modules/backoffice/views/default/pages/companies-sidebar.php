<?php
echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'filter','module' => 'backoffice','size'=>'sm'],
]);
?>


<div class="col-md-4 ymo-left-marketing ymo-nopadding">

    <!--ymo-left-list-->
    <ul class="col-md-12 ymo-left-list ymo-nopadding ymo-Panel">
        <li>
            <a class="ymo-icon-contacts active" href="/backoffice/user-log">
                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','users') ?>
            </a>
        </li>
        <li>
            <a class="ymo-icon-company" href="/backoffice/companies-log">
                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','companies') ?>
            </a>
        </li>
    </ul>
    <!--ymo-left-list-->

    <!--ymo-table-->
    <div class="col-md-12 ymo-nopadding ymo-table-sidebar ymo-scroll">
        <div class="col-md-12 ymo-nopadding ymo-table">

            <!--ymo-table-list-->
            <table class="ymo-table-list table table-responsive">
                <tbody>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Sun Infotech') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                            <tbody class="ymo-list-show">
                                <tr>
                                    <td colspan="2">
                                        <div class="col-md-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','tax number') ?></p><span>0000000000</span>
                                        </div>
                                        <div class="col-md-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','business area') ?></p><span><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','software') ?></span>
                                        </div>
                                        <div class="col-md-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','address') ?></p><span><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','address') ?></span>
                                        </div>
                                        <div class="col-md-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','country') ?></p><span><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','company phone') ?>x</span>
                                        </div>
                                        <div class="col-md-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','company email') ?></p><span>general@email.com</span>
                                        </div>
                                        <div class="col-md-12 ymo-user-details ymo-nopadding">
                                            <p><?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','company phone') ?></p><span>+351 210000000</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Oracle') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Hewlett-Packard') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','DHL Parcel Service') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Cisco Systems') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','Microsoft') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="ymo-image-user" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                            <p>
                                <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','DHL Parcel Service') ?>
                            </p>
                            <img class="ymo-icon-dropdown" src="<?php echo \Yii::$app->getModule('backoffice')->ymoTools->imageSrc('dropdown.png','img/icons')?>" alt="...">
                            <a href="#">view profile</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--ymo-table-list-->

        </div>
    </div>
    <!--ymo-table-->


    <div class="col-md-12 ymo-table-footer ymo-nopadding">

        <!--ymo-filter-->
        <a  data-action="filter" data-size="lg" class="col-md-5 ymo-icon-filter ymo-nopadding">
            <?php echo Yii::$app->getModule('backoffice')->ymoTranslate->t('backoffice','app','filter') ?>
        </a>
        <!--ymo-filter-->

        <!--ymo-search-->
        <div class="col-md-6 ymo-search ymo-nopadding">
            <input type="text" name="search" class="form-control input-sm" placeholder="search">
            <input type="submit" name="magnifier" value="">
        </div>
        <!--ymo-search-->

    </div>
</div>
