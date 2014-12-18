<?php

use yii\helpers\Html;

$module = Yii::$app->getModule('common');

$menus = [
	['label' => ' Common', 'url' => ['/' . $module->id . '/default/index']],
	['label' => ' Contents', 'url' => ['/' . $module->id . '/contents']],
	['label' => ' Languages', 'url' => ['/' . $module->id . '/languages']],
	['label' => ' System Messages', 'url' => ['/' . $module->id . '/system-messages']],
	['label' => ' Cards', 'url' => ['/' . $module->id . '/cards']],
	['label' => ' Payments Methods', 'url' => ['/' . $module->id . '/payment-methods']],
	['label' => ' Payments Types', 'url' => ['/' . $module->id . '/payment-types']],
	['label' => ' Orders', 'url' => ['/' . $module->id . '/orders']],
	['label' => ' Activity', 'url' => ['/' . $module->id . '/activity']],
	['label' => ' Messages', 'url' => ['/' . $module->id . '/messages']],
	['label' => ' Business Areas', 'url' => ['/' . $module->id . '/business-areas']],
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