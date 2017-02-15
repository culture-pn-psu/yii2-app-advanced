<?php

namespace backend\modules\article\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $article_category_id
 * @property string $title
 * @property string $images
 * @property string $summary
 * @property string $content
 * @property integer $status
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property string $language
 * @property string $display_start
 * @property string $display_finish
 *
 * @property User $createdBy
 * @property User $updatedAt
 * @property ArticleCategory $articleCategory
 */
class Article extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article';
    }

    public function behaviors() {
        return [
//            [
//                'class' => SluggableBehavior::className(),
//                'attribute' => 'title',
//                'immutable' => true,
//                'ensureUnique'=>true,
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['article_category_id', 'title', 'content'], 'required'],
            [['article_category_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['summary', 'content'], 'string'],
            [['display_start', 'display_finish'], 'safe'],
            [['title'], 'string', 'max' => 250],
            [['images','slug'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 5],
            [['tags'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'รหัสบทความ'),
            'article_category_id' => Yii::t('app', 'รหัสหมวดหมู่'),
            'title' => Yii::t('app', 'ชื่อเรื่อง'),
            'images' => Yii::t('app', 'รูปประกอบ'),
            'summary' => Yii::t('app', 'ข้อความย่อ'),
            'content' => Yii::t('app', 'เนื้อหา'),
            'status' => Yii::t('app', 'สถานะ'),
            'created_at' => Yii::t('app', 'สร้างเมื่อ'),
            'created_by' => Yii::t('app', 'สร้างโดย'),
            'updated_at' => Yii::t('app', 'แก้ไขเมื่อ'),
            'updated_by' => Yii::t('app', 'แก้ไขโดย'),
            'language' => Yii::t('app', 'ภาษา'),
            'display_start' => Yii::t('app', 'แสดงเมื่อ'),
            'display_finish' => Yii::t('app', 'สิ้นสุด'),
            'tags' => Yii::t('app', 'ใบกำกับ'),
            'slug' => Yii::t('app', 'Slug'),
            'params' => Yii::t('app', 'Params'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy() {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory() {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags() {
        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id']);
    }

    #################################################

    public $tags;

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

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }

    public function getStatusLabel() {
        $status = ArrayHelper::getValue($this->getItemStatus(), $this->status);
        $str = '';
        switch ($this->status) {
            case 0 :
                $str = '<span class="label label-danger">' . $status . '</span>';
                break;
            case 1 :
                $str = '<span class="label label-success">' . $status . '</span>';
                break;
            case 2 :
                $str = '<span class="label label-warning">' . $status . '</span>';
                break;
            default :
                $str = $status;
                break;
        }
        return $str;
    }

    public function getImage() {
        return $src = (empty($this->images)) ? Yii::$app->img->getNoImg() : $this->images;
    }

    public static function getDataProvider($cate_id = null) {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(['article_category_id' => $cate_id]);
        $dataProvider->pagination->pageSize = 6;
        //$dataProvider->sort->defaultOrder = ['id' => 'DESC'];
        return $dataProvider;
    }

    public function getShowRange() {

        $start = Yii::$app->formatter->asDate($this->display_start);
        $finist = Yii::$app->formatter->asDate($this->display_finish);
        $check = Yii::$app->formatter->asTimestamp($this->display_finish);
        $check = $check > time() ? '' : ' <span class="text-red">หมดเวลา</span>';

        return (($this->display_start && $this->display_finish) ? $start . ' ถึง ' . $finist . $check : '');
    }

    public function getTagAll() {
        $model = $this->articleTags;
        return $model ? ArrayHelper::map($model, 'tag_id', 'tag_id') : null;
    }

    public function getTagsLabel() {
        $model = $this->articleTags;
        $str = [];
        if ($model) {
            foreach ($model as $val) {
                $str[] = \yii\helpers\Html::tag('span', $val->tag->title);
            }
            return implode(', ', $str);
        }
        return null;
    }

}
