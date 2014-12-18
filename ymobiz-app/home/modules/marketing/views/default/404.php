<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

?>
<div class="site-error">

	<h1><?= Html::encode("Error 404") ?></h1>

	<div class="alert alert-danger">
		<?= nl2br(Html::encode("Page not found!")) ?>
	</div>

	<p>
		The above error occurred while the Web server was processing your request.
	</p>
	<p>
		Please contact us if you think this is a server error. Thank you.
	</p>

</div>
