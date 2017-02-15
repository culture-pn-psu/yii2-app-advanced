<?php

namespace backend\modules\tag\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\article\models\Article;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $title
 * @property string $discription
 *
 * @property ArticleTag[] $articleTags
 * @property Article[] $articles
 */
class Tag extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [[ 'title'], 'required'],
            [['id'], 'integer'],
            [['discription'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('tag', 'ID'),
            'title' => Yii::t('tag', 'ชื่อเท็ก'),
            'discription' => Yii::t('tag', 'รายละเอียด'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags() {
        return $this->hasMany(ArticleTag::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles() {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])->viaTable('article_tag', ['tag_id' => 'id']);
    }

    public static function getList() {
        return ArrayHelper::map(self::find()->all(),'id','title');
    }

}
