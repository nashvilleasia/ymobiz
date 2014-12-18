<div class="col-md-12 ymo-body ymo-Panel">

	<div class="col-md-7 ymo-nopadding ymo-Panel">

		<?php echo $this->render('order-text') ?>

		<div class="col-md-10 col-md-offset-1 ymo-nopadding ymo-Panel">
		
			<!--ymo-card-form-->
			<div class="col-md-12 ymo-card-form ymo-nopadding ymo-Panel">
				<?php echo $this->render($orderPage,[
					'orderModel' => $orderModel,
				]) ?>
			</div>
			<!--ymo-card-form-->
			
		</div>
	
	</div>

	<?php echo $this->render('info-card') ?>
	
</div>