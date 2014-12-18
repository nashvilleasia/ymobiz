<?php
use app\components\ymoTranslate;

?>


<div class="col-md-4 ymo-left-marketing ymo-nopadding">
    <div class="col-md-12 ymo-nopadding">

        <!--ymo-left-list-->
        <ul class="col-md-12 ymo-left-list ymo-nopadding ymo-Panel">
            <li>
                <a class="ymo-icon-contacts active" href="#">
                    <?php echo ymoTranslate::t('yii','app','contacts') ?>
                </a>
            </li>
            <li>
                <a class="ymo-icon-leads" href="#">
                    <?php echo ymoTranslate::t('yii','app','leads') ?>
                </a>
            </li>
            <a class="ymo-link-add" href="#">
                <?php echo ymoTranslate::t('yii','app',' add new') ?>
            </a>
        </ul>
        <!--ymo-left-list-->

            <div class="col-md-12 ymo-general-teste ymo-nopadding">
                <div class="col-md-12 ymo-teste ymo-nopadding">
                    <table class="ymo-table-teste table table-responsive">
                        <tbody>
                        <tr>
                            <td colspan="2">01:00 - 02:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">02:00 - 03:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">03:00 - 04:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">05:00 - 06:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">07:00 - 08:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">08:00 - 09:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">09:00 - 10:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">10:00 - 11:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">12:00 - 13:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">15:00 - 16:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">18:00 - 19:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">19:00 - 20:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">20:00 - 21:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">22:00 - 23:00</td>
                        </tr>
                        <tr>
                            <td colspan="2">23:00 - 00:00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        <div class="col-md-12 ymo-table-footer ymo-nopadding">

            <!--ymo-filter-->
            <a class="col-md-5 ymo-icon-filter ymo-nopadding">
                <?php echo ymoTranslate::t('yii','app','filter') ?>
            </a>
            <!--ymo-filter-->

            <!--ymo-search-->
			<div class="col-md-6 ymo-search ymo-nopadding">
				<input type="text" name="search" class="form-control input-sm" placeholder="search">
				<input type="submit" name="magnifier" value="">
			</div>
            <!--ymo-search-->

        </div>

    </div>
</div>