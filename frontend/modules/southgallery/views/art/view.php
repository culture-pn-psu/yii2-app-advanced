<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use dosamigos\gallery\Carousel;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $model backend\modules\artGallery\models\ArtJob */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('art', 'หอศิลป์ภาคใต้'), 'url' => ['/south-gallery']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('art', 'ผลงานทั้งหมด'), 'url' => ['/south-gallery/art']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <!--    <div class='box-header'>
            <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
        </div>box-header -->

    <div class='box-body pad'>

        <div class="row">
            <div class="col-sm-9 col-md-push-3">                          
                <?= Html::tag('h3', Yii::t('app', 'ภาพผลงาน')) ?>
                <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails()]); ?>
                <br />


                <?=
                DetailView::widget([
                    'model' => $model,
                    'options' => ['class' => 'table'],
                    'template' => '<tr><th class="text-right text-nowrap" width="100">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        'title',
                        'concept:ntext',
                        [
                            'attribute' => 'size',
                            'value' => $model->sizeUnit
                        ],
                        'artType.title',
                        'artTechnique.title',
                        'art_code',
                        'note:ntext',
                    //'artist',
                    //'image_id',
                    ],
                ])
                ?>
            </div>
            <div class="col-sm-3  col-md-pull-9"> 

                <div class="row"> 
                    <div class="col-xs-3 col-sm-12"> 
                        <?= Html::img($model->artist->ImgTemp, ['class' => 'thumbnail', 'style' => '', 'width' => '100%']) ?>
                    </div>
                    <div class="col-xs-9 "> 
                        <?=
                        DetailView::widget([
                            'model' => $model->artist,
                            'options' => ['class' => 'table'],
                            'template' => '<tr><th class="text-right text-nowrap">{label}</th><td>{value}</td></tr>',
                            'attributes' => [
                                'fullname',
                                [
                                    'attribute' => 'sex',
                                    'value' => $model->artist->sexLabel
                                ],
                            //'image_id',
                            ],
                        ])
                        ?>

                    </div>
                </div>
            </div>
        </div>


    </div><!--box-body pad-->
</div><!--box box-info-->