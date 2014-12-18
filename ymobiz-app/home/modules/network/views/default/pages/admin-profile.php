<?php echo \Yii::$app->view->render('admin-profile-header') ?>

<!--ymo-column-left-->
<div class="col-md-8 ymo-left ymo-nopadding ymo-Panel">

    <!--ymo-post-->
    <ul class="col-md-12 ymo-post ymo-nopadding ymo-Panel">
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>

                <!--ymo-edit-left-->
                <div class="col-md-1 ymo-edit-left ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/popups/delete-post')?>">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-left-->

                <p class="col-md-2 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per nunc seacula quarta decima et. <a href="#">read more</a>
                	') ?>
                </p>
                <!--ymo-post-news-->
                <div class="col-md-12 ymo-post-news ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
                    <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum dolor') ?></h4>
                    <p>
                    	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                        Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per
	                        seacula quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit
	                        in vulputate velit esse ese molestie! Littera gothica eodem modo typi qui nun
	                        nobis videntur parum clari fiant sollemnes in? Quam nu parum, claram anteposuerit
	                        litterarum formas humanitatis.
                        ') ?>
                    </p>
                </div>
                <!--ymo-post-news-->
            </div>
            <!--ymo-post-text-->
            <hr/>
            <!--ymo-post-links-->
            <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
                        <span>(10)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
                        <span>(23)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_share.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','share') ?>
                        <span>(2)</span>
                    </a>
                </li>
            </ul>
            <!--ymo-post-links-->

            <!--ymo-comments-->
            <ul class="col-md-11 ymo-comments col-md-offset-1 ymo-nopadding ymo-Panel" style="display: none">

                <!--ymo-mypost-->
                <div class="col-md-12 ymo-mypost ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                    <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','company of companies') ?></h4>
                    <form action="">

                        <!--ymo-newpost-->
                        <div class="ymo-newpost">
                            <textarea name="" id="" rows="3" placeholder="your post"></textarea>
                        </div>
                        <!--ymo-newpost-->

                        <!--ymo-btn-pink-->
                        <button type="button" class="col-md-2 btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','post') ?></button>
                        <!--ymo-btn-pink-->

                    </form>
                </div>
                <!--ymo-mypost-->
                <li>
                    <!--ymo-post-title-->
                    <div class="col-md-12 ymo-post-title ymo-nopadding">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                		<h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                        <p class="col-md-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
                    </div>
                    <!--ymo-post-title-->

                    <!--ymo-post-text-->
                    <div class="col-md-12 ymo-post-text ymo-nopadding">
                        <p>
                        	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                            Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                            per nunc seacula quarta decima et. Quam nunc putamus parum, claram anteposuerit
	                            litterarum formas humanitatis per nunc seacula quarta decima et.<a href="#">read more</a>
                        	') ?>
                        </p>
                    </div>
                    <!--ymo-post-text-->

                    <!--ymo-post-links-->
                    <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                        <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
		                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
		                        <span>(10)</span>
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
		                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
		                        <span>(23)</span>
		                    </a>
		                </li>
                    </ul>
                    <!--ymo-post-links-->
                </li>
                <li>
                    <!--ymo-post-title-->
                    <div class="col-md-12 ymo-post-title ymo-nopadding">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                		<h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                        <p class="col-md-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
                    </div>
                    <!--ymo-post-title-->

                    <!--ymo-post-text-->
                    <div class="col-md-12 ymo-post-text ymo-nopadding">
                        <p>
                        	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                            Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                            per nunc seacula quarta decima et. Quam nunc putamus parum, claram anteposuerit
	                            litterarum formas humanitatis per nunc seacula quarta decima et.<a href="#">read more</a>
                        	') ?>
                        </p>
                    </div>
                    <!--ymo-post-text-->

                    <!--ymo-post-links-->
                    <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                        <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
		                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
		                        <span>(10)</span>
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
		                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
		                        <span>(23)</span>
		                    </a>
		                </li>
                    </ul>
                    <!--ymo-post-links-->
                </li>
                <li>
                    <!--ymo-post-title-->
                    <div class="col-md-12 ymo-post-title ymo-nopadding">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                		<h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                        <p class="col-md-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
                    </div>
                    <!--ymo-post-title-->

                    <!--ymo-post-text-->
                    <div class="col-md-12 ymo-post-text ymo-nopadding">
                        <p>
                        	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                            Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                            per nunc seacula quarta decima et. Quam nunc putamus parum, claram anteposuerit
	                            litterarum formas humanitatis per nunc seacula quarta decima et.<a href="#">read more</a>
                        	') ?>
                        </p>
                    </div>
                    <!--ymo-post-text-->

                    <!--ymo-post-links-->
                    <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                        <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
		                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
		                        <span>(10)</span>
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
		                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
		                        <span>(23)</span>
		                    </a>
		                </li>
                    </ul>
                    <!--ymo-post-links-->
                </li>
            </ul>
            <!--ymo-comments-->
        </li>
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>

                <!--ymo-edit-left-->
                <div class="col-md-1 ymo-edit-left ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/popups/delete-post')?>">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-left-->

                <p class="col-md-2 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per nunc seacula quarta decima et.Quam nunc putamus parum, claram anteposuerit
	                    litterarum formas humanitatis per seacula quarta decima et quinta decima. Autem
	                    vel eum iriure dolor in hendrerit in vulputate velit esse ese molestie! Littera.
	                    <a href="#">read more</a>
                	') ?>
                </p>
            </div>
            <!--ymo-post-text-->
            <hr/>
            <!--ymo-post-links-->
            <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
                        <span>(10)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
                        <span>(23)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_share.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','share') ?>
                        <span>(2)</span>
                    </a>
                </li>
            </ul>
            <!--ymo-post-links-->
        </li>
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>

                <!--ymo-edit-left-->
                <div class="col-md-1 ymo-edit-left ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/popups/delete-post')?>">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-left-->

                <p class="col-md-2 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per nunc seacula quarta decima et. <a href="#">read more</a>
                	')?>
                </p>
                <!--ymo-post-image-->
                <div class="col-md-12 ymo-post-image ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('post-image.jpg','img')?>" alt="...">
                </div>
                <!--ymo-post-image-->
            </div>
            <!--ymo-post-text-->
            <hr/>
            <!--ymo-post-links-->
            <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
                        <span>(10)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
                        <span>(23)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_share.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','share') ?>
                        <span>(2)</span>
                    </a>
                </li>
            </ul>
            <!--ymo-post-links-->
        </li>
        <li>
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>

                <!--ymo-edit-left-->
                <div class="col-md-1 ymo-edit-left ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/popups/delete-post')?>">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-left-->

                <p class="col-md-2 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-md-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per seacula
	                    quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit in vulputate
	                    velit esse ese molestie! Littera gothica eodem modo typi qui nunc nobis videntur parum.
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per seacula
	                    quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit in vulputate
	                    velit esse ese molestie! Littera gothica eodem modo typi qui nunc nobis videntur parum.
	                    Littera gothica eodem modo typi qui nunc nobis videntur parum. Quam nunc putamus parum,
	                    claram anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta
	                    decima. Autem vel eum iriure dolor in hendrerit in vulputate velit esse ese molestie!
	                    Autem vel eum iriure dolor in hendrerit in vulputate velit esse ese molestie! Littera
	                    gothica eodem modo typi qui nunc nobis videntur parum.
	                    <a href="#">read more</a>
                	')?>
                </p>
            </div>
            <!--ymo-post-text-->
            <hr/>
            <!--ymo-post-links-->
            <ul class="list-inline ymo-post-links ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_like.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','like') ?>
                        <span>(10)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_comment.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comment') ?>
                        <span>(23)</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('comments_share.png','img/icons')?>" alt="...">
                        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','share') ?>
                        <span>(2)</span>
                    </a>
                </li>
            </ul>
            <!--ymo-post-links-->
        </li>
        <li class="edition" style="width: 100%;  display: none;">
            <!--ymo-post-title-->
            <div class="col-md-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                <h4 class="col-md-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>

                <!--ymo-edit-left-->
                <div class="col-md-1 ymo-edit-left ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl('network/popups/delete-post')?>">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-left-->

                <p class="col-md-2 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-mypost-->
            <div class="col-md-12 ymo-mypost ymo-nopadding">
                <form action="">

                    <!--ymo-arrow-box-up-->
                    <div class="ymo-arrow-box-up">
                        <textarea name="" id="" cols="30" rows="5" placeholder="your post"></textarea>
                    </div>
                    <!--ymo-arrow-box-up-->

                    <!--ymo-attachment-->
                    <a class="col-md-2 col-md-offset-6 ymo-nopadding ymo-Panel ymo-attachment" href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('attachment-blue.png','img/icons')?>" alt="...">
                		<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','attachment')?>
                    </a>
                    <!--ymo-attachment-->

                    <!--ymo-btn-pink-->
                    <div class="col-md-4 ymo-buttons ymo-nopadding ymo-Panel">
                        <a href="<?php echo \Yii::$app->urlManager->createUrl('network/popups/save-post-edition')?>" type="button" class="col-md-6 btn ymo-btn-blue btn-sm"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','save')?></a>
                        <a type="button" class="col-md-6 btn ymo-btn-blue btn-sm"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','cancel')?></a>
                    </div>
                    <!--ymo-btn-pink-->

                </form>
            </div>
            <!--ymo-mypost-->
        </li>
    </ul>
    <!--ymo-post-->

</div>
<!--ymo-column-left-->

<!--ymo-column-right-->
<?php echo \Yii::$app->view->render('sidebar') ?>
<!--ymo-column-right-->