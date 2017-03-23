<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $detail
 * @property string $router
 * @property integer $sented_at
 * @property integer $sented_by
 * @property integer $received_at
 * @property integer $received_by
 */
class Notification extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['status', 'sented_at', 'sented_by', 'received_at', 'received_by'], 'integer'],
            [['sented_by', 'received_by'], 'required'],
            [['title'], 'string', 'max' => 100],
            [['detail', 'router'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('person', 'ID'),
            'title' => Yii::t('person', 'เรื่อง'),
            'status' => Yii::t('person', 'สถานะ'),
            'detail' => Yii::t('person', 'รายละเอียด'),
            'router' => Yii::t('person', 'เส้นทาง'),
            'sented_at' => Yii::t('person', 'ส่งเมื่อ'),
            'sented_by' => Yii::t('person', 'ส่งโดย'),
            'received_at' => Yii::t('person', 'รับเมื่อ'),
            'received_by' => Yii::t('person', 'อ่านโดย'),
        ];
    }
    
    /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getSentedBy() 
   { 
       return $this->hasOne(User::className(), ['id' => 'sented_by']); 
   } 
 
   /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getReceivedBy() 
   { 
       return $this->hasOne(User::className(), ['id' => 'received_by']); 
   } 

}
