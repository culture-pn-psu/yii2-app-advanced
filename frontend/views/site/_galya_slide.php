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

$slide = Slide::getListSlideGalya(2);
$items = [];
$path = Yii::$app->img->getUploadUrl() . 'slide/';
foreach ($slide as $model) {
    $items[] = [
        'content' => Html::img($model->image, ['width' => $model->slideCate->width, 'class' => 'img-circle']),
        //'caption' => $model->detail,
        'options' => ['width' => '185', 'style' => 'height:' . $model->slideCate->height . "px",
        ],
    ];
}
?>

<div id="galya-slider">
       <div  id="border">
        <?= Html::img($asset->baseUrl . '/assets/images/border_galaya.png') ?>
        </div>
    
        <div class="galya-owl-carousel">
             <?php
        echo Carousel::widget([
            'items' => $items,
            'controls'=>false,
            'showIndicators'=>false,
            'options'=>[
                'navigation'=> false,
                'slideSpeed' => 5000,
                'paginationSpeed' => 500,
                'class'=>'carousel-fade'
                ],
        ]);
        ?>
            
            
        </div><!--/.owl-carousel-->
    </div>




<?php 
$this->registerCss("
      
#galya-slider{
    overflow: hidden;
    position: relative;    
    width: 185px;
    height:250px;  
    margin: 20px auto 0px;
}
 #galya-slider #border{       
    position: absolute;
    z-index: 20;
    width: 100%;
    height: auto;
 }
 #galya-slider .galya-owl-carousel{
    padding:25px 20px;
 }
/* .owl-item{
    display:none;
 }
 
.owl-wrapper{
    border-radius:20px;
}*/



");
