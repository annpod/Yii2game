<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\Experiment;

/**
 * ExperimentSearch represents the model behind the search form about `app\Models\Experiment`.
 */
class ExperimentSearch extends Experiment
{
    public function rules()
    {
        return [
            [['id', 'bones_num', 'throws'], 'integer'],
            [['date', 'time', 'name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Experiment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'time' => $this->time,
            'bones_num' => $this->bones_num,
            'throws' => $this->throws,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
