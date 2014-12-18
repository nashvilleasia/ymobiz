<?php
use app\components\ymoTranslate;
?>

<!--ymo-menu-notifications-->
<div class="ymo-menu-notifications">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="badge ymo-notifications">!</span>
        <span class="badgeymo-notifications-pink" style="display: none;">4</span>
    </a>

    <ul class="list-unstyled dropdown-menu ymo-sub-menu">
        <h6>notifications</h6>
        <a class="view" href="#">view all</a>
        <hr/>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/offshore.jpg" alt="...">
                <p>2 new messages</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/image-flower.jpg" alt="...">
                <p>1 missed call</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                <p>2 new flowers</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                <p>1 new contact request</p>
            </a>
        </li>
    </ul>

</div>
<!--ymo-menu-notifications-->


<!--ymo-menu-account-->
<div class="ymo-menu-account">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
        <span class="caret"></span>
    </a>
    <ul class="list-unstyled dropdown-menu ymo-sub-menu">
        <h6>choose account</h6>
        <a class="view" href="#">+add new</a>
        <hr/>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/offshore.jpg" alt="...">
                <p>offshore brain</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/image-flower.jpg" alt="...">
                <p>soulcaring</p>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/flower.jpg" alt="...">
                <p>company of companies</p>
            </a>
        </li>
        <hr/>
        <!--ymo-menu-config-->
        <ul class="list-inline ymo-menu-config">
            <li>
                <a href="/site/logout" data-method="post">
                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/logout-icon.png" alt="...">
                    logout
                </a>
            </li>
            <li>
                <a href="/settings">
                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/settings-icon.png" alt="...">
                    settings
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/question_blue.png" alt="...">
                    help
                </a>
            </li>
        </ul>
    </ul>
</div>
