<?php

namespace ymobiz\models\common;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ymobiz\models\common\ymoSystemMessages;

/**
 * ymoSearchSystemMessages represents the model behind the search form about `ymobiz\models\common\ymoSystemMessages`.
 */
class ymoSearchSystemMessages extends ymoSystemMessages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'languages_id', 'cluster_id', 'created_at', 'updated_at'], 'integer'],
            [['module', 'code', 'name', 'content', 'type'], 'safe'],
            [['status'], 'integer'],
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
        $query = ymoSystemMessages::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'languages_id' => $this->languages_id,
            'cluster_id' => $this->cluster_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
