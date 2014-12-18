<?php

namespace ymobiz\modules\mcms\controllers;

use Yii;
use ymobiz\modules\mcms\components\Controller;
use ymobiz\modules\mcms\models\Role;
use ymobiz\modules\mcms\models\RoleSearch;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rbac\Item;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use ymobiz\modules\mcms\models\AuthItem;
use ymobiz\modules\mcms\models\ymoAuthItem;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
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

	/**
	 * Lists all Role models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$values = [];

		$searchModel = new RoleSearch(['type' => Item::TYPE_ROLE]);
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'delete' => ArrayHelper::getValue($values, 'deleteAll',[])
		]);
	}

	/**
	 * Displays a single Role model.
	 * @param string $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		
		$model = $this->findModel($id);
		$states = $_POST;
		
		if (Yii::$app->request->post()) {
			
			$action = @$_POST['Submit'];
			
			if ($action == 'append') {

				$values = explode(',',ArrayHelper::remove($states, $action, []));
				foreach ($values as $child) {
					try {
						$model->addChild($child);
						\Yii::$app->session->setFlash('success', 'Record successfully saved');
					} catch (\yii\base\Exception $exc) {
						//echo $exc->getTraceAsString();
					}
				}
			} else if(Yii::$app->request->post('deleteAll')){
				
				foreach (Yii::$app->request->post('deleteAll') as $child) {
					$model->removeChild($child);
				}
				
				\Yii::$app->session->setFlash('success', 'Record successfully deleted');
			}

			$this->refresh();
		}
		return $this->render('view', [
			'model' => $model,
			'states' => $states,
		]);
	}

	/**
	 * Creates a new Role model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Role(null);
		
		if(Yii::$app->request->isAjax){
		
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				
			if ($model->load(Yii::$app->request->post())) {
					
				if($model->save() && $model->validate())
				{
		
					return [
						'name' => 'success',
						'message' => 'Successfull.',
						'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
							'header' => Yii::t('app','Well done!'),
							'body' => 'Record successfully created',
							'footer' => Yii::t('app','ok'),
						]),
						'status' => 200,
					];
		
				}else{
					$form = new ActiveForm();
		
					return [
						'name' => 'success',
						'message' => 'Successfull.',
						'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
							'header' => Yii::t('app','Well done!'),
							'body' => Html::errorSummary($model,['class'=>'error-summary']),
							'footer' => Yii::t('app','ok'),
						]),
						'status' => 500,
					];
				}
			}
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Role model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param string $id
	 * @return mixed
	 */
	public function actionUpdate($id=false)
	{
		
		$model = $this->findModel($id);
		
		if(Yii::$app->request->isAjax){

			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->load(Yii::$app->request->post())) {
			
				if($model->update() && $model->validate())
				{
		
					return [
	                    'name' => 'success',
						'message' => 'Successfull.',
						'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
							'header' => Yii::t('app','Well done!'),
							'body' => 'Record successfully updated',
							'footer' => Yii::t('app','ok'),
						]),
						'status' => 200,
	                ];

				}else{
					$form = new ActiveForm();

					return [
						'name' => 'success',
						'message' => 'Successfull.',
						'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
							'header' => Yii::t('app','Well done!'),
							'body' => Html::errorSummary($model,['class'=>'error-summary']),
							'footer' => Yii::t('app','ok'),
						]),
						'status' => 500,
					];
				}
			}
		}
		
		return $this->render('update', [
			'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Role model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param string $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{ 
		$model = $this->findModel($id);

		if($model==true)
		{
			$model->removeRole($id);
			Yii::$app->session->setFlash('success', 'Record successfully deleted');
		} else {
			Yii::$app->session->setFlash('error', 'There was an error delete record.');
		}
		return $this->redirect(['/manager-users/role']);
	}

	/**
	 * Finds the Role model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param string $id
	 * @return Role the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Role::find($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

}
