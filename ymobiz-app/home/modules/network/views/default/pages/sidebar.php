<?php
use app\components\ymoTranslate;

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

?>


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
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','United States') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Portugal') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Spain') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Brazil') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','France') ?></option>
                </select>
            </div>
            <div class="ymo-nopadding ymo-Panel">
                <select class="form-control">
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','select city') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Washington, D.C.') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Lisbon') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Madrid') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Brazilia') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','Paris') ?></option>
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
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','6 months') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','1 years') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','2 years') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','3 years') ?></option>
                    <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','4 years') ?></option>
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
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','post views') ?></th>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','likes') ?></th>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','comments') ?></th>
                    <th><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','shares') ?></th>
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
            <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','last') ?> 3 <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','months') ?></option>
            <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','last') ?> 6 <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','months') ?></option>
            <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','last year') ?></option>
            <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','last') ?> 2 <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','years') ?></option>
            <option><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','last') ?> 3 <?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','years') ?></option>
        </select>
    </div>
    <!--ymo-statistics-->

    <ul class="col-md-12 ymo-list-right ymo-nopadding ymo-Panel">
        <li>
            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','campaign title') ?></h4>
            <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-right.jpg','img')?>" alt="...">
            <p>
            	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
	                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr.
            	') ?>
            </p>
        </li>
        <li>
            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','campaign title') ?></h4>
            <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-right.jpg','img')?>" alt="...">
            <p>
            	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
	                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr.
            	') ?>
            </p>
        </li>
        <li>
            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','campaign title') ?></h4>
            <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-right.jpg','img')?>" alt="...">
            <p>
            	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
	                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr.
            	') ?>
            </p>
        </li>
        <li>
            <h4><?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','campaign title') ?></h4>
            <img src="<?php echo \Yii::$app->getModule('network')->ymoTools->imageSrc('image-right.jpg','img')?>" alt="...">
            <p>
            	<?php echo Yii::$app->getModule('network')->ymoTranslate->t('network','app','
	                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
	                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostr.
            	') ?>
            </p>
        </li>
    </ul>

</div>
