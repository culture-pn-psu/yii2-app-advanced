<?php

use yii\helpers\Html;
use yii\helpers\BaseStringHelper;

/* @var $this \yii\web\View */
/* @var $content string */

$controller = $this->context;
//$menus = $controller->module->menus;
//$route = $controller->route;
?>
<?php $this->beginContent('@app/views/layouts/main.php') ?>

<div class="row">
    <div class="col-md-3">

        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('album', 'สร้างอัลบั้ม'), ['/album/default/create'], ['class' => 'btn btn-primary btn-block margin-bottom']) ?>


        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?= Yii::t('album', 'อัลบั้ม'); ?>
                </h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">

                <?php
                $nav = new common\models\Navigate();
                echo dmstr\widgets\Menu::widget([
                    'options' => ['class' => 'nav nav-pills nav-stacked'],
                    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                    'items' => $nav->menu(12),
                ])
                ?>                 

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /. box -->
        
        
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?= Yii::t('album', 'หมวดหมู่อัลบั้ม'); ?>
                </h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">

                <?php
                $nav = new common\models\Navigate();
                echo dmstr\widgets\Menu::widget([
                    'options' => ['class' => 'nav nav-pills nav-stacked'],
                    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                    'items' => [
                        [
                            'label' => 'หมวดหมู่ทั้งหมด',
                //'encode' => false,
                //'icon' => $val->icon,
                'url' => ['/album/category'],
                //'visible' => $visible,
                //$visible,
                //'items' => $items
                        ]
                    ],
                ])
                ?>                 

            </div><!-- /.box-body -->
        </div><!-- /. box -->
        
        
        
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <?= $content ?>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>


<?php $this->endContent(); ?>
