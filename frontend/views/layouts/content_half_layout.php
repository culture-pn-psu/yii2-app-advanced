<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

?>

<section id="cta2">
        <div class="container">
            <div class="text-center">
                <img class="img-responsive wow fadeIn" src="<?=$asset->baseUrl?>/assets/images/cta2/cta2-img.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms" />
            </div>
        </div>
 </section>

<section id="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?=Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);?>
         </div>
        </div>
    </div>
</section>

<section id="articles">
    <div class="container">
        
        <div class="row">
            <div class="col-xs-12 col-sm-9 col-md-8" id="content" >
            
                
                
            <?= Alert::widget() ?>
            <?= $content ?>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-4">
                <?=$this->render('/site/_galya_slide',['asset'=>$asset])?>       
                <?=$this->render('/site/_calendar_widget')?>       
                <?=$this->render('/site/_link')?>       
            </div>
        </div>
    </div>
</section>


