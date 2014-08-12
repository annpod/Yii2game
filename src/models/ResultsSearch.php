<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\Results;

/**
 * ResultsSearch represents the model behind the search form about `app\Models\Results`.
 */
class ResultsSearch extends Results
{
    public function rules()
    {
        return [
            [['id', 'num', 'count', 'id_exp'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Results::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'num' => $this->num,
            'count' => $this->count,
            'id_exp' => $this->id_exp,
        ]);

        return $dataProvider;
    }
}
