<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Url;
use yii\helpers\Html;
use backend\modules\slide\models\Slide;
use backend\modules\slide\models\SlideSearch;
use wadeshuler\sliderrevolution\SliderRevolution;
?>


<section id="main-slider">

    <?php
    $item = [];
    foreach (Slide::getListSlide(1) as $model):
        if ($model->image):
            $item[] = [
                'options' => ['data' => ['transition' => 'fade', 'slotamount' => '2', 'masterspeed' => '1500']],
                'image' => [
                    'src' => $model->image,
                    'options' => [
                        'alt' => 'slidebg1',
                        'data' => [
                            'bgfit' => 'contain',
                            'bgposition' => 'center center',
                            'bgrepeat' => 'no-repeat'
                        ]
                    ]
                ],
                'layers' => [
//                    [
//                        'options' => ['class' => 'tp-caption lft', 'data' => ['x' => 'center', 'y' => 'top', 'hoffset' => '0', 'voffset' => '50', 'speed' => '2500', 'start' => '1200', 'easing' => 'Power4.easeOut', 'endspeed' => '300', 'endeasing' => 'Power1.easeIn', 'captionhidden' => 'off'], 'style' => 'z-index: 6'],
//                        'content' => $model->detail
//                    ]
                ],
            ];
        endif;
    endforeach;
    $slides = $item;

    //print_r($slides);
//exit();
    $config = [
        'delay' => 9000,
        //'startwidth' => 1140,
        'startheight' => 400,
        'hideThumbs' => 10,
        'fullWidth' => '"on"',
        'fullScreen' => '"off"',
        'fullScreenAlignForce' => '"off"',
        'forceFullWidth' => '"on"',
        'autoHeight' => '"off"',
        //'touchenabled' => '"on"',
        //'navigationArrows'=>'"solo"',
        'navigationStyle' => '"square"',
        'hideArrowsOnMobile' => '"off"',
        'soloArrowLeftHOffset' => '160',
        'soloArrowRightHOffset' => '160',
            //'dottedOverlay'=>'"twoxtwo"',
            //'autoHeight'=>'"on"',
            //'fullScreenOffsetContainer'=>"''"
    ];
    $container = ['class' => 'tp-banner-container'];
    $wrapper = ['class' => 'tp-banner'];
    $ulOptions = ['class' => 'my-ul'];
    echo SliderRevolution::widget([
        'config' => $config,
        'container' => $container,
        'wrapper' => $wrapper,
        'ulOptions' => $ulOptions,
        'slides' => $slides
    ]);
    ?>     


</section>
