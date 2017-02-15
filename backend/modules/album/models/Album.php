<?php

namespace backend\modules\album\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property integer $status
 * @property string $detail
 * @property string $path
 * @property string $image_intro
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $start 
 * @property string $end 
 *
 * @property AlbumCategory $category
 * @property AlbumTag[] $albumTags
 * @property Tag[] $tags
 */
class Album extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['category_id', 'title'], 'required'],
            [['category_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['detail', 'images'], 'string'],
            [['created_at', 'updated_at', 'start', 'end'], 'safe'],
            [['title', 'image_intro'], 'string', 'max' => 250],
            [['path'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => AlbumCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('album', 'รหัสอัลบั้ม'),
            'category_id' => Yii::t('album', 'หมวดหมู่'),
            'title' => Yii::t('album', 'ชื่ออัลบั้ม'),
            'status' => Yii::t('album', 'แสดง'),
            'detail' => Yii::t('album', 'รายละเอียด'),
            'path' => Yii::t('album', 'ตำแหน่ง'),
            'image_intro' => Yii::t('album', 'รูปปก'),
            'images' => Yii::t('album', 'รูปทั้งหมด'),
            'created_at' => Yii::t('album', 'สร้างเมื่อ'),
            'created_by' => Yii::t('album', 'สร้างโดย'),
            'updated_at' => Yii::t('album', 'แก้ไขเมื่อ'),
            'updated_by' => Yii::t('album', 'แก้ไขโดย'),
            'images_file' => Yii::t('art', 'รูปภาพ'),
            'start' => Yii::t('album', 'Start'),
           'end' => Yii::t('album', 'End'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(AlbumCategory::className(), ['id' => 'category_id']);
    }
    
    public function getCategoryTitle() {
        return $this->category_id?$this->category->title:null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumTags() {
        return $this->hasMany(AlbumTag::className(), ['album_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags() {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('album_tag', ['album_id' => 'id']);
    }

    #######################################################

    public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => Yii::t('app', 'ร่าง'),
                1 => Yii::t('app', 'เผยแพร่'),
                2 => Yii::t('app', 'ปรับปรุง'),
            ],
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getStatusLabel() {
        $status = ArrayHelper::getValue($this->getItemStatus(), $this->status);
        $status = ($this->status === NULL) ? ArrayHelper::getValue($this->getItemStatus(), 0) : $status;
        switch ($this->status) {
            case '0' :
            case NULL :
                $str = '<span class="label label-warning">' . $status . '</span>';
                break;
            case '1' :
                $str = '<span class="label label-primary">' . $status . '</span>';
                break;
            case '2' :
                $str = '<span class="label label-success">' . $status . '</span>';
                break;
            default :
                $str = $status;
                break;
        }

        return $str;
    }

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }

    const UPLOAD_FOLDER = 'albums';
    const width = 1024;

    public $images_file;

    public function initialPreview($data, $field, $type = 'file') {
        $initial = [];
        $files = '';
        if (!empty($data)) {
//            print_r($data);
//            exit();
            $files = \yii\helpers\Json::decode($data);
            ksort($files);
        }
        //$files = '';
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                if ($type == 'file') {
                    $initial[] = \yii\helpers\Html::img(Yii::$app->img->getUploadUrl(self::UPLOAD_FOLDER . '/' . $this->id) . $value, ['class' => 'file-preview-image', 'style' => 'width:100px;height:auto;']);
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        //'width' => '100px',
                        'url' => \yii\helpers\Url::to(['deletefile-ajax', 'id' => $this->id, 'fileName' => $value, 'field' => $field, 'folder' => self::UPLOAD_FOLDER]),
                        'key' => $value
                    ];
                } else {
                    $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }

    public static function findFiles($pathFile) {
        $files = [];
        $findFiles = \yii\helpers\FileHelper::findFiles($pathFile);
        ksort($findFiles);
        // set pdfs as target folder
        //print_r($findFiles);
        foreach ($findFiles as $index => $file) {
            if (strpos($file, 'thumbnail') === false) {
                $nameFicheiro = substr($file, strrpos($file, '/') + 1);
                $files[$nameFicheiro] = $nameFicheiro;
            }
        }
        return $files ? \yii\helpers\Json::encode($files) : null;
    }

    public function getThumbnails() {
        $imeges = \yii\helpers\Json::decode($this->images);
        $img = [];
        if ($imeges) {
            ksort($imeges);

            $url = Yii::$app->img->getUploadUrl(self::UPLOAD_FOLDER . '/' . $this->id);
            $urlThumbnails = Yii::$app->img->getUploadThumbnailUrl(self::UPLOAD_FOLDER . '/' . $this->id);
            if (is_array($imeges)) {
                foreach ($imeges as $key => $value) {
                    $img[] = [
                        'url' => $url . $value,
                        'src' => $urlThumbnails . $value,
                        'options' => [
                            'title' => $this->title,
                            'class' => 'col-xs-12 col-sm-4 art-img thumbnail'
                    ]];
                }
            }
        }
        return $img;
    }

    public function getImgTemp() {
        return (isset($this->image_intro) ? Yii::$app->img->getUploadThumbnailUrl(self::UPLOAD_FOLDER . '/' . $this->id) . $this->image_intro : Yii::$app->img->no_img);
    }
    
    public static function getIndex() {
        return self::find()->where(['status'=>1])->orderBy(['start' => SORT_DESC])->all();
    }

}
