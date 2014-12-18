<?php

namespace ymobiz\models\common;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ymoCards;

/**
 * ymoSearchCards represents the model behind the search form about `common\models\ymoCards`.
 */
class ymoSearchCards extends ymoCards
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'dateissue', 'dateexpiration', 'created_at', 'updated_at'], 'integer'],
            [['cardnumber', 'cardpin', 'title', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ymoCards::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'client_id' => $this->client_id,
            'dateissue' => $this->dateissue,
            'dateexpiration' => $this->dateexpiration,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'cardnumber', $this->cardnumber])
            ->andFilterWhere(['like', 'cardpin', $this->cardpin])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
