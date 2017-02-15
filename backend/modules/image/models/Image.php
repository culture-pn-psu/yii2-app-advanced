<?php

namespace backend\modules\image\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property string $id
 * @property string $path_file
 * @property string $name_file
 * @property string $type_file
 * @property string $description
 * @property string $status
 * @property integer $create_at
 * @property integer $create_by
 *
 * @property User $createBy
 * @property Slide[] $slides
 */
class Image extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'path_file', 'name_file'], 'required'],
            [['description', 'status'], 'string'],
            [['create_at', 'create_by'], 'integer'],
            [['id'], 'string', 'max' => 50],
            [['path_file', 'name_file'], 'string', 'max' => 255],
            [['type_file'], 'string', 'max' => 10],
            //[['name_file'], 'maxFile' => 1024*1024*1024*20]
            //['name_file', 'file', 'extensions' => ['pdf', 'png', 'jpg', 'gif'], 'maxSize' => 20000000, 'tooBig' => 'Limit is 20MB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'รหัสรูป'),
            'path_file' => Yii::t('app', 'ตำแหน่ง'),
            'name_file' => Yii::t('app', 'ชื่อรูป'),
            'type_file' => Yii::t('app', 'ชนิดไฟล์'),
            'description' => Yii::t('app', 'รายละเอียด'),
            'status' => Yii::t('app', 'ไฟล์ทดลอง'),
            'create_at' => Yii::t('app', 'Create At'),
            'create_by' => Yii::t('app', 'รหัสผู้ใช้'),
            'temp' =>  Yii::t('app', 'ไฟล์ทดลอง'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateBy() {
        return $this->hasOne(User::className(), ['id' => 'create_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlides() {
        return $this->hasMany(Slide::className(), ['img_id' => 'id']);
    }

    public static function clearTemp($folder, $id = NULL,$id_old=NULL) {
        if (isset($id)) {
            $model = self::findOne(['id'=>$id,'temp'=>'1']);
            if($model){
            $model->temp = '0';
            $model->save();
            }
        }
        
        if (isset($id_old)) {
            $model = self::findOne(['id'=>$id_old,'temp'=>'1']);
            if($model){
            $model->temp = '1';
            $model->save();
            }
        }
        $model = self::find()->where(['temp' => '1', 'create_by' => Yii::$app->user->identity->id])->all();

        if ($model) {
            foreach ($model as $val) {
                $file = Yii::$app->img->getUploadPath($folder) . $val->id;
                $thumbnail = Yii::$app->img->getUploadThumbnailPath($folder) . $val->id;
                $valid =@unlink($file);
                $valid = @unlink($thumbnail) && $valid;
                if ($valid) {
                    $val->delete();
                    //exit();
                }
            }
        }
    }

}
