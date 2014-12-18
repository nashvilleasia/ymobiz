<?php

namespace ymobiz\actions;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\models\ymoClientsFiles;

class DisplayFileAction extends BaseAction
{
	
	/**
	 * @inheritdoc
	 */
	public function viewFile()
	{
		$id = Yii::$app->request->get('id');
		$mode = (Yii::$app->request->get('mode')) ? Yii::$app->request->get('mode') : 'safe';
		
		$model = new $this->options['model'];
		if(ArrayHelper::getValue($this->options,'params'))
		{
			foreach(ArrayHelper::getValue($this->options,'params') as $params)
			{
				$model = $model->$params;
			}
		}
		
		if(ArrayHelper::getValue($this->options,'scenario'))
		{
			$model->scenario = $this->options['scenario'];
		}
		
		$function = new \ReflectionClass($model);
		
		$modelClients= $model->find()->where([
			'id' => $id,
			'clients_id' => Yii::$app->user->id,
		])->one();
		
		if($modelClients==false)
		{
			$session = ArrayHelper::getValue($_SESSION['steps']['finish']['Dev'],'fileStep');
			$modelClients = (object)$session[$id];
		}
		
		if($mode=='safe'){
			$file = base64_decode($modelClients->filecontent);
		}else{
			$protect = new \ymobiz\helpers\Password();
			$file = $protect->decryptByKey(base64_decode($modelClients->filecontent),Yii::$app->user->identity->getAuthKey());
		}
		
		header('Pragma: public');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Transfer-Encoding: binary');
		header('Content-length: '.$modelClients->size);
		header('Content-Type: '.$modelClients->mimetype);
		header('Content-Disposition: inline; filename='.$modelClients->name);
		
		echo $file;
	}
	
    /**
     * @inheritdoc
     */
    /*public function viewFile_()
    {

        if (!\Yii::$app->user->isGuest) {
            return  Yii::$app->controller->goHome();
        }

        $model = new $this->options['model'];
        if(ArrayHelper::getValue($this->options,'params'))
        {
            foreach(ArrayHelper::getValue($this->options,'params') as $params)
            {
                $model = $model->$params;
            }
        }

        if(ArrayHelper::getValue($this->options,'scenario'))
        {
            $model->scenario = $this->options['scenario'];
        }

        $function = new \ReflectionClass($model);

        if(Yii::$app->request->isAjax){

            $model->load(Yii::$app->request->post());
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post())) {

                $request = ArrayHelper::getValue($this->options,'request');
                if($model->$request($model))
                {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'status'=>200
                    ];

                }else{

                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                    return [
                        'name' => 'validationError',
                        'message' => 'Validation fix errors.',
                        'errors' => $model->getErrors(),
                        'content' => Yii::$app->controller->render('@common/errors/popup',[
                                'header' => Yii::t('app','Validation errors!'),
                                'body' => Html::errorSummary($model,['class'=>'error-summary']),
                            ]),
                        'status' => 400,
                    ];
                }
            }
        }
    }*/
}