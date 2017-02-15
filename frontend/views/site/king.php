<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "พระผู้เสด็จสู่สวรรคาลัย::".Yii::$app->name;
$css = " 
      #page1{
       background: #363636 url(" . Yii::$app->img->getUploadUrl() . "/splash/king-bg.png) no-repeat 50% 0;
        background-size:cover;       
      }
       
     


";
$this->registerCss($css);
?>
<!--มหกรรม-->
<section id="page1">
    <div class="overlay"></div>
    <div class="content">
        <div class="container clearfix">
            <!--            <h3 class="heading">ยินดีต้อนรับเข้าสู่งานมหกรรมศิลปวัฒนธรรม ครั้งที่ 24</h3>-->
            <div class="row">
                <div class="col-md-12">
                    <div style="position: relative;" >
                        <?= Html::img(Yii::$app->img->getUploadUrl() . '/splash/king.png', ['width' => '90%']); ?> 
                        <div class="text-center hidden-xs" style="position: absolute;bottom: 55px; display: inline-block; float: left; margin: 0 auto; left: 0;right: 0;">
                            <?= Html::a('เข้าสู่เว็บไซต์', ['site/index'], ['class' => 'btn btn-link text-center btn-a', 'style' => 'color:#fff;border:2px solid #c7ac17;border-radius: 10px; box-shadow: 0px 1px 3px #c7ac17; font-size: 16px;']) ?> 
                        </div>
                    </div>
                    <div class="text-center hidden-md hidden-sm hidden-lg" >
                        <?= Html::a('เข้าสู่เว็บไซต์', ['site/index'], ['class' => 'btn btn-link text-center btn-a', 'style' => 'color:#fff;border:2px solid #c7ac17;border-radius: 10px; box-shadow: 0px 1px 10px 5px #c7ac17; font-size: 16px;']) ?> 
                    </div>
                </div>
           
            </div>


        </div>
    </div>

</section>

