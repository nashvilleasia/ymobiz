<div class="ymo-popup">

    <div class="modal-body">

        <!-- Modal -->
        <div class="ymo-popup ymo-popup-task">
            <div class="col-md-12 popup-header ymo-nopadding">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="col-md-3 ymo-nopadding modal-title" id="myModalLabel">add new task</h4>
                <ul class="col-md-8 ymo-list-task list-inline ymo-nopadding">
                    <li>
                        <input type="checkbox" name="checkbox001" id="checkbox001" checked="checked">
                        <label for="checkbox001">
                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/meeting.png" alt="...">
                            supplier</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkbox002" id="checkbox002">
                        <label for="checkbox002">
                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/call.png" alt="...">
                            client</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkbox003" id="checkbox003">
                        <label for="checkbox003">
                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/event.png" alt="...">
                            event</label>
                    </li>
                </ul>
            </div>
            <div class="modal-body popup-body">
                <div class="row">
                    <div class="col-md-12 ymo-form-task ymo-nopadding">

                        <!--form-->
                        <form role="form">
                            <div class="col-md-5 ymo-nopadding">
                                <div class="col-md-12 ymo-search ymo-popup-group ymo-nopadding">
                                    <input type="text" name="search" class="form-control" placeholder="search company">
                                    <input type="submit" name="magnifier" value="">
                                </div>
                                <div class="form-group col-md-12 ymo-popup-group ymo-Panel">
                                    <input type="text" class="popup-input form-control" id="" placeholder="subject">
                                </div>
                                <div class="form-group col-md-12  ymo-popup-group ymo-Panel">
                                    <div class="col-md-4 ymo-day ymo-nopadding">
                                        <select class="form-control">
                                            <option>day</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 ymo-month ymo-nopadding">
                                        <select class="form-control">
                                            <option>month</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 ymo-year ymo-nopadding">
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
                                <div class="col-md-12 ymo-time ymo-nopadding">
                                    <p>from-to:</p>

                                    <select class="form-control">
                                        <option>9 AM</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                    <select class="form-control">
                                        <option>1 PM</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 ymo-remind ymo-nopadding">
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
                                <select class="form-control">
                                    <option>one hour before</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                                <button class="col-md-2 btn ymo-btn-gradient">save task</button>
                            </div>
                        </form>
                        <!--form-->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>