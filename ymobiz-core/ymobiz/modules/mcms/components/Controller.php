<?php
namespace ymobiz\modules\mcms\components;
/**
 * @inheritdoc
 */
class Controller extends \yii\web\Controller
{
	public function render($view, $params = [])
	{
		return parent::render('/layouts/manager', ['view' => $view,'params' => $params]);
	}
}