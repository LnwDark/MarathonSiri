<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Register;

/**
 * RegisterSearch represents the model behind the search form of `app\models\Register`.
 */
class RegisterSearch extends Register
{
    /**
     * {@inheritdoc}
     */
    public $fullName;
    public function rules()
    {
        return [
            [['id', 'sex', 'phone', 'status', 'delivery_status', 'send_status', 'type_group', 'created_by', 'updated_by'], 'integer'],
            [['firstname', 'lastname', 'birthday', 'id_card', 'email', 'club', 'emergency_name', 'emergency_phone',  'slip', 'house_no', 'address', 'soi', 'street', 'district', 'amphoe', 'province', 'zipcode', 'created_at', 'updated_at','fullName'], 'safe'],
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
        $query = Register::find()->where(['register_id'=>null])->orderBy('created_at desc');

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
            'birthday' => $this->birthday,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->fullName])
            ->andFilterWhere(['like', 'lastname', $this->fullName]);

        return $dataProvider;
    }
}
