<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-partner-order ymo-Panel">

            <?php echo $this->render('card-table') ?>

            <!-- Start ymo-column-right-->
            <div class="col-md-6 ymo-column-right ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-nopadding ymo-Panel">

                    <!--form-->
                    <?php echo $this->render($orderPage,[
						'orderModel' => $orderModel,
					]) ?>
                    <!--form-->

                </div>
            </div>
            <!-- End ymo-column-right-->

        </div>
    </div>
</div>