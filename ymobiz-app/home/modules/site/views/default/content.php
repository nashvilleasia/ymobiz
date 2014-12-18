<?php 

$view = Yii::$app->getView();
$view->registerCss("
	.boxsubmain,.boxmain{
		width: 940px;
		height: 400px;
	}	
");

?>

<div class="col-md-12 ymo-content ymo-nopadding">

    <div class="col-md-12 ymo-headline ymo-nopadding boxmain">
        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('headtitle.png','img')?>" alt="..." class="img-responsive ymo-headline-ymobiz">

        <div class="col-md-4 ymo-input-register input-group ymo-nopadding">
            <input type="text" class="form-control input-lg email-pre-order" placeholder="please enter your email">
            <span class="input-group-btn">
    			<a href="#top" class="btn ymo-btn-pink home-pre-order" data-action="register" data-size="md">pre-register now</a>
            </span>
        </div>
    </div>
    
    <div class="boxsubmain">
    	<img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('video-ymobiz.jpg','img')?>" alt="..." class="img-responsive ymo-video-ymobiz">
    </div>

    <div class="col-md-12 ymo-modules-home ymo-nopadding boxsubmain">
    	<ul class="col-md-10 ymo-nopadding">
            <li class="col-md-4 ymo-network ymo-nopadding">
                <a href="#"></a>
            </li>
            <li class="col-md-4 ymo-marketing ymo-nopadding">
                <a href="#"></a>
            </li>
            <li class="col-md-4 ymo-business ymo-nopadding">
                <a href="#"></a>
            </li>
        </ul>

		<h3 class="text-center">
	        <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','everything') ?></strong>
            <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','your business needs just') ?>
            <strong><?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','one click away!') ?></strong>
        </h3>
    </div>
    
    
    <div class="col-md-12 ymo-service ymo-nopadding boxsubmain">

        <div class="col-md-12 ymo-service-details ymo-nopadding">
            <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('video-network.jpg','img')?>" alt="..." class="img-responsive ymo-video-ymobiz">
            
            <div class="col-md-12 ymo-text-box ymo-nopadding">
	            <div class="col-md-12 ymo-title-network ymo-nopadding">
	                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('title-network.png','img')?>" alt="..." class="img-responsive">
	            </div>
	            <div class="col-md-12 ymo-service-background ymo-nopadding">
	                <p>
	                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam eget ligula eu lectus lobortis
	                    condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et
	                    netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et,
	                    sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing. Lorem ipsum dolor sit amet,
	                    consectetuer adipiscing elit. or massa. liquam nonummy auctor massa. liquam nonummy auctor massa.
	                    et netus et malesuada fames ac turpis egestas. Nulla at risus. Pellentesque habitant morbi tristique
	                    senectus et netus
	                </p>
	                <ul class="list-unstyled">
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','search and connect with clients and suppliers') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','create your company profile') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','open your company e-store') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','follow and share activity within the network') ?>
	                    </li>
	                </ul>
	            </div>
	    	</div>
	    	
        </div>

        <div class="col-md-12 ymo-service-details ymo-nopadding boxsubmain">
            <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('video-marketing.jpg','img')?>" alt="..." class="img-responsive ymo-video-ymobiz">
            
            <div class="col-md-12 ymo-text-box ymo-nopadding">
	            <div class="col-md-12 ymo-title-marketing ymo-nopadding">
	                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('title-marketing.png','img')?>" alt="..." class="img-responsive">
	            </div>
	            <div class="col-md-12 ymo-service-background ymo-nopadding">
	                <p>
	                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam eget ligula eu lectus lobortis
	                    condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et
	                    netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et,
	                    sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing. Lorem ipsum dolor sit amet,
	                    consectetuer adipiscing elit. or massa. liquam nonummy auctor massa. liquam nonummy auctor massa.
	                    et netus et malesuada fames ac turpis egestas. Nulla at risus. Pellentesque habitant morbi tristique
	                    senectus et netus
	                </p>
	                <ul class="list-unstyled">
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','manage your client/supplier relationship') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','communicate in real time (email + sms + VoIP)') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','organize your tasks with no effort') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','advertise your products/services on a global network') ?>
	                    </li>
	                </ul>
	            </div>
	    	</div>
	    	
        </div>

        <div class="col-md-12 ymo-service-details ymo-nopadding boxsubmain">
            <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('video-business.jpg','img')?>" alt="..." class="img-responsive ymo-video-ymobiz">
            
            <div class="col-md-12 ymo-text-box ymo-nopadding">
	            <div class="col-md-12 ymo-title-business ymo-nopadding">
	                <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('title-business.png','img')?>" alt="..." class="img-responsive">
	            </div>
	            <div class="col-md-12 ymo-service-background ymo-nopadding">
	                <p>
	                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam eget ligula eu lectus lobortis
	                    condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et
	                    netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et,
	                    sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing. Lorem ipsum dolor sit amet,
	                    consectetuer adipiscing elit. or massa. liquam nonummy auctor massa. liquam nonummy auctor massa.
	                    et netus et malesuada fames ac turpis egestas. Nulla at risus. Pellentesque habitant morbi tristique
	                    senectus et netus
	                </p>
	                <ul class="list-unstyled">
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','Manage accounts and invoicing') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','opperate your articles') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','use financial mechanisms') ?>
	                    </li>
	                    <li>
	                        <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('check.png','img')?>" alt="...">
	                        <?php echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','have access to realtime financial reports') ?>
	                    </li>
	                </ul>
	            </div>
			</div>
			
		</div>

    <div class="col-md-12 ymo-type-product ymo-nopadding boxsubmain">
        <!--<h2><?php /*echo Yii::$app->getModule('site')->ymoTranslate->t('site','app','YMOBIZ PRODUCTS') */?></h2>-->
        <div class="col-md-12 ymo-title-products ymo-Panel">
            <img src="<?php echo \Yii::$app->getModule('site')->ymoTools->imageSrc('title-products.png','img')?>" alt="..." class="img-responsive">
        </div>
        <ul class="list-inline">
            <li class="ymo-ymobank">
                <a href="#"></a>
            </li>
            <li class="ymo-ymoapp">
                <a href="#"></a>
            </li>
            <li class="ymo-ymocard">
                <a href="#"></a>
            </li>
            <li class="ymo-ymocash">
                <a href="#"></a>
            </li>
            <li class="ymo-ymocloud">
                <a href="#"></a>
            </li>
            <li class="ymo-ymotrack">
                <a href="#"></a>
            </li>
            <li class="ymo-ymoinsurance">
                <a href="#"></a>
            </li>
            <li class="ymo-ymohealth">
                <a href="#"></a>
            </li>
            <li class="ymo-ymolink">
                <a href="#"></a>
            </li>
            <li class="ymo-ymopay">
                <a href="#"></a>
            </li>
            <li class="ymo-ymopoint">
                <a href="#"></a>
            </li>
            <li class="ymo-ymophone">
                <a href="#"></a>
            </li>
            <li class="ymo-ymoproject">
                <a href="#"></a>
            </li>
            <li class="ymo-ymostore">
                <a href="#"></a>
            </li>
            <li class="ymo-ymodollar">
                <a href="#"></a>
            </li>
            <li class="ymo-ymotoken">
                <a href="#"></a>
            </li>
            <li class="ymo-ymofinance">
                <a href="#"></a>
            </li>
        </ul>
    </div>

    <div class="col-md-12 ymo-footline ymo-nopadding boxsubmain">
    	<a href="#top" class="btn ymo-btn-pink" data-action="register" data-size="md">pre-register now</a>
    </div>
    
</div>