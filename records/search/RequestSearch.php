<?php

namespace app\records\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\records\Request;

/**
 * RequestSearch represents the model behind the search form of `app\records\Request`.
 */
class RequestSearch extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', 'full_name', 'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'address', 'message_1', 'message_2', 'message_3', 'message_4', 'status', 'access_key', 'uid', 'created_at', 'updated_at'], 'safe'],
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
        $query = Request::find();

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

        $query->where(['status' => Request::STATUS_ACTIVE]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'message_1', $this->message_1])
            ->andFilterWhere(['like', 'message_2', $this->message_2])
            ->andFilterWhere(['like', 'message_3', $this->message_3])
            ->andFilterWhere(['like', 'message_4', $this->message_4])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'access_key', $this->access_key])
            ->andFilterWhere(['like', 'uid', $this->uid])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
