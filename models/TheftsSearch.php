<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Thefts;

/**
 * DamagesSearch represents the model behind the search form of `app\models\Damages`.
 */
class TheftsSearch extends Thefts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'last_update'], 'integer'],
            [['city', 'stolen_property',  'theft_detection_time', 'notes'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Thefts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'city' => $this->city,
            'stolen_property' => $this->stolen_property,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'stolen_property', $this->stolen_property])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
