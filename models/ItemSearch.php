<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form of `app\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'location_id'], 'integer'],
            [['name', 'price', 'seller_id'], 'safe'],
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
        $query = Item::find();

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
            'category_id' => $this->category_id,
            'location_id' => $this->location_id
        ]);


        $query->andFilterWhere(['like', 'name', $this->name]);
        $this->price && $query->andFilterWhere(['and',
            ['>=', 'price', $this->price['lower']],
            ['<=', 'price', $this->price['upper']]
        ]);

        $rate = isset($this->seller_id) ? $this->seller_id['rate'] : null;
        if ($rate) {
            $query->joinWith('seller')->andFilterWhere(['>=', 'rate', $rate]);
        }
        return $dataProvider;
    }
}
