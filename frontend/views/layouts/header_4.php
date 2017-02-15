<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\Nav;

#use common\components\languageSwitcher;
?>


<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="<?= \yii\helpers\Url::base(true); ?>">
                    <img src="<?= $asset->baseUrl ?>/assets/images/logo_new.png" alt="logo" class="logo"></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                

                <?php

                $nav = new common\models\Navigate();

                echo Nav::widget([
                    'items' => $nav->menu(2),
                    'options' => ['class' => 'nav navbar-nav navbar-right'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>
               
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header>
