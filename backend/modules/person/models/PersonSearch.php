<?php

namespace backend\modules\person\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\person\models\Person;

/**
 * PersonSearch represents the model behind the search form about `backend\modules\person\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prefix_id', 'id_card', 'position'], 'integer'],
            [['name', 'surname', 'nickname', 'sex', 'data', 'fullname'], 'safe'],
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
    public $fullname;
    public $position;
    
    public function search($params)
    {
        $query = Person::find();
        $query->joinWith('personPosition');        
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
        'attributes' => [
            'fullname' => [
                'asc' => ['name' => SORT_ASC, 'surname' => SORT_ASC],
                'desc' => ['name' => SORT_DESC, 'surname' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
            ],
            'position' => [
                'asc' => ['person_position.position_id' => SORT_ASC],
                'desc' => ['person_position.position_id' => SORT_DESC],
                'label' => 'ตำแหน่ง',
                'default' => SORT_ASC
            ],
        ]
    ]);
 
        
        
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'prefix_id' => $this->prefix_id,
            'id_card' => $this->id_card,
            'img_id' => $this->img_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'data', $this->data]);
        
        $query->andWhere('name LIKE "%' . $this->fullname . '%" ' .'OR surname LIKE "%' . $this->fullname . '%"');
        
        
        if($this->position)
        $query->andWhere(['person_position.position_id'=>$this->position]);

        return $dataProvider;
    }
}
