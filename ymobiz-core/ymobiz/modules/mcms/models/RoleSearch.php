<?php

namespace ymobiz\modules\mcms\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use ymobiz\modules\mcms\rbac\Item;
use yii\data\ActiveDataProvider;

/**
 * RoleSearch represents the model behind the search form about Role.
 */
class RoleSearch extends Model
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

	public function search($params)
	{
		$query = ymoAuthItem::find()->where(['type'=>Item::TYPE_ROLE])->orderBy('updated_at desc,created_at desc');
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 10,
			],
		]);
	
		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}
	
		$this->addCondition($query, 'name');
		$this->addCondition($query, 'description', true);
		$this->addCondition($query, 'data', true);
		return $dataProvider;
	}
	
	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}

}
