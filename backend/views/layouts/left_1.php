<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;

//$callback = function($menu){
//    $data = eval($menu['data']);
//    //print_r($data);
//    return [
//        'label' => $menu['name'].$data, 
//        'url' => [$menu['route']],
//        //'options' => $data,
//        'icon' => $data['icon'],
//        'items' => $menu['children'],
//        
//    ];
//};
//
//$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
//print_r($items);
//echo "<pre>";
//print_r(Yii::$app->getAuthManager()->getPermissions());
//echo "</pre>";
?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->displayname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php
//        if (Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'theCreator')) {
//            echo 'ok';
//        } else {
//            echo 'not allow';
//        }
//        Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'admin')
//        Yii::$app->user->can('admin')
//        
//        dmstr\widgets\Menu::widget([
//            'options' => ['class' => 'sidebar-menu'],
//            'items'=>$items
//        ]);
        $activity = ['label' => 'กิจกรรม', 'icon' => 'fa fa-cog', 'url' => ['/slide'],
                'visible' => Yii::$app->user->can('admin'),
                'items' => [
    ['label' => 'จัดการกิจกรรม', 'icon' => 'fa fa-doc', 'url' => ['/activity/default'],],
    ['label' => 'จัดการปฎิทิน', 'icon' => 'fa fa-doc', 'url' => ['/activity/calendar'],'visible' => Yii::$app->user->can('admin'),
                    ]
                ]
            
        ];
        $slide = ['label' => 'สไลด์', 'icon' => 'fa fa-cog', 'url' => ['/slide'],
                'visible' => Yii::$app->user->can('admin'),
                'items' => [
    ['label' => 'จัดการสไลด์', 'icon' => 'fa fa-doc', 'url' => ['/slide/default'],],
    ['label' => 'จัดการประเภทสไลด์', 'icon' => 'fa fa-doc', 'url' => ['/slide/category'],'visible' => Yii::$app->user->can('admin'),
                    ]
                ]
            
        ];
        $article = ['label' => 'ประชาสัมพันธ์/บทความ', 'icon' => 'fa fa-cog', 'url' => ['/article'],
                'visible' => Yii::$app->user->can('manageArticle'),
                'items' => [
    ['label' => 'จัดการบทความ', 'icon' => 'fa fa-doc', 'url' => ['/article/default'],],
    ['label' => 'จัดการประเภทบทความ', 'icon' => 'fa fa-doc', 'url' => ['/article/category'],'visible' => Yii::$app->user->can('admin'),
                    ]
                ]
            
        ];
        
        
        $system = ['label' => 'System', 'icon' => 'fa fa-cog', 'url' => ['#'],
                            'visible' => Yii::$app->user->can('admin'),
                            'items' => [



                                ['label' => 'จัดการไฟล์', 'icon' => 'fa fa-users', 'url' => ['/file'],
                                    'visible' => Yii::$app->user->can('admin')
                                ],
                                ['label' => 'จัดการผู้ใช้', 'icon' => 'fa fa-users', 'url' => ['/user'],
                                    'visible' => Yii::$app->user->can('admin')
                                ],
                                ['label' => 'จัดการสิทธิ์', 'icon' => 'fa fa-hand-stop-o', 'url' => ['/rbac'],
                                    'visible' => Yii::$app->user->can('admin')
                                ],
//                        ['label' => 'Menu Yii2', 'options' => ['class' => 'header'],
//                            'visible' => Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'theCreator')
//                        ],
                                ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],
                                    'visible' => Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'admin')],
                                ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],
                                    'visible' => Yii::$app->authManager->checkAccess(Yii::$app->user->id, 'admin')],
                            ],
                        ];
        
        
        
        ?>        
        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                    'items' => [
                        $activity,
                        $slide,
                        $article,
                        $system,
                    ],
                ]
        )
        ?>

    </section>

</aside>
