<?php

use yii\helpers\Html;

$module = Yii::$app->getModule('manager-users');

$menus = [
	['label' => ' Admin', 'url' => ['/' . $module->id . '/default/index']],
	['label' => ' User', 'url' => ['/' . $module->id . '/user']],
	['label' => ' Role', 'url' => ['/' . $module->id . '/role']],
	['label' => ' Assigment', 'url' => ['/' . $module->id . '/assigment']],
	['label' => ' Permission', 'url' => ['/' . $module->id . '/permission']],
];

?>
<div class="row">
	<div class="col-lg-3">
		<div class="list-group">
			<?php
			foreach ($menus as $menu) {
				$label = '<i class="glyphicon glyphicon-chevron-right"></i>' . Html::encode($menu['label']);
				echo Html::a($label, $menu['url'], [
					'class' => strpos(Yii::$app->controller->route, trim($menu['url'][0], '/')) === 0 ? 'list-group-item active' : 'list-group-item',
				]);
			}
			?>
		</div>
	</div>
	<div class="col-lg-9">
		<?
			echo $this->render('/'.Yii::$app->controller->id.'/'.$view, $params);
		?>
	</div>
</div>