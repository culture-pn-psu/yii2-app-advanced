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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=  \yii\helpers\Url::base()?>">
                    <img src="<?= $asset->baseUrl ?>/assets/images/logo_new.png" alt="logo" height="50" class="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <!--                    <ul class="nav navbar-nav">
                                        <li class="scroll active"><a href="#home">Home</a></li>
                                        <li class="scroll"><a href="#features">Features</a></li>
                                        <li class="scroll"><a href="#services">Services</a></li>
                                        <li class="scroll"><a href="#portfolio">Portfolio</a></li>
                                        <li class="scroll"><a href="#about">About</a></li>
                                        <li class="scroll"><a href="#meet-team">Team</a></li>
                                        <li class="scroll"><a href="#pricing">Pricing</a></li>
                                        <li class="scroll"><a href="#blog">Blog</a></li>
                                        <li class="scroll"><a href="#get-in-touch">Contact</a></li>
                                    </ul>-->
                <?php /*
                  $navItems = [
                  ['label' => 'หน้าหลัก', 'url' => ['/']],
                  ['label' => 'รู้จักสถาบัน',
                  'url' => ['site/about'],
                  'options'=>['class'=>'dropdown'],
                  'items' => [
                  ['label' => 'New Arrivals', 'url' => ['product/index']],
                  ],

                  ],
                  ['label' => 'Contact', 'url' => ['site/contact']],
                  ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                  ];
                  echo Menu::widget([
                  'options' => [
                  "class" => "nav navbar-nav"
                  ],
                  'items' => $navItems,
                  'submenuTemplate' => "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n",

                  ]);

                  echo Menu::widget([
                  'options' => [
                  "class" => "nav navbar-nav"
                  ],
                  'items' => [
                  ['label' => 'Home', 'url' => ['site/index']],
                  ['label' => 'About', 'url' => ['site/about']],
                  ['label' => 'Products',
                  'url' => ['product/index'],
                  'options'=>['class'=>'dropdown'],
                  'template' => '<a href="{url}" class="href_class">{label}</a>',
                  'items' => [
                  ['label' => 'New Arrivals', 'url' => ['product/new']],
                  ['label' => 'Most Popular', 'url' => ['product/popular']],
                  ]
                  ],
                  ],
                  'submenuTemplate' => "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n",
                  ]); */ ?>


                <?php
//                [
//                        [
//                            'label' => 'หน้าหลัก',
//                            'url' => ['/'],
//                        //'linkOptions' => [...],
//                        ],
//                        [
//                            'label' => 'รู้จักสถานบันฯ',
//                            'items' => [
//                                ['label' => 'ประวัติความเป็นมา', 'url' => '#'],
//                                ['label' => 'ปณิธาน/วิสัยทัศน์/พันธกิจ', 'url' => '#'],
//                                ['label' => 'วัฒนธรรม/ค่านิยม/สมรรถนะหลัก', 'url' => '#'],
//                                ['label' => 'โครงสร้างองค์กร', 'url' => '#'],
//                                ['label' => 'คณะกรรมการดำเนินงาน', 'url' => '#'],
//                                ['label' => 'คณะกรรมการประจำสถาบันฯ', 'url' => '#'],
//                                ['label' => 'บุคลากร', 'url' => '#'],
//                                ['label' => 'ทำเนียบผู้อำนวยการ', 'url' => '#'],
//                            ],
//                        ],
//                        [
//                            'label' => 'สนับสนุนบริหาร',
//                            'url' => ['site/contact'],
//                            'items' => [
//                                ['label' => 'ข้อบังคับจรรยาบรรบุคลากร', 'url' => '#'],
//                                ['label' => 'ประกันคุณภาพ', 'url' => '#'],
//                                ['label' => 'แผนยุทธศาสตร์', 'url' => '#'],
//                                ['label' => 'KPIs พ.ศ. 2555-2558', 'url' => '#'],
//                                ['label' => 'เอกสารและแบบฟอร์ม', 'url' => '#'],
//                            ],
//                        //'linkOptions' => [...],
//                        ],
//                        [
//                            'label' => 'หอศิลป์และพิพิธภัณฑ์',
//                            'url' => ['site/contact'],
//                            'items' => [
//                                ['label' => 'หอศิลป์ภาคใต้', 'url' => '#'],
//                                ['label' => 'หอวัฒนธรรมภาคใต้', 'url' => '#'],
//                                ['label' => 'เรือนอำมาตย์โท', 'url' => '#'],
//                                ['label' => 'พิพิธภัณฑ์พระเทพญาณโมลี', 'url' => '#'],
//                                ['label' => 'ห้องอินโดนิเซียศึกษา', 'url' => '#'],
//                            ],
//                        //'linkOptions' => [...],
//                        ],
//                    ],




                /*
                $nav = new common\models\Navigate();
//                $modelMenu = Yii::$app->andacms->getChildModule('menu')->getDataMenu(1);
//                echo \kuakling\smartmenus\Gen::widget([
//                    'items'=>$modelMenu,
//                    'options' => ['class' => 'nav navbar-nav'],
//                        ]);
                echo Nav::widget([
                    'items' => $nav->menu(2),
                    'options' => ['class' => 'nav navbar-nav'], // set this to nav-tab to get tab-styled navigation
                ]);*/
                ?>

                <?php #=languageSwitcher::Widget();?>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header>
