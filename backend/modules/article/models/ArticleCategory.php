<?php

namespace backend\modules\article\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;
/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $title
 * @property string $intro
 * @property integer $parent_id
 * @property string $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Article[] $articles
 * @property User $updatedBy
 * @property ArticleCategory $parent
 * @property ArticleCategory[] $articleCategories
 * @property User $createdBy
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['intro'], 'string'],
            [['parent_id', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัสหมวดหมู่'),
            'title' => Yii::t('app', 'ชื่อหมวดหมู่'),
            'intro' => Yii::t('app', 'รายละเอียด'),
            'parent_id' => Yii::t('app', 'ภายใต้หมวด'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
     public static function getCategory($id=null)
    { 
         if(!empty($id)){             
            $cate=self::find()->where('id != :id ',[':id'=>$id])->all();
         }else{
             $cate=self::find()->all();
         }   
        return ArrayHelper::map($cate,'id','title');
    }
    
}
