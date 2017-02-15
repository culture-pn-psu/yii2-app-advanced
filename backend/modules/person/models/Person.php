<?php

namespace backend\modules\person\models;

use Yii;
use backend\modules\image\models\Image;
use yii\helpers\ArrayHelper;
use common\models\User;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property integer $prefix_id
 * @property string $name
 * @property string $surname
 * @property string $id_card
 * @property string $nickname
 * @property string $sex
 * @property integer $img_id
 * @property string $data
 *
 * @property Prefix $prefix
 * @property PersonPosition $personPosition
 * @property User[] $users
 */
class Person extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['prefix_id', 'id_card'], 'integer'],
            [['name', 'surname'], 'required'],
            [['sex', 'data','tel','phone'], 'string'],
            [['img_id'], 'string', 'max' => 50],
            [['name', 'surname'], 'string', 'max' => 100],
            [['nickname'], 'string', 'max' => 20],
            [['id_card'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('person', 'ID'),
            'prefix_id' => Yii::t('person', 'คำนำหน้า'),
            'name' => Yii::t('person', 'ชื่อ'),
            'surname' => Yii::t('person', 'นามสกุล'),
            'id_card' => Yii::t('person', 'รหัสบัตรประชาชน'),
            'nickname' => Yii::t('person', 'ชื่อเรียก'),
            'sex' => Yii::t('person', 'เพศ'),
            'img_id' => Yii::t('person', 'รูปประจำตัว'),
            'data' => Yii::t('person', 'ข้อมูลอื่น'),
            'fullname' => Yii::t('person', 'ชื่อ - นามสกุล'),
            'position' => Yii::t('person', 'ตำแหน่ง'),
            'tel' => Yii::t('person', 'เบอร์ติดต่อ'),
            'phone' => Yii::t('person', 'เบอร์มือถือ'),
        ];
    }

    
    public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => Yii::t('app', 'ร่าง'),
                1 => Yii::t('app', 'เสนอ'),
                2 => Yii::t('app', 'พิจารณา'),
                3 => Yii::t('app', 'อนุมัติ'),
                4 => Yii::t('app', 'ไม่อนุมัติ'),
                5 => Yii::t('app', 'ยกเลิก'),
                6 => Yii::t('app', 'ซ่อมแล้ว'),
            ],
            'type' => [
                1 => Yii::t('app', 'ครุภัณฑ์ทั่วไป'),
                2 => Yii::t('app', 'คอมพิวเตอร์'),
            ],
            'sex' => [
                'm' => Yii::t('person', 'ชาย'),
                'f' => Yii::t('person', 'หญิง'),
            ],
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getSexLabel() {
        return ArrayHelper::getValue($this->getItemSex(), $this->sex);        
    }

    public static function getItemSex() {
        return self::itemsAlias('sex');
    }
    
    //Folder of image
    const UPLOAD_FOLDER = 'person';
    const width = 100;
    const height = 158;
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrefix() {
        return $this->hasOne(Prefix::className(), ['id' => 'prefix_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonPosition() {
        return $this->hasMany(PersonPosition::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(User::className(), ['person_id' => 'id']);
    }

    public function getFullname() {
        return ($this->prefix_id ? $this->prefix->title : '') . ' ' . $this->name . ' ' . $this->surname;
    }

    public function getPosition() {
        $model = $this->personPosition;
        $postion = [];
        if ($model)
            foreach ($model as $val) {
                $postion[] = $val->position->title;
            }
        return ($postion ? implode(', ', $postion) : '');
    }

    public function getParent() {
        $model = $this->personPosition;
        $postion = [];
        if ($model)
            foreach ($model as $val) {
                $postion[] = $val->position->parent->title;
            }
        return ($postion ? implode(', ', $postion) : '');
        // return ($this->personPosition?$this->personPosition->position->parent->title:'');
    }
    
    public function getImg(){ 
        return $this->hasOne(\backend\modules\image\models\Image::className(), ['id' => 'img_id']); 
    }
    public function getImgTemp(){       
        $model = $this->img;    
        return (isset($model->id)?Yii::$app->img->getUploadUrl(self::UPLOAD_FOLDER).$model->id:Yii::$app->img->getUploadUrl().Yii::$app->img->no_img);
    }
    
    public function getImgCircle(){  
        return \yii\helpers\Html::beginTag('div',['class'=>'circle','style'=>'width:50px;height:50px;']).\yii\helpers\Html::img($this->imgTemp, ['class' => '','width'=>'50']).\yii\helpers\Html::endTag('div');
    }
    
    public function getUser() {
        return $this->hasOne(User::className(), ['person_id' => 'id']);
    }

}
