<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\Nav;

#use common\components\languageSwitcher;
?>


<header id="header">
    
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header pull-left">                
                <a class="navbar-brand" href="<?= \yii\helpers\Url::base(true); ?>">
                <img src="<?= $asset->baseUrl ?>/assets/images/logo_new.png" alt="logo" class="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
               
                <?php 
                $nav = new common\models\Navigate();

                echo Nav::widget([
                    'items' => $nav->menu(2),
                    'options' => ['class' => 'nav navbar-nav pull-left', 'data-toggle' => 'collapse-nav','data-target'=>'#more-menu-2','data-width-offset'=>'.navbar-header, #more-menu-2'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>

                <div id="more-menu-2" class="pull-right dropdown">
                    <a href="#" class="dropdown-toggle btn navbar-btn btn-link" data-toggle="dropdown">more+
                    </a>
                   
                </div>
                <?php #=languageSwitcher::Widget();?>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
    
</header>
