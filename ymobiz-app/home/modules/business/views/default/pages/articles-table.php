<div class="col-xs-8 ymo-aside-right ymo-nopadding">
		
	<div class="col-xs-12 ymo-menu-right ymo-nopadding">
		<?php echo $this->render('operation-menu') ?>
	</div>
	
	<div class="col-xs-12 ymo-aside-general ymo-scroll ymo-nopadding">
		<div class="col-xs-12 ymo-aside ymo-nopadding">
			
			<table class="table ymo-table-bloc table-responsive">
	            <thead>
    	            <tr>
                    	<th class="ymo-operation-image"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','image') ?></th>
                    	<th class="ymo-operation-name"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','name, description') ?></th>
                    	<th class="ymo-operation-status"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','estore status') ?></th>
                    	<th class="ymo-operation-qty"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','min. qty') ?></th>
                     	<th class="ymo-operation-price"><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','unit price') ?></th>
                	</tr>
           		</thead>
             	<tbody>
                	<tr>
                    	<td class="ymo-operation-image">
                        	<img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles.jpg','img')?>" alt="...">
                    	</td>
                    	<td class="ymo-operation-name">
                        	<h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                         	<p>
	                        	<?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                            </p>
                    	</td>
                        <td class="ymo-operation-status">
                        	<a href="#" class="ymo-status-play">
                            	<img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                        	</a>
                        	<a href="#" class="ymo-status-pause">
                            	<img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                            </a>
                      	</td>
                     	<td class="ymo-operation-qty">1</td>
                     	<td class="ymo-operation-price">224$</td>
                	</tr>
                        <tr>
                            <td class="ymo-operation-image">
                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles2.jpg','img')?>" alt="...">
                            </td>
                            <td class="ymo-operation-name">
                                <h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                                <p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                                </p>
                            </td>
                            <td class="ymo-operation-status">
                                <a href="#" class="ymo-status-play">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                                </a>
                                <a href="#" class="ymo-status-pause">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                                </a>
                            </td>
                            <td class="ymo-operation-qty">1</td>
                            <td class="ymo-operation-price">224$</td>
                        </tr>
                        <tr>
                            <td class="ymo-operation-image">
                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles3.jpg','img')?>" alt="...">
                            </td>
                            <td class="ymo-operation-name">
                                <h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                                <p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                                </p>
                            </td>
                            <td class="ymo-operation-status">
                                <a href="#" class="ymo-status-play">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                                </a>
                                <a href="#" class="ymo-status-pause">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                                </a>
                            </td>
                            <td class="ymo-operation-qty">1</td>
                            <td class="ymo-operation-price">224$</td>
                        </tr>
                        <tr>
                            <td class="ymo-operation-image">
                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles4.jpg','img')?>" alt="...">
                            </td>
                            <td class="ymo-operation-name">
                                <h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                                <p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                                </p>
                            </td>
                            <td class="ymo-operation-status">
                                <a href="#" class="ymo-status-play">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                                </a>
                                <a href="#" class="ymo-status-pause">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                                </a>
                            </td>
                            <td class="ymo-operation-qty">1</td>
                            <td class="ymo-operation-price">224$</td>
                        </tr>
                        <tr>
                            <td class="ymo-operation-image">
                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles5.jpg','img')?>" alt="...">
                            </td>
                            <td class="ymo-operation-name">
                                <h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                                <p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                                </p>
                            </td>
                            <td class="ymo-operation-status">
                                <a href="#" class="ymo-status-play">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                                </a>
                                <a href="#" class="ymo-status-pause">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                                </a>
                            </td>
                            <td class="ymo-operation-qty">1</td>
                            <td class="ymo-operation-price">224$</td>
                        </tr>
                        <tr>
                            <td class="ymo-operation-image">
                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles6.jpg','img')?>" alt="...">
                            </td>
                            <td class="ymo-operation-name">
                                <h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                                <p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                                </p>
                            </td>
                            <td class="ymo-operation-status">
                                <a href="#" class="ymo-status-play">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                                </a>
                                <a href="#" class="ymo-status-pause">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                                </a>
                            </td>
                            <td class="ymo-operation-qty">1</td>
                            <td class="ymo-operation-price">224$</td>
                        </tr>
                        <tr>
                            <td class="ymo-operation-image">
                                <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('image-articles7.jpg','img')?>" alt="...">
                            </td>
                            <td class="ymo-operation-name">
                                <h5><?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','lorem ipsum') ?></h5>
                                <p>
	                                <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','
                                	Quam nunc putamus parum, claram antepos posuerit litterarum formas humanitatis per...
                                ') ?>
                                </p>
                            </td>
                            <td class="ymo-operation-status">
                                <a href="#" class="ymo-status-play">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('play.png','img/icons')?>" alt="...">
                                </a>
                                <a href="#" class="ymo-status-pause">
                                    <img src="<?php echo \Yii::$app->getModule('business')->ymoTools->imageSrc('pause.png','img/icons')?>" alt="...">
                                </a>
                            </td>
                            <td class="ymo-operation-qty">1</td>
                            <td class="ymo-operation-price">224$</td>
                        </tr>
                    </tbody>
                </table>
				
			</div>
		</div>
		
	<div class="col-xs-12 ymo-footer-right ymo-nopadding">
		<div class="col-xs-12 ymo-menu-right ymo-nopadding">
			<ul class="list-inline">
                <li class="active">
                    <a class="ymo-icon-plus active">
                        <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','add new') ?>
                    </a>
                </li>
                <li>
                    <a class="ymo-icon-delete">
                        <?php echo Yii::$app->getModule('business')->ymoTranslate->t('business','app','delete') ?>
                    </a>
                </li>
            </ul>
		</div>
	</div>
			
</div>