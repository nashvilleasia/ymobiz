<?php
namespace ymobiz\modules\mcms\controllers;

use Yii;
use ymobiz\modules\mcms\models\Role;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use ymobiz\modules\mcms\components\Controller;
use ymobiz\auth\User;
use ymobiz\modules\mcms\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use ymobiz\auth\ymoUser;
use common\models\forms\ymoMemberForm;
use common\models\ymoClients;
use ymobiz\components\ymoCluster;

/**
 * User controller
 */
class UserController extends Controller
{

	/**
	 *
	 * @var \yii\rbac\Manager;
	 */
	private $_authManager;

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST','GET'],
				],
			],
		];
	}

	public function init()
	{
		parent::init();
		$this->_authManager = \Yii::$app->authManager;
	}

	public function actionIndex()
	{
		
		$values = [];

		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'delete' => ArrayHelper::getValue($values, 'deleteAll',[])
		]);
	}

	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function actionCreate()
	{
		$model = new ymoUser;
		$model->scenario = 'create';

		if(Yii::$app->request->isAjax){

			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->load(Yii::$app->request->post())) {
					
				if($model->register() && $model->validate())
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
					];;

				}else{
					
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

	public function actionUpdate($id)
	{

		$model = $this->findModel($id);
		$model->scenario = 'update';

		if(Yii::$app->request->isAjax){
			
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			if ($model->load(Yii::$app->request->post())) {
					
				if($model->updateUser() && $model->validate())
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

    public function actionUpdatePassword($id)
    {

        $model = $this->findModel($id);
        $model->scenario = 'update_password';
        
        if(Yii::$app->request->isAjax){
        		
        	Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        		
        	if ($model->load(Yii::$app->request->post())) {
        			
        		if($model->update())
        		{
        				
        			return [
        				'name' => 'success',
        				'message' => 'Successfull.',
        				'content' =>  Yii::$app->controller->renderAjax('@common/errors/popup',[
        					'header' => Yii::t('app','Well done!'),
        					'body' => 'Password successfully updated',
        					'footer' => Yii::t('app','ok'),
        				]),
        				'status' => 200,
        			];
        				
        		}else{
        				
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

        return $this->render('update_password', [
            'model' => $model,
        ]);
    }

    public function actionUpdateEmail($id)
    {

        $model = $this->findModel($id);
        $model->scenario = 'update_email';
        
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
        					'body' => 'Email successfully updated',
        					'footer' => Yii::t('app','ok'),
        				]),
        				'status' => 200,
        			];
        
        		}else{
        
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
        
	    return $this->render('update_email', [
	        'model' => $model,
	    ]);
        
    }

	public function actionDelete($id)
	{
		if(Role::getRuleByUser($id))
		{
			$role = $this->_authManager->createRole(Role::getRuleByUser($id)->name);
			$this->_authManager->revoke($role, $id);
		}

		if($this->findModel($id)->delete())
		{
			Yii::$app->session->setFlash('success', 'Record successfully deleted');
		} else {
			Yii::$app->session->setFlash('error', 'There was an error delete record.');
		}
		return $this->redirect(['/manager-users/user']);
	}

	protected function findModel($id)
	{
		if (($model = ymoUser::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
