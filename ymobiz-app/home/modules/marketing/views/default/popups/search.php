<?php
use app\components\ymoTranslate;

$this->registerJs("

jQuery('.ymo-search div a').on('click',function(e){
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

<div class="modal show">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ymo-popup">
            <div class="modal-header popup-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">search results</h4>
            </div>
            <div class="modal-body popup-body">
                <div class="row ymo-Panel">
                    <div class="col-md-11 popup-search  ymo-nopadding ymo-Panel">
                        <div class="col-md-7 popup-left ymo-nopadding ymo-Panel">
                            <ul class="popup-list-search">
                                <li>
                                    <a href="#">
                                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/image-popup.jpg" alt="...">
                                        <h3>company of companies</h3>
                                        <span>2368</span>
                                        <hr/>
                                        <p>
                                            Quam nunc putamus parum, claram anteposuerit litterarum formas
                                            humanitatis per seacula quarta decima et quinta decima. Autem
                                            vel eum iriure dolor in hendrerit in vulputate!
                                        </p>
                                        <hr/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/image-popup.jpg" alt="...">
                                        <h3>company of companies</h3>
                                        <span>2368</span>
                                        <hr/>
                                        <p>
                                            Quam nunc putamus parum, claram anteposuerit litterarum formas
                                            humanitatis per seacula quarta decima et quinta decima. Autem
                                            vel eum iriure dolor in hendrerit in vulputate!
                                        </p>
                                        <hr/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/image-popup.jpg" alt="...">
                                        <h3>company of companies</h3>
                                        <span>2368</span>
                                        <hr/>
                                        <p>
                                            Quam nunc putamus parum, claram anteposuerit litterarum formas
                                            humanitatis per seacula quarta decima et quinta decima. Autem
                                            vel eum iriure dolor in hendrerit in vulputate!
                                        </p>
                                        <hr/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/image-popup.jpg" alt="...">
                                        <h3>company of companies</h3>
                                        <span>2368</span>
                                        <hr/>
                                        <p>
                                            Quam nunc putamus parum, claram anteposuerit litterarum formas
                                            humanitatis per seacula quarta decima et quinta decima. Autem
                                            vel eum iriure dolor in hendrerit in vulputate!
                                        </p>
                                        <hr/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/image-popup.jpg" alt="...">
                                        <h3>company of companies</h3>
                                        <span>2368</span>
                                        <hr/>
                                        <p>
                                            Quam nunc putamus parum, claram anteposuerit litterarum formas
                                            humanitatis per seacula quarta decima et quinta decima. Autem
                                            vel eum iriure dolor in hendrerit in vulputate!
                                        </p>
                                        <hr/>
                                    </a>
                                </li>
                            </ul>
                            <hr/>
                            <div class="popup-view-more">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    view more search results <span class="caret"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5 ymo-nopadding ymo-Panel">
                            <div class="col-md-11 col-md-offset-1 ymo-nopadding">
                                <!--ymo-search-->
                                <div class="col-md-11 col-md-offset-1 ymo-search ymo-nopadding ymo-Panel">
                                    <div class="col-md-6 ymo-search-options ymo-nopadding ymo-Panel">
                                        <a href="#">advanced search options</a>
                                    </div>
                                    <div class="col-md-6 ymo-nopadding ymo-Panel">
                                        <input type="text" name="search" class="form-control" placeholder="search" />
                                        <input type="image" name="submit" src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/magnifier.png"/>
                                    </div>
                                </div>
                                <!--ymo-search-->

                                <!--ymo-adv-search-->
                                <div class="col-md-11 col-md-offset-1 ymo-adv-search ymo-nopadding ymo-Panel" style="display: block">
                                    <form action="">
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select country</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select city</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select activity sector</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select business volume</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select years of activity</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select products</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                        <div class="ymo-nopadding ymo-Panel">
                                            <select class="form-control">
                                                <option>select services</option>
                                                <option>portugal</option>
                                                <option>spain</option>
                                                <option>brazil</option>
                                                <option>france</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <!--ymo-adv-search-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->