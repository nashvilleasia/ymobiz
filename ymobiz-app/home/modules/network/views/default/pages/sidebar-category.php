<?php

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
    <!--ymo-list-category-->

</div>
