<?php

namespace ymobiz\modules\common\controllers;

use Yii;
use ymobiz\models\common\ymoLanguagesContents;
use ymobiz\models\common\ymoSearchLanguagesContents;
use ymobiz\modules\mcms\components\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * LanguagesContentsController implements the CRUD actions for ymoLanguagesContents model.
 */
class LanguagesContentsController extends Controller
{
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

    /**
     * Lists all ymoLanguagesContents models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ymoSearchLanguagesContents();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ymoLanguagesContents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ymoLanguagesContents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$model = new ymoLanguagesContents();
    
    	if(Yii::$app->request->isAjax){

			Yii::$app->response->format = Response::FORMAT_JSON;
			
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

    /**
     * Updates an existing ymoLanguagesContents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		if(Yii::$app->request->isAjax){
			
			Yii::$app->response->format = Response::FORMAT_JSON;
			
			if ($model->load(Yii::$app->request->post())) {
					
				if($model->save() && $model->validate())
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

    /**
     * Deletes an existing ymoLanguagesContents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$model = ymoLanguagesContents::findOne($id);
    	
    	if($model==true)
    	{
    		$model->delete();
    	}
    }

    /**
     * Finds the ymoLanguagesContents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ymoLanguagesContents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ymoLanguagesContents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
