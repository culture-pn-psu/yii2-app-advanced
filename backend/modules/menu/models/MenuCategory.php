<?php

namespace backend\modules\menu\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "menu_category".
 *
 * @property integer $id
 * @property string $title
 * @property string $status
 *
 * @property Menu[] $menus
 */
class MenuCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'menu_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title'], 'required'],
            [['status'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['discription'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('system', 'รหัสหมวดเมนู'),
            'title' => Yii::t('system', 'ชื่อหมวดเมนู'),
            'status' => Yii::t('system', 'สถานะ'),
            'discription' => Yii::t('system', 'คำอธิบาย'), 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus() {
        return $this->hasMany(Menu::className(), ['menu_category_id' => 'id']);
    }

    public static function getList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'title');
    }

}
