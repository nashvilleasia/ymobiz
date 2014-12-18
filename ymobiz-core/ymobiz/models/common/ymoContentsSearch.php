<?php

namespace ymobiz\models\common;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ymobiz\models\common;

/**
 * UserSearch represents the model behind the search form about User.
 */
class ymoContentsSearch extends Model
{
	public $id;
	public $username;
	public $password;
	public $email;

	public function rules()
	{
		return [
			['id', 'integer'],
			['name, contents, slug', 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'contents' => 'Contents',
			'slug' => 'Slug',
		];
	}

	public function search($params)
	{
		$query = ymoContents::find()->orderBy('updated_at desc,created_at desc');
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
				'pageSize' => 10,
			],
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'contents', true);
		$this->addCondition($query, 'slug', true);
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
