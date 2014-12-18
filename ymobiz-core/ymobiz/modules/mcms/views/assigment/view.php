<?php

use yii\helpers\ArrayHelper;

$this->title = ArrayHelper::getValue($model, $usernameField);
$this->params['breadcrumbs'][] = ['label' => 'Assigments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigment-view">

	<?php echo $this->render('_children',[
		'assigments'=>$assigments,
		'append'=>  ArrayHelper::getValue($values, 'append',[]),
		'delete'=>  ArrayHelper::getValue($values, 'delete',[]),
		'title' => $this->title
	]); ?>
</div>
