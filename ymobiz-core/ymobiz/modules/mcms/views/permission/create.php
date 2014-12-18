<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Route';
$this->params['breadcrumbs'][] = ['label' => 'Operation', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Create Route</h1>

<div class="create">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'route') ?>
	
		<div class="form-group">
			<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
		</div>
	<?php ActiveForm::end(); ?>

</div><!-- create -->
