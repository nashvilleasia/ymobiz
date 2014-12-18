<?php
use kartik\widgets\DatePicker;

$this->registerJs("

jQuery('.ymo-search-fade div a').on('click',function(e){
		e.preventDefault();

		var textButton = jQuery(this);
		if(textButton.text()==='advanced search options')
		{
			textButton.text('hide advanced search');
		}else if(textButton.text()==='hide advanced search'){
            textButton.text('advanced search options');
        }

		var boxButton = jQuery('.ymo-adv-search');
		if(boxButton.is(':visible')===false)
        {
            boxButton.show();
        }else{
            boxButton.hide();
        }
	});

");

echo \ymobiz\components\ymoTools::preloadModal([
    ['id'=>'shopping-cart','module' => 'network','size'=>'lg'],
    ['id'=>'add-article','module' => 'network','size'=>'sm'],
    ['id'=>'article-added','module' => 'network','size'=>'sm'],
    ['id'=>'article-added','module' => 'network','size'=>'sm'],
    ['id'=>'delete-post','module' => 'network','size'=>'sm'],
    ['id'=>'post-deleted','module' => 'network','size'=>'sm'],
]);

?>

<?php echo \Yii::$app->view->render('admin-profile-header') ?>

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

                <!--ymo-edit-right-->
                <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="#" data-action="delete-post" data-size="lg">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-right-->

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

            <!--ymo-comments-->
            <ul class="col-md-11 ymo-comments col-md-offset-1 ymo-nopadding ymo-Panel" style="display: none;">

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
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit_on.png','img/icons')?>" alt="...">
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

                <!--ymo-edit-right-->
                <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                        </li>
                        <li>
                            <a href="#" data-action="delete-post" data-size="lg">
                                <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--ymo-edit-right-->

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

            <!--ymo-edit-right-->
            <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                </a>
                <ul class="dropdown-menu">
    	            <li>
                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                    </li>
                    <li>
                        <a href="#" data-action="delete-post" data-size="lg">
         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                        </a>
                    </li>
            	</ul>
            </div>
            <!--ymo-edit-right-->

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

                <!--ymo-edit-right-->
                <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
	                </a>
	                <ul class="dropdown-menu">
	    	            <li>
	                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
	                    </li>
	                    <li>
	                        <a href="#" data-action="delete-post" data-size="lg">
	         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
	                        </a>
	                    </li>
	            	</ul>
                </div>
                <!--ymo-edit-right-->

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

                <!--ymo-edit-right-->
                <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
	                </a>
	                <ul class="dropdown-menu">
	    	            <li>
	                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
	                    </li>
	                    <li>
	                        <a href="#" data-action="delete-post" data-size="lg">
	         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
	                        </a>
	                    </li>
	            	</ul>
                </div>
                <!--ymo-edit-right-->

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

            <!--ymo-edit-right-->
            <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                </a>
                <ul class="dropdown-menu">
    	            <li>
                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                    </li>
                    <li>
                        <a href="#" data-action="delete-post" data-size="lg">
         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                        </a>
                    </li>
            	</ul>
            </div>
            <!--ymo-edit-right-->

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

                <!--ymo-edit-right-->
                <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
	                </a>
	                <ul class="dropdown-menu">
	    	            <li>
	                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
	                    </li>
	                    <li>
	                        <a href="#" data-action="delete-post" data-size="lg">
	         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
	                        </a>
	                    </li>
	            	</ul>
                </div>
                <!--ymo-edit-right-->

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

            <!--ymo-edit-right-->
            <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
                </a>
                <ul class="dropdown-menu">
    	            <li>
                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
                    </li>
                    <li>
                        <a href="#" data-action="delete-post" data-size="lg">
         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
                        </a>
                    </li>
            	</ul>
            </div>
            <!--ymo-edit-right-->

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

                <!--ymo-edit-right-->
                <div class="col-md-1 ymo-edit-right ymo-nopadding ymo-Panel">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	 	               <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('edit.png','img/icons')?>" alt="...">
	                </a>
	                <ul class="dropdown-menu">
	    	            <li>
	                        <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','edit') ?></a>
	                    </li>
	                    <li>
	                        <a href="#" data-action="delete-post" data-size="lg">
	         	               <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','delete') ?>
	                        </a>
	                    </li>
	            	</ul>
                </div>
                <!--ymo-edit-right-->

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
<div class="col-md-4 ymo-right ymo-nopadding ymo-Panel">

    <!--ymo-search-->
    <div class="col-md-12 ymo-search-fade ymo-nopadding ymo-Panel">
        <div class="col-md-6 ymo-search-options ymo-nopadding ymo-Panel">
            <a href="#"><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','advanced search options') ?></a>
        </div>
        <div class="col-md-6 ymo-search ymo-nopadding ymo-Panel">
            <input type="text" name="search" class="form-control" placeholder="search" />
            <input type="submit" name="magnifier" value="">
        </div>
    </div>
    <!--ymo-search-->

    <!--ymo-adv-search-->
    <div class="col-md-12 ymo-adv-search ymo-nopadding ymo-Panel" style="display: none">
        <form action="">
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select country') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select city') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select activity sector') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select business volume') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select years of activity') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select products') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select servicess') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','france') ?></option>
                </select>
            </div>
        </form>
    </div>
    <!--ymo-adv-search-->

    <!--ymo-statistics-->
    <div class="col-md-12 ymo-statistics ymo-nopadding ymo-Panel">
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','profile views') ?></th>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','new followers') ?></th>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','new contacts') ?></th>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','profile searches') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>450</td>
                    <td>15</td>
                    <td>07</td>
                    <td>02</td>
                </tr>
            </tbody>
        </table>
        <select class="form-control">
            <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','last week') ?></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <!--ymo-statistics-->

    <!--ymo-list-category-->
    <div class="col-md-12 ymo-list-category ymo-nopadding ymo-Panel">
        <h5><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','category') ?> 1</h5>
        <p>
            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','choose product:') ?>
        </p>
        <ul class="list-unstyled ymo-scroll">
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 1
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 2
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 3
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 4
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 5
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 6
                </a>
            </li>
        </ul>
        <hr/>
    </div>
    <div class="col-md-12 ymo-list-category ymo-nopadding ymo-Panel">
        <h5><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','category') ?> 2</h5>
        <p>
            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','choose product:') ?>
        </p>
        <ul class="list-unstyled ymo-scroll">
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 1
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 2
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 3
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 4
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 5
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 6
                </a>
            </li>
        </ul>
        <hr/>
    </div>
    <div class="col-md-12 ymo-list-category ymo-nopadding ymo-Panel">
        <h5><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','category') ?> 3</h5>
        <p>
            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','choose product:') ?>
        </p>
        <ul class="list-unstyled ymo-scroll">
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 1
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 2
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 3
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 4
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 5
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 6
                </a>
            </li>
        </ul>
        <hr/>
    </div>
    <div class="col-md-12 ymo-list-category ymo-nopadding ymo-Panel">
        <h5><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','category') ?> 4</h5>
        <p>
            <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','choose product:') ?>
        </p>
        <ul class="list-unstyled ymo-scroll">
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 1
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 2
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 3
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 4
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 5
                </a>
            </li>
            <li>
                <a href="#">
                    <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','product') ?> 6
                </a>
            </li>
        </ul>
        <hr/>
    </div>
    <!--ymo-list-category-->

</div>
<!--ymo-column-right-->