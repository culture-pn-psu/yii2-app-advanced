<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\article\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ข่าว/บทความ');
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>";
//print_r(Yii::$app->controller->module);
?>
<div class='box box-info'>
    <div class='box-header'>
      <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
    </div><!--box-header -->

    <div class='box-body pad'>

        <p>
            <?= Html::a(Yii::t('app', 'เพิ่มข่าว/บทความ'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',  
                [
                    'attribute' => 'images',
                    'format' => 'html',
                    'filter' => false,
                    'value' => function($model) {
                        return Html::img($model->image, ['width' => '80']);
                    }
                        ],
                        [
                            'attribute' => 'title',
                            'format' => 'html',
                            'value' => function($model) {
                                return Html::a($model->title, ['view', 'id' => $model->id]);
                            }
                                ],
                                [
                                    'attribute' => 'article_category_id',
                                    'filter' => \backend\modules\article\models\ArticleCategory::getCategory(),
                                    'value' => function($model) {
                                        return $model->articleCategory->title;
                                    }
                                ],
                                //'summary:ntext',
                                // 'content:ntext',
                                [
                                    'attribute' => 'status',
                                    'format' => 'html',
                                    'filter' => \backend\modules\article\models\Article::getItemStatus(),
                                    'value' => 'statusLabel'
                                ],
                                [
                                    'attribute' => 'tags',
                                    'format' => 'html',
                                    'filter' => \backend\modules\tag\models\Tag::getList(),
                                    'value' => 'tagsLabel'
                                ],
                                [
                                    'attribute' => 'created_by',
                                    'filter' => common\models\User::getListUser(),
                                    'value' => 'createdBy.displayname'
                                ],
                                'created_at:datetime',
//                                [
//                                    'attribute' => 'updated_by',
//                                    'filter' => common\models\User::getListUser(),
//                                    'value' => 'updatedBy.displayname'
//                                ],
                                [
                                    'attribute' => 'display_start',
                                    'format' => 'html',
                                    'value' => 'showRange'
                                ],
                                // 'language',
                                // 'display_start',
                                // 'display_finish',
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]);
                        ?>


    </div><!--box-body pad-->
</div><!--box box-info-->
