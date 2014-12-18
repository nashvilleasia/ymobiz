<?php

namespace ymobiz\components;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Component;

class FormWizard extends Component
{
	public static function saveDataSession($data,$params=false){
	
		$model = (ArrayHelper::getValue($params, 'model')) ? ArrayHelper::getValue($params, 'model') : false;
		$formName = ($model) ? $model->formName() : ArrayHelper::getValue($params, 'formName');
		$attributes = ($formName) ? $data[$formName] : $data;

		//$array[$formName] = [];
	
		foreach ($attributes as $key => $value){
			
			$array[$formName][$key] = $value;
	
			if(ArrayHelper::getValue($params, 'data')){
				foreach ($params['data'] as $attribute){
					if($key==$attribute){
						if(ArrayHelper::getValue($params, 'class')){
							if(class_exists($params['class'])){
								$protect = new $params['class'];
								$array[$formName][$attribute] = $protect->securityProtect($params['method'],$value,$params['params']);
							}
						}
					}
				}
			}
		}
	
		return $array;
	}
}