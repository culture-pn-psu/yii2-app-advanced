<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\album\models\Album */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('album', 'Albums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
        <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
    </div><!--box-header -->

    <div class='box-body pad'>
        <div class="album-view">

            <!--<h1><?= Html::encode($this->title) ?></h1>-->

            <p>
                <?= Html::a(Yii::t('album', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?=
                Html::a(Yii::t('album', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('album', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ])
                ?>
            </p>
            <div class='row'>
                <div class='col-sm-3' >
                    <?= Html::img($model->imgTemp, ['class' => 'thumbnail', 'width' => '100%']) ?> 
                </div>
                <div class='col-sm-9'>
                    <div class='row'>
                        <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails()]); ?>
                    </div>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            
                          
                            'title', 
                            'category.title',
                            'statusLabel',
                            'detail:ntext',
                            'created_at',
                            'created_by',
                            'updated_at',
                            'updated_by',
                        ],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
