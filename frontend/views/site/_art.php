<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
?>

<!-- About Us Page
        ==========================================-->

<section id="workshop">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">ภาพผลงานสะสม</h2>
            <p class="text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Workshop</p>
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
                return $this->render('/../modules/southgallery/views/art/_list_item', ['model' => $model]);
            },
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->

        <?= Html::a(' เพิ่มเติม ', ['/south-gallery/art'], ['class' => 'pull-right wow fadeInDown animated btn btn-primary']) ?>
        <div class="divider"></div>
    </div>
</section>

