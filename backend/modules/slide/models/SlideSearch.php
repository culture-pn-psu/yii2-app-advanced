<?php

namespace backend\modules\slide\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\slide\models\Slide;

/**
 * SlideSearch represents the model behind the search form about `backend\modules\slide\models\Slide`.
 */
class SlideSearch extends Slide
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'slide_cate_id', 'created_at', 'created_by'], 'integer'],
            [['title', 'img_id', 'link', 'status', 'sort', 'start', 'end', 'detail'], 'safe'],
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
        $query = Slide::find();

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
            'id' => $this->id,
            'slide_cate_id' => $this->slide_cate_id,
            'start' => $this->start,
            'end' => $this->end,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img_id', $this->img_id])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'sort', $this->sort])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
