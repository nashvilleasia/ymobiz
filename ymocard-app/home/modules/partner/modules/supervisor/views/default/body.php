
<div class="container ymo-container">
    <div class="row">
        <div class="col-md-12 ymo-body ymo-Panel">
            <?php echo $this->render('pages/card-table') ?>

            <!-- Start ymo-column-right-->
            <div class="col-md-6 ymo-column-right ymo-nopadding ymo-Panel">
                <div class="col-md-11 col-md-offset-1 ymo-nopadding ymo-Panel">

                	<div id="response-card-details">
                    	<?php echo $this->render('pages/card-details') ?> 
                	</div>
                	
                	<div id="response-card-message">
                    	<?php echo $this->render('pages/card-message') ?> 
                    </div>
                    
                    <div id="response-card-activity">
                    	<?php echo $this->render('pages/card-activity') ?>
                    </div>

                </div>
            </div>
            <!-- End ymo-column-right-->

        </div>
    </div>
</div>