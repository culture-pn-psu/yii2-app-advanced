<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use culturePnPsu\album\models\Album;
use culturePnPsu\album\models\AlbumCategory;

$tbAlbumCate = AlbumCategory::find()->all();
?>


<section id="portfolio">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">ภาพกิจกรรม</h2>
<!--                <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
        </div>

        <!--        <div class="text-center">
                    <ul class="portfolio-filter">
                        <li><a class="active" href="#" data-filter="*">All Works</a></li>
        <?php foreach ($tbAlbumCate as $model): ?>
                                <li><a href="#" data-filter=".<?= $model->title ?>"><?= $model->title ?></a></li>
        <?php endforeach; ?>
                    </ul>
                </div>-->

        <div class="row">
            <!--            <div class="col-sm-12">
                            <div class="portfolio-items">-->
            <?php
            foreach (Album::getIndex() as $model) {

                $urlImg = Yii::$app->img->getUploadUrl(Album::UPLOAD_FOLDER);
                $album_detail = strip_tags($model->detail);
                $album_detail = BaseStringHelper::truncate($album_detail, 50);
                ?>



    <!--                        <div class="portfolio-item <?= $model->category_id ?>">
                                <div class="portfolio-item-inner">
                                    <img class="img-responsive" src="<?= $model->imgTemp ?>" alt="">
                                    <div class="portfolio-info">
                                        <h3><?= Html::a($model->title, Url::to(['/album', 'id' => $model->id])) ?></h3>
                <?= Html::tag('small', $album_detail); ?>


                                        <a class="preview" href="<?= $urlImg . $model->imgTemp ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>-->


                <div class='col-xs-12 col-sm-4 col-md-3 col-lg-3' >
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
            <!--                </div>
                        </div>-->
        </div>

        <?= Html::a(' เพิ่มเติม ', ['/album'], ['class' => 'pull-right wow fadeInDown animated btn btn-primary']) ?>


    </div>
</section>
<!--/#portfolio-->