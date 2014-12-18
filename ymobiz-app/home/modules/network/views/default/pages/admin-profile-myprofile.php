
<?php echo \Yii::$app->view->render('admin-profile-header') ?>

<!--ymo-column-left-->
<div class="col-md-8 ymo-left ymo-nopadding ymo-Panel">

    <div class="ymo-post-profile">
    <!--ymo-post-->
    <ul class="col-md-12 ymo-post ymo-nopadding ymo-Panel">
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <h4 class="col-md-2 ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','who are we?') ?></h4>

                <!--ymo-edit-->
                <div class="col-md-1 ymo-edit ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?></a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-->

            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per seacula quarta decima et quinta decima. Autem vel eum iriure dolor in
	                    hendrerit in vulputate velit esse ese molestie! Littera gothica eodem modo
	                    typi qui nunc nobis videntur parum clari fiant sollemnes in? Quam nunc
	                    putamus parum, claram anteposuerit litterarum formas humanitatis. Littera
	                    gothica eodem modo typi qui nunc nobis videntur.
                	') ?>
            </div>
            <!--ymo-post-text-->

            <!--ymo-post-video-->
            <div class="col-md-12 ymo-post-video ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('video-lg.png','img')?>" alt="...">
            </div>
            <!--ymo-post-video-->
        </li>
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <h4 class="col-md-12 ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brief description') ?></h4>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <h5><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h5>
                <h6>
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per
	                    seacula quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit
	                    in vulputate velit esse ese molestie! Littera gothica eodem modo typi qui nunc
	                    nobis videntur parum clari fiant sollemnes in? Quam nunc putamus parum, claram
	                    anteposuerit litterarum formas humanitatis. <br/><br/>
	                    Dolor in hendrerit in vulputate velit esse ese molestiem formas humanitatis per
	                    seacula quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit
	                    in vulputate velit esse ese molestie! Quam nunc putamus parum, claram anteposuerit
	                    litterarum formas humanitatis per seacula quarta decima et quinta decima. Quam
	                    nunc putamus parum, claram anteposuerit litterarum formas humatamus parum,
	                    claram anteposuerit litterarum formas humanitatis per seacula quarta decima
	                    et quinta decima.
                	') ?>
                    <br/>
                    <br/>
                </h6>
                <h5><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','dolor sit amet') ?></h5>
                <h6>
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Dolor in hendrerit in vulputate velit esse ese molestiem formas humanitatis per seacula
	                    quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit in vulputate
	                    velit esse ese molestie! Quam nunc putamus parum, claram anteposuerit litterarum formas
	                    humanitatis per seacula quarta decima et quinta decima. Quam nunc putamus parum, claram
	                    anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.
	                    Autem vel eum iriure dolor in hendrerit in vulputate velit esse ese molestie! Quam nunc
	                    putamus parum, claram anteposuerit litterarum formas humanitatis per seacula quarta
	                    decima et quinta decima.
                	') ?>
                </h6>
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('map.jpg','img')?>" alt="...">
            </div>
            <!--ymo-post-text-->
        </li>
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <h4 class="col-md-12 ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','album description') ?></h4>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <p>
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per seacula quarta decima et quinta decima. Autem vel eum iriure dolor in
	                    hendrerit in vulputate velit esse ese molestie! Littera gothica eodem modo
	                    typi qui nunc nobis videntur parum clari fiant sollemnes in? Quam nunc
	                    putamus parum, claram anteposuerit litterarum formas humanitatis. Littera
	                    gothica eodem modo typi qui nunc nobis videntur.
                	') ?>
                </p>
            </div>
            <!--ymo-post-text-->

            <!--ymo-post-video-->
            <div class="col-md-12 ymo-post-video ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-myprofile.jpg','img')?>" alt="...">
            </div>
            <!--ymo-post-video-->
        </li>
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <h4 class="col-md-12 ymo-nopadding ymo-Panel"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','our team') ?></h4>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <p>
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per
	                    seacula quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit
	                    in vulputate velit esse ese molestie! Littera gothica eodem modo typi qui nunc
	                    nobis videntur parum clari fiant sollemnes in? Quam nunc putamus parum, claram
	                    anteposuerit litterarum formas humanitatis. <br/><br/>
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per
	                    seacula quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit
	                    in vulputate velit esse ese molestie! Littera gothica eodem modo typi qui nunc
	                    nobis videntur parum clari fiant sollemnes in? Quam nunc putamus parum, claram
	                    anteposuerit litterarum formas humanitatis.
                	') ?>
                </p>
            </div>
            <!--ymo-post-text-->

            <!--ymo-staff-member-->
            <ul class="col-md-12 ymo-staff-member ymo-nopadding">
                <li class="col-md-6 ymo-staff-member-left ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-right ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-left ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-right ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-left ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-right ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-left ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
                <li class="col-md-6 ymo-staff-member-right ymo-nopadding ymo-Panel">
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-staff-member.jpg','img')?>" alt="...">
                        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','staff member name') ?></h4>
                        <span><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','ceo') ?></span>
                        <img class="ymo-icon-communicate" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('buble_on.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-chat" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <img class="ymo-icon-mail" src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('email.png','img/icons')?>" alt="...">
                    </a>
                    <hr/>
                </li>
            </ul>
            <!--ymo-staff-member-->
        </li>
    </ul>
    <!--ymo-post-->
    </div>

</div>
<!--ymo-column-left-->

<!--ymo-column-right-->
<?php echo \Yii::$app->view->render('sidebar-profile') ?>
<!--ymo-column-right-->