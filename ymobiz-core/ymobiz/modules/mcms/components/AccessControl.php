<?php

namespace ymobiz\modules\mcms\components;

use Yii;
use yii\web\Application;
use yii\web\NotFoundHttpException;
use ymobiz\modules\mcms\rbac\AdminRule;

class AccessControl extends \yii\base\Behavior
{
	public $allowActions = [];
	public function events()
	{
		return[
			Application::EVENT_BEFORE_ACTION => 'beforeAction'
		];
	}

	/**
	 *
	 * @param \yii\base\ActionEvent $event
	 */
	public function beforeAction($event)
	{
		$action = $event->action;
		if(in_array($action->uniqueId, $this->allowActions)){
			return true;
		}
		if ($action->controller->hasMethod('allowAction') && in_array($action->id, $action->controller->allowAction())) {
			return true;
		}
		$user = Yii::$app->user;
		$route = $action->uniqueId;
		if ($user->can($route)) {
			return;
		}

		if ($user->can($action->controller->uniqueId . '/*',[AdminRule::RULE_PARAMS => $user->id])) {
			return;
		};

		$module = $action->controller->module;
		while ($module !== null) {
			$id = $module->uniqueId;
			if ($user->can($id === '' ? '*' : $id . '/*',[AdminRule::RULE_PARAMS => $user->id])) {
				return;
			}
			$module = $module->module;
		}

		$this->denyAccess($user);

	}

	/**
	 * Denies the access of the user.
	 * The default implementation will redirect the user to the login page if he is a guest;
	 * if the user is already logged, a 403 HTTP exception will be thrown.
	 * @param yii\web\User $user the current user
	 * @throws yii\web\AccessDeniedHttpException if the user is already logged in.
	 */
	protected function denyAccess($user)
	{
		if (!$user->getIsGuest()) {
			throw new NotFoundHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
		}
	}

}
