<?php
use app\components\ymoTranslate;

?>

<!--ymo-column-left-->
<div class="col-xs-8 ymo-left ymo-nopadding">

    <!--ymo-mypost-->
    <div class="col-xs-12 ymo-mypost ymo-nopadding">
    	<img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?> ">
        <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','company of companies') ?></h4>
        
        <!--form-->
        <form action="">

            <!--ymo-arrow-box-up-->
            <div class="ymo-arrow-box-up">
                <textarea name="" id="" cols="30" rows="5" placeholder="your post"></textarea>
            </div>
            <!--ymo-arrow-box-up-->

            <!--ymo-view-post-->
            <div class="col-xs-3 ymo-view-post ymo-nopadding">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view all posts') ?> 
                    <span class="caret"></span>
                </a>
                <ul class="list-unstyled dropdown-menu ymo-sub-menu">
                    <li class="active">
                        <a href="#" style="display: block;">
                            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view my post') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view only links') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view only text') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view only pictures') ?>
                        </a>
                    </li>
                </ul>
            </div>
            <!--ymo-view-post-->

            <!--ymo-btn-pink-->
            <button type="button" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','post') ?></button>
            <!--ymo-btn-pink-->

            <!--ymo-attachment-->
            <a class="col-xs-2 ymo-attachment ymo-nopadding" href="#">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('attachment.png','img/icons')?>" alt="...">
                <p><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','attachment') ?></p>
            </a>
            <!--ymo-attachment-->

        </form>
        <!--form-->
        
    </div>
    <!--ymo-mypost-->
    

    <!--ymo-post-->
    <ul class="col-xs-12 ymo-post ymo-nopadding">
        <li>
            <!--ymo-post-title-->
            <div class="col-xs-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-xs-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per nunc seacula quarta decima et. <a href="#">read more</a>
                	') ?>
                </p>
                <!--ymo-post-news-->
                <div class="col-xs-12 ymo-post-news ymo-nopadding">
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

            <!--ymo-post-social-->
            <ul class="list-inline ymo-post-social ymo-nopadding">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
                    </a>
                </li>
            </ul>
            <!--ymo-post-social-->

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
            <ul class="col-xs-11 ymo-comments col-xs-offset-1 ymo-nopadding ymo-Panel">

                <!--ymo-mypost-->
                <div class="col-xs-12 ymo-mypost ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                    <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','company of companies') ?></h4>
                    <form action="">

                        <!--ymo-arrow-box-up-->
                        <div class="ymo-arrow-box-up">
                            <textarea name="" id="" cols="30" rows="3" placeholder="your post"></textarea>
                        </div>
                        <!--ymo-arrow-box-up-->

                        <!--ymo-btn-pink-->
                        <button type="button" class="col-xs-2 btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','post') ?></button>
                        <!--ymo-btn-pink-->

                    </form>
                </div>
                <!--ymo-mypost-->
                
                
                <li>
                    <!--ymo-post-title-->
                    <div class="col-xs-12 ymo-post-title ymo-nopadding">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                        <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                        <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
                    </div>
                    <!--ymo-post-title-->

                    <!--ymo-post-text-->
                    <div class="col-xs-12 ymo-post-text ymo-nopadding">
                        <p>
                        	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                            Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                            per nunc seacula quarta decima et. Quam nunc putamus parum, claram anteposuerit
	                            litterarum formas humanitatis per nunc seacula quarta decima et.<a href="#">read more</a>
                        	') ?>
                        </p>
                    </div>
                    <!--ymo-post-text-->

                    <!--ymo-post-social-->
                    <ul class="list-inline ymo-post-social ymo-nopadding">
                        <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
		                    </a>
		                </li>
                    </ul>
                    <!--ymo-post-social-->

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
                    <div class="col-xs-12 ymo-post-title ymo-nopadding">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                        <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                        <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
                    </div>
                    <!--ymo-post-title-->

                    <!--ymo-post-text-->
                    <div class="col-xs-12 ymo-post-text ymo-nopadding">
                        <p>
                        	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                            Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                            per nunc seacula quarta decima et. Quam nunc putamus parum, claram anteposuerit
	                            litterarum formas humanitatis per nunc seacula quarta decima et.<a href="#">read more</a>
                        	') ?>
                        </p>
                    </div>
                    <!--ymo-post-text-->

                    <!--ymo-post-social-->
                    <ul class="list-inline ymo-post-social ymo-nopadding ymo-Panel">
                        <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
		                    </a>
		                </li>
                    </ul>
                    <!--ymo-post-social-->

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
                    <div class="col-xs-12 ymo-post-title ymo-nopadding">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                        <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                        <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
                    </div>
                    <!--ymo-post-title-->

                    <!--ymo-post-text-->
                    <div class="col-xs-12 ymo-post-text ymo-nopadding">
                        <p>
                        	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                            Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                            per nunc seacula quarta decima et. Quam nunc putamus parum, claram anteposuerit
	                            litterarum formas humanitatis per nunc seacula quarta decima et.<a href="#">read more</a>
                        	') ?>
                        </p>
                    </div>
                    <!--ymo-post-text-->

                    <!--ymo-post-social-->
                    <ul class="list-inline ymo-post-social ymo-nopadding ymo-Panel">
                        <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
		                    </a>
		                </li>
		                <li>
		                    <a href="#">
		                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
		                    </a>
		                </li>
                    </ul>
                    <!--ymo-post-social-->

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
            <div class="col-xs-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-xs-12 ymo-post-text ymo-nopadding">
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

            <!--ymo-post-social-->
            <ul class="list-inline ymo-post-social ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
                    </a>
                </li>
            </ul>
            <!--ymo-post-social-->

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
            <div class="col-xs-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-xs-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per nunc seacula quarta decima et. <a href="#">read more</a>
                	') ?>
                </p>
                <!--ymo-post-image-->
                <div class="col-xs-12 ymo-post-image ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('post-image.jpg','img')?>" alt="...">
                </div>
                <!--ymo-post-image-->
            </div>
            <!--ymo-post-text-->
            <hr/>

            <!--ymo-post-social-->
            <ul class="list-inline ymo-post-social ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
                    </a>
                </li>
            </ul>
            <!--ymo-post-social-->

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
            <div class="col-xs-12 ymo-post-title ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('offshore.jpg','img/icons')?>" alt="...">
                <h4 class="col-xs-8 ymo-nopadding"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','offshore brain') ?></h4>
                <p class="col-xs-3 ymo-nopadding ymo-Panel">16:15 | sep 28, 2012</p>
            </div>
            <!--ymo-post-title-->

            <!--ymo-post-text-->
            <div class="col-xs-12 ymo-post-text ymo-nopadding">
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis
	                    per nunc seacula quarta decima et. <a href="#">read more</a>
                	') ?>
                </p>
                <!--ymo-post-video-->
                <div class="col-xs-12 ymo-post-video ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('video-lg.png','img')?>" alt="...">
                </div>
                <!--ymo-post-video-->
            </div>
            <!--ymo-post-text-->
            <hr/>

            <!--ymo-post-social-->
            <ul class="list-inline ymo-post-social ymo-nopadding ymo-Panel">
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('facebook.png','img')?>" title="facebook" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('google-plus.png','img')?>" title="google plus" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('twitter.png','img')?>" title="twitter" alt="...">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('linkedin.png','img')?>" title="linkedin" alt="...">
                    </a>
                </li>
            </ul>
            <!--ymo-post-social-->

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
    </ul>
    <!--ymo-post-->

</div>
<!--ymo-column-left-->

<!--ymo-column-right-->
<?php echo \Yii::$app->view->render('pages/sidebar') ?>
<!--ymo-column-right-->