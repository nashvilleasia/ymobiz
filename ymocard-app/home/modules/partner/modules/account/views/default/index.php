<div id="wrap">
	<?php echo $this->render('top') ?>
	<div class="container-fluid">
		<?php echo (@$page==FALSE) ? $this->render('body') : $page; ?>
	</div>
</div>
<div id="footer">
	<div class="container">
		<?php echo $this->render('@site/views/default/footer') ?>
	</div>
</div>