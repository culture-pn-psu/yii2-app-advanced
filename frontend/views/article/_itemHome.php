<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-sm-4">
    <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
        <article class="media clearfix">
            <?php $src = (empty($model->images)) ? Yii::$app->img->getNoImg() : $model->images; ?>
            <div class="entry-thumbnail pull-left" style="background-image: url(<?= $src ?>);">
            </div>


            <div class="media-body">
                <header class="entry-header">
                    <h2 class="entry-title"><?= Html::a($model->title, $url) ?></h2>
                </header>

                <div class="entry-content"> 
                    <?= $model->summary ?>
                </div>
                <small>
                    <span class="entry-author">
                        <i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asDateTime($model->created_at, 'medium') ?>
                    </span>

                    <?php if ($model->created_by): ?>
                        <span class="entry-author"><i class="fa fa-pencil"></i> <a href="#"><?= $model->createdBy->displayname ?></a></span>
                    <?php endif ?>
                    <span class="entry-category"><i class="fa fa-folder-o"></i> <a href="#"><?= $model->articleCategory->title ?></a></span>
                </small>

            </div>
        </article>
    </div>
</div>