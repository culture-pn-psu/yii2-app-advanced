<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;


$this->title = Yii::t('album', 'อัลบั้ม');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class='row'>
    <div class='col-sm-12' id="portfolio" style="background: #fff;padding:0px;">      


            <div class="text-left" >
                <h2 class="section-title text-left wow fadeInDown">ภาพกิจกรรม</h2>
                <ul class="portfolio-filter">
                    <li><a class="active" href="#" data-filter="*">All Works</a></li>
                    <?php foreach($modelCate as $model):?>
                    <li><a href="#" data-filter=".<?=$model->id?>"><?=$model->title?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="portfolio-items">
            <?php
            
            
                foreach($modelAlbum as $model){
                    
                    
                    $album_detail = strip_tags($model->detail);
                    $album_detail = BaseStringHelper::truncate($album_detail,50);
                    ?>
            
            
          
<!--                <div class="portfolio-item <?=$model->category_id?>">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="<?=$model->imgTemp?>" alt="">
                        <div class="portfolio-info">
                            <h2><?=Html::a('<i class="fa fa-eye"></i> '.$model->title,Url::to(['/album','id'=>$model->id]))?></h2>
                           <?=Html::tag('small',$album_detail);?>
                        </div>
                    </div>
                </div>-->
                
                <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4' >
                    <a class="thumbnail fancybox" rel="ligthbox" href="<?= Url::to(['/album/' . $model->id]) ?>">
                        <div  style="float: left;overflow: hidden;height: 150px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #efefef;">
                            <?= Html::img($model->imgTemp, [ 'width' => '100%', 'class' => 'center-block img-responsive']) ?>
                        </div>
                        <div class='text-left' style="margin:5px 5px 15px 5px;">
                            <div class='text-left' style="height:55px;width: 100%;overflow: hidden;">
                                <?= Html::tag('h5', $model->title, ['style' => 'margin-bottom:0px;']) ?>
                            </div>
                            <small class='text-muted'>
                                <?= $model->categoryTitle ?> - <?= Yii::$app->formatter->asDate($model->start) ?>
                            </small>

                        </div> <!-- text-right / end -->
                    </a>
                </div> <!-- col-6 / end -->

             <?php
                }
            
            ?>
        </div>
        
    </div>
 </div>
<!--/#portfolio-->