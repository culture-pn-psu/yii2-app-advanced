<?php

use yii\helpers\Html;
use yii\helpers\Url;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$profile = Yii::$app->user->identity->profile->resultInfo;
?>

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <div class="circle user-bar-img" >
            <img src="<?= $profile->avatar ?>" width="100%" alt="User Image"/>
        </div>
        <span class="hidden-xs"><?= $profile->fullname ?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">

            <div class="circle user-header-img">
                <img src="<?= $profile->avatar ?>" width="100%" alt="User Image"/>
            </div>


            <p>
                <?= $profile->fullname ?>
                <small>Member since Nov. 2012</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?= Url::to(['/account']) ?>" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <?=
                Html::a(
                        'Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                )
                ?>
            </div>
        </li>
    </ul>
</li>