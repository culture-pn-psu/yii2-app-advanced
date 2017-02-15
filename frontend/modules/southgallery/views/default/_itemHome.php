<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-sm-4">
    <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
        <article class="media clearfix">

            <div class="entry-thumbnail pull-left">
                <?php $src = (empty($model->images)) ? Yii::$app->img->getNoImg() : $model->images; ?>
                <img class="img-responsive" src="<?= $src ?>" alt="<?= $model->title ?>" />
            </div>


            <div class="media-body">
                <header class="entry-header">
                    <h3 class="entry-title"><?= Html::a($model->title, $url) ?></h3>
                </header>
                
                <div class="entry-content"> 
                    <?= $model->summary ?>
                </div>

                <footer class="entry-meta">
                    <small>
                        <span class="entry-author">
                            <i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asDateTime($model->created_at, 'medium') ?>
                        </span>

                        <?php if ($model->created_by): ?>
                            <span class="entry-author"><i class="fa fa-pencil"></i> <a href="#"><?= $model->createdBy->displayname ?></a></span>
                        <?php endif ?>
                        <span class="entry-category"><i class="fa fa-folder-o"></i> <a href="#"><?= $model->articleCategory->title ?></a></span>
                    </small>

                </footer>

            </div>
        </article>
    </div>
</div>