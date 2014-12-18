<div class="ymo-popup">

    <div class="modal-body">


        <!-- Modal -->
        <div class="ymo-popup ymo-popup-transaction">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <p class="ymo-required">* required fields</p>
            <div class="col-md-12 popup-header ymo-nopadding">
                <h4 class="col-md-5 ymo-nopadding modal-title" id="myModalLabel">add new transaction</h4>
                <ul class="col-md-7 ymo-list-task list-inline ymo-nopadding">
                    <li>
                        <input type="checkbox" name="checkbox001" id="checkbox001" checked="checked">
                        <label for="checkbox001">
                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/purchases_on.png" alt="...">
                            purchase
                        </label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkbox002" id="checkbox002">
                        <label for="checkbox002">
                            <img src="<?php echo \Yii::$app->view->theme->baseUrl ?>/img/icons/sales_on.png" alt="...">
                            sale
                        </label>
                    </li>
                </ul>
            </div>
            <div class="modal-body popup-body">
                <div class="row" style="margin: 0 0px;">
                    <div class="col-md-12 ymo-nopadding">

                        <!--form-->
                        <form role="form">

                            <div class="col-md-4 ymo-popup-left ymo-nopadding">

                                <div class="col-md-12 ymo-popup-group">
                                    <label for="">company</label>
                                    <input type="text" class="popup-input form-control" id="" placeholder="company name*">
                                </div>
                                <div class="col-md-12 ymo-popup-group">
                                    <input type="text" class="popup-input form-control" id="" placeholder="address">
                                </div>
                                <div class="col-md-6 ymo-popup-group ymo-popup-city">
                                    <input type="text" class="popup-input form-control" id="" placeholder="city">
                                </div>
                                <div class="col-md-6 ymo-popup-group ymo-popup-zip">
                                    <input type="text" class="popup-input form-control" id="" placeholder="zip code *">
                                </div>

                            </div>

                            <div class="col-md-4 ymo-popup-center ymo-nopadding">

                                <div class="col-md-12 ymo-popup-group">
                                    <input type="text" class="popup-input form-control" id="" placeholder="phone number*">
                                </div>
                                <div class="col-md-12 ymo-popup-group">
                                    <input type="text" class="popup-input form-control" id="" placeholder="email*">
                                </div>

                                <div class="col-md-12 ymo-popup-group">
                                    <select class="form-control">
                                        <option>select country</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 ymo-popup-right ymo-nopadding">

                                <div class="col-md-12  ymo-popup-group">
                                    <label class="col-md-12 ymo-nopadding" for="">date</label>
                                    <div class="col-md-4 ymo-popup-date ymo-nopadding">
                                        <select class="form-control">
                                            <option>day</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 ymo-popup-date ymo-nopadding">
                                        <select class="form-control">
                                            <option>month</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 ymo-popup-date ymo-nopadding">
                                        <select class="form-control">
                                            <option>year</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 ymo-search ymo-nopadding">
                                    <label for="">reference</label>
                                    <input type="text" name="search" class="form-control" placeholder="reference">
                                    <input type="submit" name="magnifier" value="">
                                </div>

                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 ymo-nopadding">
                                <button class="col-md-2 col-sm-12 pull-right btn ymo-btn-gradient">search on network</button>
                            </div>

                            <hr/>

                            <div class="col-md-12 ymo-popup-item ymo-nopadding">

                                <div class="col-md-4 ymo-popup-group">
                                    <input type="text" class="popup-input form-control" id="" placeholder="item description">
                                </div>
                                <div class="col-md-2 ymo-popup-group">
                                    <input type="text" class="popup-input form-control" id="" placeholder="unit cost">
                                </div>

                                <div class="col-md-2 ymo-popup-group">
                                    <select class="form-control">
                                        <option>quantity</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>

                                <button class="col-md-4 col-sm-12 pull-right btn ymo-btn-gradient">add item</button>

                                <div class="col-md-12 ymo-nopadding">
                                    <table class="table ymo-list-invoice table-responsive">
                                        <thead>
                                            <tr>
                                                <th>item</th>
                                                <th>description</th>
                                                <th>unit cost</th>
                                                <th>quantity</th>
                                                <th>cost (USD)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>one year premium license</td>
                                                <td>25.00$</td>
                                                <td class="table-qty">
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </td>
                                                <td>25.00$</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>one year premium license</td>
                                                <td>25.00$</td>
                                                <td class="table-qty">
                                                    <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </td>
                                                <td>25.00$</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    sub total:
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">25.00$</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    tax (23%):
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">5.75$</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    total amount (USD):
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right ymo-value">30.75$</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 ymo-nopadding">
                                <button class="col-md-3 col-sm-12 pull-right btn ymo-btn-gradient">add transaction</button>
                            </div>

                        </form>
                        <!--form-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>