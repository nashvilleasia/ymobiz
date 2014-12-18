<div class="row ymo-nomargin">
    <div class="col-md-12 ymo-header-settings ymo-nopadding">
        <div class="col-md-3 ymo-logo ymo-nopadding">
            <a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('') ?>">
                <img src="<?php echo \Yii::$app->getModule('settings')->ymoTools->imageSrc('logo.png','img')?>" alt="..." class="img-responsive">
            </a>
        </div>

        <?php
        if(!Yii::$app->user->isGuest)
        {
            ?>

            <div class="col-md-9 ymo-menu-group ymo-nopadding">
                <!--ymo-menu-->
                <div class="col-md-2 ymo-nav-ymobiz ymo-nopadding">
                    <?php
                        echo $this->render('pages/menu-notifications');
                    ?>
                </div>
                
                <ul class="col-md-10 ymo-menu list-inline ymo-nopadding">
                    <?php
                    echo $this->render('pages/menu-settings');
                    ?>
                </ul>
                <!--ymo-menu-->
            </div>

        <?php
        }else{

            echo $this->render('/site/pages/login-form');

        }
        ?>

    </div>
</div>