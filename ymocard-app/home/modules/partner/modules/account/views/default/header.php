<div class="row">
    <div class="col-md-12 ymo-header ymo-Panel">
        <?php
        echo $this->render('@site/views/default/header-logo');
        if (!Yii::$app->user->isGuest)
        {
            echo $this->render('@site/views/default/menu');
        }else{
            echo $this->render('@site/views/default/login-form');
        }
        ?>
    </div>
</div>