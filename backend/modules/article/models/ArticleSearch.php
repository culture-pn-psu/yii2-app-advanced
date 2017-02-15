<?php

namespace backend\modules\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\article\models\Article;

/**
 * ArticleSearch represents the model behind the search form about `backend\modules\article\models\Article`.
 */
class ArticleSearch extends Article {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'article_category_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['title', 'images', 'summary', 'content', 'language', 'display_start', 'display_finish', 'tags'], 'safe'],
        ];
    }

    public $tags;

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        $query->joinWith('articleTags');
                
        $dataProvider->setSort([
            'attributes' => [
                'title',
                'article_category_id',
                'status',
                'tags' => [
                    'asc' => ['article_tag.tag_id' => SORT_ASC],
                    'desc' => ['article_tag.tag_id' => SORT_DESC],
                ],
                'created_by',
                'created_at',
                'display_start',
            ]
        ]);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            return $dataProvider;
        }

        $query->andFilterWhere([
            'article_tag.tag_id' => $this->tags,
        ]);


        $query->andFilterWhere([
            'id' => $this->id,
            'article_category_id' => $this->article_category_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'display_start' => $this->display_start,
            'display_finish' => $this->display_finish,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'images', $this->images])
                ->andFilterWhere(['like', 'summary', $this->summary])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'language', $this->language]);

        return $dataProvider;
    }

}
