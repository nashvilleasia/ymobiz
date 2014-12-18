<!-- Modal -->
<div class="modal show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="col-md-12 modal-header">

                <div class="col-md-12 popup-headertwo ymo-nopadding">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="col-md-3 ymo-nopadding modal-title" id="myModalLabel" style="outline: 1px solid #f00;">add new task</h4>
                    <ul class="col-md-8 ymo-list-task list-inline ymo-nopadding" style="outline: 1px solid #ff0;">
                        <li>
                            <input type="checkbox" name="checkbox0001" id="checkbox0001" checked="checked">
                            <label for="checkbox0001">
                                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/meeting.png" alt="...">
                                supplier</label>
                        </li>
                        <li>
                            <input type="checkbox" name="checkbox0002" id="checkbox0002">
                            <label for="checkbox0002">
                                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/call.png" alt="...">
                                client</label>
                        </li>
                        <li>
                            <input type="checkbox" name="checkbox0003" id="checkbox0003">
                            <label for="checkbox0003">
                                <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/event.png" alt="...">
                                event</label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="modal-body">
                <div class="col-md-12 ymo-popup-note ymo-nopadding">

                    <!--form-->
                    <form role="form">
                        <div class="col-md-5 ymo-nopadding">
                            <div class="col-md-12 ymo-search ymo-nopadding">
                                <input type="text" name="search" class="form-control input-sm" placeholder="search company">
                                <input type="submit" name="magnifier" value="">
                            </div>
                            <div class="form-group col-md-12 ymo-popup-group ymo-Panel">
                                <input type="text" class="popup-input form-control" id="" placeholder="subject">
                            </div>
                            <div class="form-group col-md-12  ymo-popup-group ymo-Panel">
                                <div class="col-md-4 ymo-date ymo-nopadding">
                                    <select class="form-control">
                                        <option>day</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-md-4 ymo-date ymo-nopadding">
                                    <select class="form-control">
                                        <option>month</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-md-4 ymo-date ymo-nopadding">
                                    <select class="form-control">
                                        <option>year</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 popup-padding ymo-Panel">
                            <div class="col-md-12 ymo-popup-group ymo-nopadding">
                                <select class="form-control">
                                    <option>staff member</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12  ymo-popup-group ymo-Panel">
                                <input type="text" class="popup-input form-control" id="" placeholder="address">
                            </div>
                            <div class="col-md-12 ymo-popup-group ymo-time ymo-nopadding">
                                <p class="col-md-3 ymo-nopadding">from-to</p>

                                <!--ymo-hours-->
                                <div class="col-md-4 ymo-hours ymo-nopadding">
                                    <select class="form-control">
                                        <option>9 AM</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-md-4 ymo-nopadding">
                                    <select class="form-control">
                                        <option>1 PM</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-10 ymo-popup-group ymo-remind ymo-Panel">
                            <p>remind me:</p>
                            <ul class="col-md-6 list-inline ymo-nopadding">
                                <li>
                                    <div class="ymo-checkbox ymo-nopadding">
                                        <input type="checkbox" name="checkbox01" id="checkbox01" checked="checked">
                                        <label for="checkbox01">on ymobiz</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ymo-checkbox">
                                        <input type="checkbox" name="checkbox02" id="checkbox02" checked="checked">
                                        <label for="checkbox02">via email</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="ymo-checkbox">
                                        <input type="checkbox" name="checkbox03" id="checkbox03" checked="checked">
                                        <label for="checkbox03">via sms</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="col-md-4 ymo-nopadding">
                                <select class="form-control">
                                    <option>one hour before</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12 ymo-remind ymo-nopadding">
                            <button class="col-md-12 col-sm-12 col-xs-12 btn ymo-btn-gradient">save task</button>
                        </div>
                    </form>
                    <!--form-->

                </div>
            </div>
        </div>
    </div>
</div>