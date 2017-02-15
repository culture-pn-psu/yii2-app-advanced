<?php

namespace backend\modules\article\models;

use Yii;
use backend\modules\tag\models\Tag;

/**
 * This is the model class for table "article_tag".
 *
 * @property integer $article_id
 * @property integer $tag_id
 *
 * @property Tag $tag
 * @property Article $article
 */
class ArticleTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'tag_id'], 'required'],
            [['article_id', 'tag_id'], 'integer'],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            [['title'],'safe']
        ];
    }
    public $title;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => Yii::t('article', 'Article ID'),
            'tag_id' => Yii::t('article', 'Tag ID'),
            'title' => Yii::t('article', 'แท็ก'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }
    
    
    ###################################
    
    public static function deleteByIDs($id) {
        //print_r($id);
        $model = self::deleteAll(['tag_id' => $id]);
        //return $model->deleteAll();
    }
    
}
