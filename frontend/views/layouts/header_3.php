<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\Nav;

#use common\components\languageSwitcher;
?>


<header id="header">

    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <!--            <div class="navbar-header pull-left">                
                            <a class="navbar-brand" href="<?= \yii\helpers\Url::base(true); ?>">
                                <img src="<?= $asset->baseUrl ?>/assets/images/logo_new.png" alt="logo" class="logo" height="50"></a>
                        </div>-->

            <div class="navbar-header pull-left">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= \yii\helpers\Url::base(true); ?>">
                    <img src="<?= $asset->baseUrl ?>/assets/images/logo_new.png" alt="logo" class="logo" width="100%" />
                </a>
            </div>
            <!--            <div class="collapse navbar-collapse navbar-right">-->


            
            <div id="more-menu-2" class="pull-right dropdown">
                <a href="#" class="dropdown-toggle btn navbar-btn btn-link" data-toggle="dropdown"><i class="fa fa-list-alt"></i>  
                </a>
                <ul class="dropdown-menu nav navbar-nav">            
                </ul>
            </div>
            
            <?php
            $nav = new common\models\Navigate();
            $menu = $nav->menu(2);
//                    $menu[] = [
//                        'label' => false,
//                        //'encode' => false,
//                        //'url' => (strpos($val->router, 'http') === false) ? [$val->router] : $val->router,
//                        //'visible' => $visible,
//                        //$visible,
//                        'options' => ['id' => 'more-menu'],
//                            //'items' => $items
//                    ];
            echo Nav::widget([
                'items' => $menu,
                'options' => ['class' =>
                    'nav navbar-nav pull-right',
                    'data-toggle' => 'collapse-nav',
                    'data-target' => '#more-menu-2',
                    'data-width-offset' => '.navbar-header, #more-menu-2'
                ], // set this to nav-tab to get tab-styled navigation
            ]);
            ?>

            



        </div><!--/.container-->
    </nav><!--/nav-->
</header>
