<?php

/**
 * @inheritdoc
 */

namespace mcms\xeditable;

use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\console\Response;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

class XEditableAction extends Action
{
	public $modelclass;
	public $scenario = null;
	public $preProcess;
	public $forceCreate = true;

	/**
	 * @inheritdoc
	 * @throws \yii\base\InvalidConfigException
	 */
	public function init()
	{
		if ($this->modelclass === null) {
			throw new InvalidConfigException("'modelClass' cannot be empty.");
		}
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if (\Yii::$app->request->isAjax) {

			$class = $this->modelclass;
            $data = \Yii::$app->request->post('pk');
			$pk = ArrayHelper::getValue($data,'id');
            $attribute = \Yii::$app->request->post('name');
            $value = \Yii::$app->request->post('value');
            $scenario = (ArrayHelper::getValue($data,'scenario')) ? ArrayHelper::getValue($data,'scenario') : $this->scenario;

            $action = new XEditable;
            $action->saveAction([
				'attribute' => $attribute,
				'value' => $value,
				'pk' => $pk,
				'model' => $class,
				'scenario' => $scenario,
				'preProcess' => $this->preProcess,
				'forceCreate' => $this->forceCreate,
			]);

			/*$pk=$_POST['pk'];
			$name=$_POST['name'];
			$value=$_POST['value'];*/

			/*$modelclass=$this->modelclass;
			$$model= $modelclass::findOne($pk);
			if($this->scenario){
				$model->setScenario($this->scenario);
			}*/

			/*//if($model==null)
			//{
				$model = new $modelclass;
				$model->$name = $value;
				$model->content = $value;
				$model->lang = \Yii::$app->language;
				$model->save(false);
			//}*/

			/*XEditable::saveAction([
				'name' => $name,
				'value' => $value,
				'model' => $model,
			]);*/
		}

		/*if(\Yii::$app->request->getIsPost()){
			$pk=$_POST['pk'];
			$name=$_POST['name'];
			$value=trim($_POST['value']);
			$modelclass=$this->modelclass;
			$model= $modelclass::find($pk);
			if($this->scenario){
				$model->setScenario($this->scenario);
			}
			if($model===null)
				throw new NotFoundHttpException();
			$model->$name = $value;
			if ($model->validate()){
				$model->update();
			}else{
				//$model->load($_POST);
				//\Yii::$app->response->format = Response::FORMAT_JSON;
				VarDumper::dump($model->getErrors(),10);
				//VarDumper::dump(\yii\widgets\ActiveForm::validate($model));
			}
		}*/
	}
}
