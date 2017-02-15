<?php

namespace backend\modules\slide\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\modules\image\models\Image;
use common\models\User;

/**
 * This is the model class for table "slide".
 *
 * @property integer $id
 * @property integer $slide_cate_id
 * @property string $title
 * @property string $img_id
 * @property string $link
 * @property string $status
 * @property string $sort
 * @property string $start
 * @property string $end
 * @property string $detail
 * @property integer $created_at
 * @property integer $created_by
 *
 * @property SlideCategory $slideCate
 * @property TbImages $img
 */
class Slide extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['slide_cate_id'], 'required'],
            [['slide_cate_id', 'created_at', 'created_by'], 'integer'],
            [['status', 'detail'], 'string'],
            [['start', 'end'], 'safe'],
            [['title'], 'string', 'max' => 250],
            [['img_id'], 'string', 'max' => 50],
            [['link'], 'string', 'max' => 255],
            [['sort'], 'string', 'max' => 2]
        ];
    }

    const UPLOAD_FOLDER = 'slide';

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'รหัสสไลด์'),
            'slide_cate_id' => Yii::t('app', 'หมวดหมู่'),
            'title' => Yii::t('app', 'ชื่อสไลด์'),
            'img_id' => Yii::t('app', 'รูปภาพ'),
            'link' => Yii::t('app', 'ลิงค์'),
            'status' => Yii::t('app', 'แสดง'),
            'sort' => Yii::t('app', 'เรียง'),
            'start' => Yii::t('app', 'วันที่เริ่ม'),
            'end' => Yii::t('app', 'วันที่สิ้นสุด'),
            'detail' => Yii::t('app', 'รายละเอียด'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'created_by' => Yii::t('app', 'ชื่อผู้ใช้'),
        ];
    }

    public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => Yii::t('app', 'ร่าง'),
                1 => Yii::t('app', 'แสดง'),
                2 => Yii::t('app', 'ซ่อน')
            ],
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getStatusLabel() {
        return ArrayHelper::getValue($this->getItemStatus(), $this->status);
    }

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlideCate() {
        return $this->hasOne(SlideCategory::className(), ['id' => 'slide_cate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImg() {
        return $this->hasOne(Image::className(), ['id' => 'img_id']);
    }

    public function getImage() {
        $img = $this->img;
        //$img = Image::find()->where(['id'=>$this->img_id])->one();
        //print_r($this->img);
        //exit();
        $image = Yii::$app->img->getNoimg();
        if ($img) {
            $url = Yii::$app->img->getUploadUrl($img->path_file);
            //echo '('.Yii::$app->img->chkImg($img->path_file, $img->id).')';
            $image = Yii::$app->img->chkImg($img->path_file, $img->id) ? $url . $img->id : Yii::$app->img->getNoimg();
        }
        return $image;
    }

    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public static function getListSlideGalya($id = NULL) {
        return self::find()
                        ->where(['status' => '1'])
                        ->andWhere(($id) ? ['slide_cate_id' => $id] : '')
                        ->orderBy(['start' => SORT_ASC, 'end' => SORT_DESC])
                        ->all();
    }

    public static function getListSlide($id = NULL) {
        return self::find()
                        ->where(['status' => '1'])
                        ->andWhere(($id) ? ['slide_cate_id' => $id] : '')
                        ->andWhere(["<=", "start", date('Y-m-d')])
                        ->andWhere([">=", "end", date('Y-m-d')])
                        ->orderBy(['start' => SORT_ASC, 'end' => SORT_DESC])
                        ->all();
    }

}
