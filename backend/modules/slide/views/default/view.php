<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\slide\models\Slide */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->
    
    <div class='box-body pad'>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
    <div class="col-sm-12">
        <div class="owl-carousel">
        <div class="item img-thumbnail img_id" style="background-image: url(<?=$model->image?>);height: <?=$model->slide_cate_id?$model->slideCate->height:100?>px;">
                <div class="slider-inner">
                    <div class="container" id="slide_detail">
                        <?=$model->detail?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'title', 
        [
                'attribute' => 'slide_cate_id',
                'value' => $model->slideCate->title
            ],
           // 'img_id',
            'link',
            [
                'attribute' => 'status',
                'value' => $model->statusLabel
            ],
            'sort',
            'start:date',
            'end:date',
            'detail:ntext',
            'created_at:date',
            [
                'attribute' => 'created_by',
                'value' => $model->created_by?$model->createdBy->displayname:null
            ],
        ],
    ]) ?>


    </div><!--box-body pad-->
 </div><!--box box-info-->
