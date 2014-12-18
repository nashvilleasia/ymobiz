<?php

namespace ymobiz\modules\common\controllers;

use Yii;
use ymobiz\models\common\ymoPaymentTypes;
use ymobiz\models\common\ymoSearchPaymentTypes;
use ymobiz\modules\mcms\components\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * PaymentTypesController implements the CRUD actions for ymoPaymentTypes model.
 */
class PaymentTypesController extends Controller
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
     * Lists all ymoPaymentTypes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ymoSearchPaymentTypes();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ymoPaymentTypes model.
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
     * Creates a new ymoPaymentTypes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$model = new ymoPaymentTypes();
    
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
     * Updates an existing ymoPaymentTypes model.
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
     * Deletes an existing ymoPaymentTypes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$model = ymoPaymentTypes::findOne($id);
    	
    	if($model==true)
    	{
    		$model->delete();
    	}
    }

    /**
     * Finds the ymoPaymentTypes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ymoPaymentTypes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ymoPaymentTypes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
