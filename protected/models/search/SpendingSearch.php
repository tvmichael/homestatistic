<?php

namespace app\models\search;

use app\models\Product;
use Cassandra\Date;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Spending;
use yii\db\Query;

/**
 * SpendingSearch represents the model behind the search form of `app\models\Spending`.
 */
class SpendingSearch extends Spending
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productId', 'userId'], 'integer'],
            [['price'], 'number'],
            [['datetime'], 'safe'],
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
        $query = Spending::find();

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
            'productId' => $this->productId,
            'userId' => $this->userId,
            'price' => $this->price,
            'datetime' => $this->datetime,
        ]);

        return $dataProvider;
    }

    /**
     * @return array
     */
    public static function month(): array
    {
        $arr = (new Query())
            ->from(['S' => Spending::tableName()])
            ->select(['P.name', 'S.price', 'S.id', 'S.datetime'])
            ->where([
                'between',
                'S.datetime',
                date('Y-m-01 00:00:00'),
                date('Y-m-t 23:59:59')
            ])
            ->leftJoin(['P'=>Product::tableName()], 'P.id=S.productId')
            ->orderBy(['S.datetime' => SORT_DESC])
            ->all();

        if(!is_array($arr)) $arr = [];

        return $arr;
    }
}
