<?php

namespace ymocardapp\common\components;

use Yii;
use yii\base\Component;

class ymoCardMenu extends Component
{
	public function renderMenu()
	{
		return Yii::$app->controller->renderPartial('@site/views/default/menu',[
			'accessMenu' => Yii::$app->controller->renderPartial('@' . Yii::$app->controller->module->id . '/views/default/access-menu')
		]);
	}	
}