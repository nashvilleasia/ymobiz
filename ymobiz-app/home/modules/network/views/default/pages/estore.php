<?php

drmabuse\slick\SlickWidget::widget([
	'container' => '.single-item',
	'settings'  => [
		'slick' => [
			'infinite'      =>  true,
			'slidesToShow'  =>  5,
			'onBeforeChange'=> new \yii\web\JsExpression('function(){
                }'),
			'onAfterChange' => new \yii\web\JsExpression('function(){
                    console.debug(this);
                }'),
			'responsive' => [
				[
					'breakpoint'=> 768,
					'settings'=> [
						'arrows'=> false,
						'centerMode'=> true,
						'centerPadding'=> 40,
						'slidesToShow'=> 3
					]
				]
			],
		],
		'slickGoTo'         => 3,
	]
]);

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'shopping-cart','module' => 'network','size'=>'lg'],
    ['id'=>'add-article','module' => 'network','size'=>'sm'],
    ['id'=>'article-added','module' => 'network','size'=>'sm'],
]);

?>

<!--ymo-slider-->
<div class="ymo-slider slider single-item slick-slider">
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image1.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image2.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image3.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image4.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image5.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image1.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image2.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image3.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image4.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image5.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image1.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
    <div>
        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('e-store-image2.jpg','img')?>" alt="...">
        <h4>lorem ipsum</h4>
    </div>
</div>

<!--ymo-slider-->

<!--ymo-column-left-->
<div class="col-md-8 ymo-left ymo-store ymo-nopadding ymo-Panel">

    <!--ymo-post-->
    <ul class="col-md-12 ymo-post ymo-nopadding ymo-Panel">
        <li>
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
                <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
                <span>224 USD</span>
                <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
                <p>
                	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                    Quam nunc putamus parum, claram anteposuerit litterarum formas humanitatis per
	                    seacula quarta decima et quinta decima. Autem vel eum iriure dolor in hendrerit
	                    in vulputate velit esse ese molestie! Littera gothica eodem modo typi qui nun
	                    nobis videntur parum clari fiant sollemnes in? Quam nu parum, claram anteposuerit
	                    litterarum formas humanitatis.
                	') ?>
                </p>
                <div class="col-md-3 ymo-nopadding" style="margin-right: 40px;">
                	<select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select size') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                </div>
                <div class="col-md-4 ymo-select-color ymo-nopadding">
                	<label>select color:</label>
                    <ul class="list-inline">
                    	<li>
                    		<a href="#" class="ymo-color-blue"></a>
                    	</li>
                    	<li>
                    		<a href="#" class="ymo-color-yellow"></a>
                    	</li>
                    	<li>
                    		<a href="#" class="ymo-color-black"></a>
                    	</li>
                    	<li>
                    		<a href="#" class="ymo-color-pink"></a>
                    	</li>
                    </ul>
                </div>
            </div>
            <!--ymo-post-news-->

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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->

            <!--ymo-comments-->
            <ul class="col-md-11 ymo-comments col-md-offset-1 ymo-nopadding ymo-Panel" style="display: none;">

                <!--ymo-mypost-->
                <div class="col-md-12 ymo-mypost ymo-nopadding">
                    <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('flower.jpg','img/icons')?>" alt="...">
                    <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','company of companies') ?></h4>
                    <form action="">

                        <!--ymo-newpost-->
                        <div class="ymo-arrow-box-up">
                            <textarea name="" id="" cols="30" rows="3" placeholder="your post"></textarea>
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
                        <p class="col-md-3 ymo-nopadding">16:15 | sep 28, 2012</p>
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
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
                <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
                <span>224 USD</span>
                <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->
        </li>
        <li>
        <!--ymo-post-news-->
        <div class="col-md-12 ymo-post-news ymo-nopadding">
            <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
            <del>224 USD</del>
            <span>112 USD</span>
            <h6>(50% off ymocard <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','discount') ?>)</h6>
            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

        <!--ymo-add-cart-->
        <div class="col-md-5 ymo-add-cart ymo-nopadding">
            <div class="input-group">
                <select class="form-control">
                    <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select>
                <div class="input-group-btn">
                    <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                </div>
            </div>
        </div>
        <!--ymo-add-cart-->
        </li>
        <li>
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
            	<h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
                <span>224 USD</span>
            	<a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->
        </li>
        <li>
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
            	<h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
                <span>224 USD</span>
                <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->
        </li>
        <li>
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
	            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
	            <del>224 USD</del>
	            <span>112 USD</span>
	            <h6>(50% off ymocard <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','discount') ?>)</h6>
	            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->
        </li>
        <li>
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
            	<h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
                <span>224 USD</span>
                <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->
        </li>
        <li>
        <!--ymo-post-news-->
        <div class="col-md-12 ymo-post-news ymo-nopadding">
            <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
            <del>224 USD</del>
            <span>112 USD</span>
            <h6>(50% off ymocard <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','discount') ?>)</h6>
            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

        <!--ymo-add-cart-->
        <div class="col-md-5 ymo-add-cart ymo-nopadding">
            <div class="input-group">
                <select class="form-control">
                    <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select>
                <div class="input-group-btn">
                    <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                </div>
            </div>
        </div>
        <!--ymo-add-cart-->
        </li>
        <li >
            <!--ymo-post-news-->
            <div class="col-md-12 ymo-post-news ymo-nopadding">
                <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-post.jpg','img')?>" alt="...">
            	<h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','lorem ipsum') ?></h4>
                <span>224 USD</span>
                <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view product details') ?></a>
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

            <!--ymo-add-cart-->
            <div class="col-md-5 ymo-add-cart ymo-nopadding">
                <div class="input-group">
                    <select class="form-control">
                        <option value=""><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','quantity') ?></option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                    <div class="input-group-btn">
                        <a href="#" data-action="add-article" data-size="lg" class="btn ymo-btn-pink"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','add to cart') ?></a>
                    </div>
                </div>
            </div>
            <!--ymo-add-cart-->
        </li>
    </ul>
    <!--ymo-post-->

</div>
<!--ymo-column-left-->

<!--ymo-column-right-->

<!--ymo-cart-->
<div class="col-md-4 ymo-cart ymo-nopadding ymo-Panel">
    <p>
        <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','shopping cart') ?> (2 products)
    </p>
<!--     <form class="col-md-6 ymo-form-cart ymo-nopadding"> -->
<!--         <div class="col-md-6 ymo-nopadding form-group"> -->
<!--             <input type="text" class="form-control"> -->
<!--         </div> -->
        <a href="#" class="ymo-btn-pink" data-action="shopping-cart" data-size="lg"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','view cart') ?></a>
<!--     </form> -->
</div>
<!--ymo-cart-->

<?php echo \Yii::$app->view->render('sidebar-category') ?>
<!--ymo-column-right-->