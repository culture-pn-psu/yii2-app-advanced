<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>

<!-- About Us Page
        ==========================================-->

<div id="tf-contact" class="text-center">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="section-title center">
                    <h2>ภาพผลงานสะสม</h2>
                    <div class="line">
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                    <small><em>Workshop</em></small>            
                </div>
            </div>
        </div>




        <div class="row">
            <div class='list-group gallery'>
                <?php Pjax::begin(); ?> 
                <?=
                ListView::widget([
                    'dataProvider' => \backend\modules\artGallery\models\ArtJob::getForIndex(),
                    'options' => [
                        'tag' => 'div',
                        'class' => 'list-wrapper',
                        'id' => 'list-wrapper',
                    ],
                    'layout' => "{items}",
                    'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('/art/_list_item', ['model' => $model]);
            },
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->

        <?= Html::a(' เพิ่มเติม ', ['/south-gallery/art'], ['class' => 'pull-right wow fadeInDown animated btn btn-primary']) ?>
        <div class="divider"></div>
    </div>
</div>

