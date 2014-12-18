<?php

namespace ymobiz\modules\mcms\models;

class Route extends \yii\base\Model
{
	public $route;
	
	public function rules()
	{
		return[
			[['route'],'safe'],
		];
	}
}