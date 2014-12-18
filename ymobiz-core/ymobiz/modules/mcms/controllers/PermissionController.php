<?php

namespace ymobiz\modules\mcms\controllers;

use ymobiz\modules\mcms\components\Controller;
use ymobiz\modules\mcms\components\AccessHelper;
use ymobiz\modules\mcms\models\Route;
use yii\rbac\Item;
use yii\helpers\ArrayHelper;

class PermissionController extends Controller
{
	/**
	 *
	 * @var \yii\rbac\Manager;
	 */
	private $_authManager;

	public function init()
	{
		parent::init();
		$this->_authManager = \Yii::$app->authManager;
	}

	public function actionIndex()
	{
		if (isset($_POST['selection'])) {
			$this->saveDel($_POST['selection']);
		}
		$routes = AccessHelper::getRoutes();

		$operation = array_keys(\Yii::$app->authManager->getPermissions());

		$new_operation = array_diff($routes, $operation);

		$exists = [];
		foreach ($operation as $route) {
			$exists[$route] = ['type' => Item::TYPE_PERMISSION, 'name' => $route, 'exists' => in_array($route, $routes)];
		}
		ArrayHelper::multisort($exists, 'exists');
		return $this->render('index', ['new' => count($new_operation), 'exists' => $exists]);
	}

	public function actionGenerate()
	{
		if (isset($_POST['Submit'])) {
			$this->saveNew($_POST['selection']);
		}
		$routes = AccessHelper::getRoutes();

		$operation = array_keys(\Yii::$app->authManager->getPermissions());

		$new_operation = array_diff($routes, $operation);
		if (isset($_POST['Submit']) && count($new_operation) == 0) {
			$this->redirect(['/manager-users/permission']);
		}

		$new = [];
		foreach ($new_operation as $route) {
			$new[$route] = ['type' => Item::TYPE_PERMISSION, 'name' => $route];
		}

		return $this->render('generate', ['new' => $new]);
	}

	public function actionCreate()
	{
		$model = new Route();

		if ($model->load($_POST)) {
			if ($model->validate()) {
				$routes = explode(',', $model->route);
				$this->saveNew($routes);

				\Yii::$app->session->setFlash('success', 'Record successfully saved');
				$this->redirect(['/manager-users/permission']);
			}
		}
		return $this->render('create', ['model' => $model]);
	}

	protected function saveNew($selections)
	{
		foreach ($selections as $route) {
			$role = $this->_authManager->createRole($route);
			$role->type = Item::TYPE_PERMISSION;
			$this->_authManager->add($role);
		}

		\Yii::$app->session->setFlash('success', 'Record successfully add');
	}

	protected function saveDel($selections)
	{
		foreach ($selections as $route) {
			$role = $this->_authManager->createRole($route);
			$role->type = Item::TYPE_PERMISSION;
			$this->_authManager->remove($role);
		}

		\Yii::$app->session->setFlash('success', 'Record successfully deleted');
		return $this->redirect(['/manager-users/permission']);
	}
}
