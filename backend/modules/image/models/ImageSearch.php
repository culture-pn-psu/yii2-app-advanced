<?php

namespace backend\modules\image\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\image\models\Image;

/**
 * ImageSearch represents the model behind the search form about `backend\modules\image\models\Image`.
 */
class ImageSearch extends Image
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'path_file', 'name_file', 'type_file', 'description', 'status'], 'safe'],
            [['create_at', 'create_by'], 'integer'],
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
        $query = Image::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'create_at' => $this->create_at,
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'path_file', $this->path_file])
            ->andFilterWhere(['like', 'name_file', $this->name_file])
            ->andFilterWhere(['like', 'type_file', $this->type_file])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
