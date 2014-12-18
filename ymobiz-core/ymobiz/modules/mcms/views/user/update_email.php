<?php

use yii\helpers\Html;

$this->title = 'Update Email: ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form_email', [
		'model' => $model,
	]); ?>

</div>
