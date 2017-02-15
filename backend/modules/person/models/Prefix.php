<?php

namespace backend\modules\person\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prefix".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_short
 * @property string $title_en
 * @property string $title_en_short
 *
 * @property Person[] $people
 */
class Prefix extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prefix';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'title_en'], 'string', 'max' => 20],
            [['title_short', 'title_en_short'], 'string', 'max' => 10],
            [['title'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('person', 'รหัสคำนำหน้า'),
            'title' => Yii::t('person', 'คำนำหน้า'),
            'title_short' => Yii::t('person', 'คำนำหน้า(ย่อ)'),
            'title_en' => Yii::t('person', 'คำนำหน้า(อังกฤษ)'),
            'title_en_short' => Yii::t('person', 'คำนำหน้า(อังกฤษย่อ)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['prefix_id' => 'id']);
    }
    
    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(),'id','title');
    }
}
