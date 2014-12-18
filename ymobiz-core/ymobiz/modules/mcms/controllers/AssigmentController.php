<?php

namespace ymobiz\modules\mcms\controllers;

use ymobiz\modules\mcms\components\Controller;
use ymobiz\modules\mcms\models\Assigment;
use ymobiz\modules\mcms\models\AssigmentSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AssigmentController implements the CRUD actions for Assigment model.
 */
class AssigmentController extends Controller
{

	private $_userModel;
	private $_useridField;
	private $_usernameField;

	/**
	 *
	 * @var \yii\rbac\Manager
	 */
	private $_authManager;

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	public function init()
	{
		parent::init();
		$module = $this->module;
		$this->_userModel = $module->userModel;
		$this->_useridField = $module->useridField;
		$this->_usernameField = $module->usernameField;
		$this->_authManager = \Yii::$app->authManager;
	}

	/**
	 * Lists all Assigment models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new AssigmentSearch;

		$dataProvider = $searchModel->search($this->_userModel, $this->_usernameField, $_GET);
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'useridField' => $this->_useridField,
			'usernameField' => $this->_usernameField,
		]);
	}

	/**
	 * Displays a single Assigment model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);
		$values = [];
		if (isset($_POST['Submit'])) {
			$values = $_POST;
			
			$append = explode(',',ArrayHelper::getValue($values, 'append', []));
			
			if ($_POST['Submit'] == 'append') {
				foreach ($append as $itemName) {
					$role = $this->_authManager->createRole($itemName);
					$this->_authManager->assign($role, $id);
				}
				explode(',',ArrayHelper::remove($values, 'append'));
				\Yii::$app->session->setFlash('success', 'Record successfully saved');
			} else {
				foreach (ArrayHelper::getValue($values, 'delete', []) as $itemName) {
					$role = $this->_authManager->createRole($itemName);
					$this->_authManager->revoke($role, $id);
				}
				\Yii::$app->session->setFlash('success', 'Record successfully deleted');
				ArrayHelper::remove($values, 'delete');
			}
		}

		$assigments = array_keys($this->_authManager->getRolesByUser($id));

		return $this->render('view', [
			'model' => $model,
			'useridField' => $this->_useridField,
			'usernameField' => $this->_usernameField,
			'values' => $values,
			'assigments' => $assigments,
		]);
	}

	/**
	 * Finds the Assigment model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Assigment the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		$class = $this->_userModel;
		if (($model = $class::findIdentity($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

}
