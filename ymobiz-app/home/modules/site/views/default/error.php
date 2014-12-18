<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

$this->title = $name;
?>
<a href="#content" class="sr-only">Skip to main content</a>
<div class="container-fluid ymo-bg">
	<div class="container ymo-container">
		<?php echo \Yii::$app->view->render('header') ?>
		<div class="row">
			<div class="col-md-12 ymo-body ymo-Panel">
				<div class="site-error">

					<h1><?= Html::encode($this->title) ?></h1>

					<div class="alert alert-danger">
						<?= nl2br(Html::encode($message)) ?>
					</div>

					<p>
						The above error occurred while the Web server was processing your request.
					</p>
					<p>
						Please contact us if you think this is a server error. Thank you.
					</p>

				</div>
			</div>
		</div>
		<?php echo \Yii::$app->view->render('footer') ?>
	</div>
</div>
