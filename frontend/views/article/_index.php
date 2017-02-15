<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Articles';
$url = Url::to(['/article/view' ,'id'=> $model->id]);
?>


<div class="media row">
    <div class="pull-left col-xs-4" style="padding-top:5px;">
        <?php $src = (empty($model->images)) ? Yii::$app->img->getNoImg() : $model->images; ?>
        <div class="entry-thumbnail pull-left" style="background-image: url(<?= $src ?>);min-height: 120px;width:100%;background-size: cover;magin-top:15px;">
        </div>
    </div>
    <div class="media-body col-xs-8" style="padding:0px 5px 0px 10px;">
        <div class="media-heading" style="line-height: 17px;font-size: 13px;margin: 0px;">
            <?= Html::tag('h4',Html::a($model->title, $url)) ?>
            <p>
                <?= $model->summary ?>
            </p>
            <a class="btn btn-primary btn-xs" href=<?= $url?>>
                <?= yii::t('app', 'อ่านต่อ'); ?> <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
        <small class="text-muted">
            <i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asDateTime($model->created_at) ?> 
            <i class="fa fa-user"></i> <?= $model->createdBy->displayname ?>
        </small>

    </div>
</div>


<hr class="article-devider">
