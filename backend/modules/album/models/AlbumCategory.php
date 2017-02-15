<?php

namespace backend\modules\album\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "album_category".
 *
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Album[] $albums
 * @property AlbumCategory $parent
 * @property AlbumCategory[] $albumCategories
 */
class AlbumCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => AlbumCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('album', 'รหัสหมวด'),
            'title' => Yii::t('album', 'ชื่อหมวด'),
            'parent_id' => Yii::t('album', 'ภายใต้หมวด'),
            'created_at' => Yii::t('album', 'สร้างเมื่อ'),
            'created_by' => Yii::t('album', 'สร้างโดย'),
            'updated_at' => Yii::t('album', 'แก้ไขเมื่อ'),
            'updated_by' => Yii::t('album', 'แก้ไขโดย'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(AlbumCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumCategories()
    {
        return $this->hasMany(AlbumCategory::className(), ['parent_id' => 'id']);
    }
    
    ####################################

    public static function getList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }
}
