<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//use yii\widgets\ListView;
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use backend\modules\slide\models\Slide;

$slide = Slide::getListSlide(2);
$items = [];
$path = Yii::$app->img->getUploadUrl() . 'slide/';
foreach ($slide as $model) {
    $items[] = [
        'content' => Html::img($model->img, ['width' => $model->slideCate->width, 'class' => 'img-circle']),
        //'caption' => $model->detail,
        'options' => ['width' => '185', 'style' => 'height:' . $model->slideCate->height . "px",
        ],
    ];
}
?>

 <?php
        echo Carousel::widget([
            'items' => $items,
            'controls'=>false,
            'showIndicators'=>false,
            'options'=>[
                'navigation'=> false,
                'slideSpeed' => 500,
                 'paginationSpeed' => 500,
                ],
        ]);
        ?>
<div class="galya_slide">
    <div   id="border">
        <?= Html::img($asset->baseUrl . '/assets/images/border_galaya.png') ?>
    </div>
    <div  id="carousel_content">

        
    </div>
</div>


<?php
$this->registerCss("
      
.galya_slide{
    overflow: hidden;
    position: relative;    
    width: 100%;
    min-height: 245px;
    
}
 .galya_slide #border{       
    position: absolute;
    z-index: 99;
    width: 100%;
    height: auto;
 }
 .galya_slide #carousel_content{
    padding:20px;
 }
 .galya_slide #carousel_content .carousel-indicators{
    display:none;
 }
 .galya_slide #carousel_content .carousel-control{
    display:none;
 }


");
