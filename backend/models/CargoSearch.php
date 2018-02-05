<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cargo;

class CargoSearch extends Cargo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['description'], 'string'],
            [['name', 'short_des', 'warning_info'], 'string', 'max' => 255],
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
        $query = Cargo::find();

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
        $query->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like', 'name', $this->name]);
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'status' => $this->status,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ]);

        // $query->andFilterWhere(['like', 'username', $this->username])
        //     ->andFilterWhere(['like', 'auth_key', $this->auth_key])
        //     ->andFilterWhere(['like', 'password_hash', $this->password_hash])
        //     ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
        //     ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}