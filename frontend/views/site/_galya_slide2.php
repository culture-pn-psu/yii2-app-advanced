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

?>

<div id="galya-slider">
       <div  id="border">
        <?= Html::img($asset->baseUrl . '/assets/images/border_galaya.png') ?>
        </div>
    
        <div class="galya-owl-carousel">
            <?php 
            foreach(Slide::getListSlide(2) as $model):                
            if($model->image):
            ?>
            <div class="item">  
                <?=Html::img($model->image, [
                    'width' => $model->slideCate->width, 
                    'class' => 'img-circle'
                    ])?>
            </div><!--/.item-->
            <?php 
            endif;
            endforeach;?>
            
            
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
