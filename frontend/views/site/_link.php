<?php

use yii\helpers\Html;
?>


<?= Html::tag('h3', 'ลิงค์', ['class' => 'column-title text-left wow fadeInDown article-head']) ?>
<!--<div class="well well-sm no-shadow">-->
<div class=" no-shadow">
    
    <?php
                    $nav = new common\models\Navigate();

                    echo dmstr\widgets\Menu::widget([
                        'items' => $nav->menu(3),
                        'options' => ['class' => 'nav'], // set this to nav-tab to get tab-styled navigation
                    ]);
                    ?>  
<!--                    <ul class="nav nav-pills nav-stacked">
                        
                        <li class="header">Link</li>
                        
                        <li>
                            <a href="http://intranet.pn.psu.ac.th/" target="_blank">
                                <i class="fa fa-yelp"></i> Intranet
                            </a>
                        </li>
                       
                        
                        
                        
                        <li>
                            <a href="https://www.youtube.com/user/culture.pn" target="_blank">
                                <i class="fa fa-video-camera"></i> culture
                            </a>
                        </li>
                        
                    </ul>-->
<br />
                </div>			