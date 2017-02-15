<?php

namespace backend\modules\person\models;

use Yii;

/**
 * This is the model class for table "person_position".
 *
 * @property integer $person_id
 * @property integer $position_id
 *
 * @property Person $person
 * @property Position $position
 */
class PersonPosition extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'person_position';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['position_id'], 'required'],
            [['person_id', 'position_id','user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'person_id' => Yii::t('person', 'บุคคล'),
            'position_id' => Yii::t('person', 'ตำแหน่ง'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson() {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition() {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    public static function deleteByIDs($id) {
        $model = self::deleteAll(['person_id' => $id]);
    }

}
