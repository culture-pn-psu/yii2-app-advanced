<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\slide\models\Slide;
use backend\modules\slide\models\SlideCategory;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\slide\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slides');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->

    <div class='box-body pad'>

        <p>
            <?= Html::a(Yii::t('app', 'Create Slide'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                [
                    'attribute' => 'img_id',
                    'format'=> 'html',
                    'value' => function($model){
                        return Html::img($model->image,['width'=>'150']);
                    }
                ], 
                'title',
                [
                    'attribute' => 'slide_cate_id',
                    'filter' => SlideCategory::getCategory(),
                    'value' => 'slideCate.title'
                ],
               
                'link',
               [
                    'attribute' => 'status',
                    'filter' => Slide::getItemStatus(),
                    'value' => 'statusLabel'
                ],
                // 'sort',
                 'start:date',
                 'end:date',
                // 'detail:ntext',
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d M Y, H:i'],
                ],
                [
                    'attribute' => 'created_by',
                    'filter' => common\models\User::getListUser(),
                    'value' => 'createdBy.displayname'
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>


    </div><!--box-body pad-->
</div><!--box box-info-->
