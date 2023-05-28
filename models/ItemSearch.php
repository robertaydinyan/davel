<?php

namespace app\models;

use yii\data\ActiveDataProvider;
/**
 * ItemSearch represents the model behind the search form of `app\models\Item`.
 */
class ItemSearch extends Item
{
    public $order;
    public $price_lower;
    public $price_upper;
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
    public function scenarios() {
        return parent::scenarios();
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
        if (isset($params['ItemSearch'])) {
            $this->order = $params['ItemSearch']['order'];
            $this->price_lower = $params['ItemSearch']['price_lower'];
            $this->price_upper = $params['ItemSearch']['price_upper'];
        }
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


        $query->andFilterWhere(['like', 'item.name', $this->name]);
        $query->andFilterWhere(['and',
            ['>=', 'price', $this->price_lower],
            ['<=', 'price', $this->price_upper]
        ]);
        $query->joinWith('seller');

        $rate = isset($this->seller_id) ? $this->seller_id['rate'] : null;
        if ($rate) {
            $query->andFilterWhere(['>=', 'rate', $rate]);
        }

        switch ($this->order) {
            case 1:
                $query->orderBy(['price' => SORT_ASC]);
                break;
            case 2:
                $query->orderBy(['price' => SORT_DESC]);
                break;
            case 3:
                $query->orderBy(['seller.rate' => SORT_ASC]);
                break;
        }
        return $dataProvider;
    }
}
