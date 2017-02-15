<?php

namespace backend\modules\slide\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;

/**
 * This is the model class for table "slide_category".
 *
 * @property integer $id
 * @property string $title
 * @property integer $width
 * @property integer $height
 * @property integer $created_at
 * @property integer $created_by
 *
 * @property Slide[] $slides
 */
class SlideCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'width', 'height'], 'required'],
            [['width', 'height', 'created_at', 'created_by'], 'integer'],
            [['title'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'รหัสหมวด'),
            'title' => Yii::t('app', 'ชื่อหมวดหมู่'),
            'width' => Yii::t('app', 'ความกว้าง'),
            'height' => Yii::t('app', 'ความสูง'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlides()
    {
        return $this->hasMany(Slide::className(), ['slide_cate_id' => 'id']);
    }
    
    public function getCreatedBy()
    {        
//        $by=$this->hasOne(User::className(), ['id' => 'created_by']);
//        return ($by&&$this->created_by)?$by->displayname:null;
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
    public static function getCategory()
    {
        $cate = self::find()->all();
        return ArrayHelper::map($cate,'id','title');
    }
}
