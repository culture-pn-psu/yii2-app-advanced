<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">' . Html::img($asset->baseUrl . "/images/icon.png") . '</span><span class="logo-lg">' . Html::img($asset->baseUrl . "/images/logo_banner.png") . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?= Yii::$app->notification->count() ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (Yii::$app->notification->count()): ?>
                            <li class="header">You have <?= Yii::$app->notification->count() ?> notifications</li><?php endif; ?>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <?php
                                // print_r(Yii::$app->notification->view());

                                foreach (Yii::$app->notification->view() as $model):
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['/site/notification', 'id' => $model->id]) ?>">
                                            <?php
                                            $str = Html::beginTag('div', ['class' => 'user-circle'])
                                                    . Html::beginTag('div', ['class' => 'circle', 'style' => ''])
                                                    . Html::img($model->sentedBy->img, ['class' => '', 'style' => ''])
                                                    . Html::endTag('div')
                                                    . Html::beginTag('span', ['class' => 'username', 'style' => ''])
                                                    . Html::tag('b', $model->sentedBy->displayname)
                                                    . Html::endTag('span')
                                                    . Html::beginTag('span', ['class' => '', 'style' => 'display: block;margin-left: 50px;'])
                                                    . $model->title
                                                    . Html::endTag('span')
                                                    . Html::beginTag('span', ['class' => 'description', 'style' => 'display: block;margin-left: 50px;'])
                                                    . '<i class="fa fa-clock-o"></i> ' . Yii::$app->formatter->asDatetime($model->sented_at)
                                                    . Html::endTag('span')
                                                    . Html::endTag('div');
                                            echo $str;
                                            ?>                                           

                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="footer"><a href="<?= Url::to(['/site/notification']) ?>">View all</a></li>
                    </ul>
                </li>


                <li>
                    <?=Html::a('<i class="fa fa-home"></i>',Yii::$app->urlManagerFrontend->createUrl(['/site']))?>
                   
                </li>

                

                <!-- User Account: style can be found in dropdown.less -->
                <!--                <li>
                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                </li>-->
                
                <?=$this->render('_user')?>
                
            </ul>
        </div>
    </nav>
</header>
