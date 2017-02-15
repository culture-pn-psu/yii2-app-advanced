<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use common\models\Navigate;
?>


<section id="footer_link">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4 center">
                <div class="wow zoomIn animated" data-wow-duration="400ms" data-wow-delay="200ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 200ms; animation-name: zoomIn;">
                    <?php
                    $nav = new Navigate();

                    echo dmstr\widgets\Menu::widget([
                        'items' => $nav->menu(13),
                        'options' => ['class' => ''], // set this to nav-tab to get tab-styled navigation
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="wow zoomIn animated" data-wow-duration="400ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 400ms; animation-name: zoomIn;">

                    <?php
                    echo dmstr\widgets\Menu::widget([
                        'items' => $nav->menu(14),
                        'options' => ['class' => ''], // set this to nav-tab to get tab-styled navigation
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="wow zoomIn animated" data-wow-duration="400ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 600ms; animation-name: zoomIn;">
                   <?php
                    echo dmstr\widgets\Menu::widget([
                        'items' => $nav->menu(15),
                        'options' => ['class' => ''], // set this to nav-tab to get tab-styled navigation
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
