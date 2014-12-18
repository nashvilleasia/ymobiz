<div class="row">
    <div class="col-md-12 ymo-header ymo-Panel">
        <?php
            echo $this->render('header-logo');
            if (!Yii::$app->user->isGuest)
            {
            	Yii::$app->getModule('site')->ymoMenu->accessMenu();
            }else{
                echo $this->render('login-form');
            }
        ?>
    </div>
</div>