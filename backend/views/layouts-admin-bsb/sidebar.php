<?php
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\Menu;
//use dmstr\widgets\Menu;
use backend\views\layouts\Menu;


?>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        
        <?=$this->render('user_profile')?>
        <!-- Menu -->
        <div class="menu">
            <?php
            $items[] = [
                'label'=>'MAIN NAVIGATION',
                'options' => ['class' => 'header'],
                ];
                
            $items[] = [
                'label'=>'หน้าแรก',
                'url'=>'javascript:void(0);',
                'icon'=>'home',
                'items' => [
                            [
                            'label'=>'หน้าแรก',
                            'url'=>Url::to(['/']),
                            'icon'=>'home',
                        
                        ]
                    ]
                ];
                
                    
            $items[] = [
                'label'=>'จัดการแหล่งเรียนรู้',
                'url'=>Url::to(['/learning-center']),
                'icon'=>'book',
                
                ];
            
            
            echo Menu::widget([
                'options' => ['class' => 'list'],
                'iconClass' => 'material-icons',
                //'labelTemplate'=>'{icon}<span>{label}</span>',
                'linkTemplate' => '<a href="{url}" class="waves-effect waves-block">{icon}{label}</a>',
                'items'=>$items
                ]);
            ?>
             
           
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?= date('Y')?> <a href="javascript:void(0);">Tsun Yii2</a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>




