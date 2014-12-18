<?php

namespace ymobiz\modules\mcms\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;

/**
 * AuthItemSearch represents the model behind the search form about AuthItem.
 */
class AuthItemSearch extends Model
{

	public $name;
	public $type;
	public $description;
	public $rule_name;
	public $data;

	public function rules()
	{
		return [
			[['name', 'description',], 'safe'],
			[['type'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'name' => 'Name',
			'type' => 'Type',
			'description' => 'Description',
			'rule_name' => 'Rule Name',
			'data' => 'Data',
		];
	}

	/**
	 * 
	 * @param array $params
	 * @return \yii\data\ActiveDataProvider|\yii\data\ArrayDataProvider
	 */
	public function search($params)
	{
		/* @var \yii\rbac\Manager $authManager */
		$authManager = \Yii::$app->authManager;
		$items = $authManager->getRoles(null, $this->type);
		if ($this->load($params) && $this->validate()) {
			$items = array_filter($items, function($item) {
				if (trim($this->name) === '') {
					return true;
				}
				$search = strtolower($this->name);
				return strpos(strtolower($item->name), $search) !== false or strpos(strtolower($item->description), $search) !== false;
			});
		}

		return new ArrayDataProvider([
			'allModels' => $items,
			'pagination' => [
				'pageSize' => 10,
			],
		]);
	}

}
