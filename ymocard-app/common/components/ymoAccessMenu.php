<?php

namespace ymocardapp\common\components;

use Yii;
use yii\base\Component;
use ymobiz\auth\ymoUser;
use ymobiz\components\UserCheckPermission;

class ymoAccessMenu extends Component
{
	public function render()
	{	
		$fileMenu = UserCheckPermission::getRedirect();
		return Yii::$app->controller->renderPartial('@' . $fileMenu['fileMenu'] . '/views/default/access-menu');
	}		
}