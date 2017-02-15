<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
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
        
        <div class="col-sm-2">
            <?=Html::img($model->image,['width'=>'100%'])?>            
        </div>
        <div class="col-sm-10">
    <?= DetailView::widget([
        'model' => $model,
        'template' => "<tr><th width='100' nowrap='' >{label}</th><td >{value}</td></tr>",
        'attributes' => [
            //'id',
            
            'title',
            [
                'attribute'=>'article_category_id',                
                'value' => $model->articleCategory->title
            ],
            [
                'attribute'=>'tags',
                'format'=>'raw',
                'value' => $model->tagsLabel
            ],
            //'images',
            'summary:ntext',
            //'content:ntext',
            [
                'attribute' =>'content',
                'format'=>'html',
                'value'=>$model->content
            ],
            [
                'attribute' =>'status',
                'format'=>'html',
                'value'=>$model->statusLabel
            ],
            'created_at:datetime',
            [
                'attribute' =>'created_by',
                'value'=>$model->created_by?$model->createdBy->displayname:null
            ],
            'updated_at:datetime',
            [
                'attribute' =>'updated_by',
                'value'=>$model->updated_by?$model->updatedBy->displayname:null
            ],
            'language',
            'display_start:datetime',
            'display_finish:datetime',
        ],
    ]) ?>
</div>
    </div>

    </div><!--box-body pad-->
 </div><!--box box-info-->
