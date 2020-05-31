<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prices;

/**
 * DamagesSearch represents the model behind the search form of `app\models\Damages`.
 */
class PricesSearch extends Prices
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'last_update', 'price'], 'integer'],
            [['name_works', 'units_measurement', 'notes'], 'safe'],
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
        $query = Prices::find();

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
            'name_works' => $this->name_works,
            'units_measurement' => $this->units_measurement,
            'price' => $this->price,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'name_works', $this->name_works])
            ->andFilterWhere(['like', 'units_measurement', $this->units_measurement])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
