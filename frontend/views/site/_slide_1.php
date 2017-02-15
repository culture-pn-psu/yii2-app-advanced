<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Carousel;

use backend\modules\slide\models\Slide;
use backend\modules\slide\models\SlideSearch;


$slide = Slide::getListSlide(1);
$items = [];
$path = Yii::$app->img->getUploadUrl() . 'slide/';
foreach ($slide as $model) {
    $items[] = [
        'content' => Html::img($model->image, [
            'width' => '100%', 
            'height' => '100%',
            //'class' => 'img-circle'
            ]),
        //'caption' => $model->detail,
//        'options' => [
//            'width' => '185', 'style' => 'height:' . $model->slideCate->height . "px",
//        ],
    ];
}
?>

<section id="main-slider">
        
            <?php 
            
            
        echo Carousel::widget([
            'items' => $items,
            'controls'=>false,
            'showIndicators'=>false,
            'options'=>[
                'navigation'=> false,
                'slideSpeed' => 5000,
                'paginationSpeed' => 500,
                //'class'=>'carousel-fade'
                ],
        ]);
        
            /*
            foreach(Slide::getListSlide(1) as $model):                
            if($model->image):
            ?>
            <div class="item" style="background-image: url(<?=$model->image?>);background-size: 100%;max-height:402px;">                
                <div class="slider-inner">
                    <div class="container">
                        <?=$model->detail?>
                    </div>
                </div>
            </div>
            <!--/.item-->
           
            <?php 
            endif;
            endforeach;
             * 
             */
             ?>     
             
        <!--/.owl-carousel-->
        
<!--        <div class="owl-thumbs" data-slider-id="1">
            <?php 
            foreach(Slide::getListSlide(1) as $model):                
            if($model->image):
            ?>
            <div class="owl-thumb-item" style="background-image: url(<?=$model->image?>);height:<?=$model->slideCate->height?>px; ">                
            </div>/.item
            <?php 
            endif;
            endforeach;?>     
        </div>-->
        <!--/.owl-carousel-->
    </section>
