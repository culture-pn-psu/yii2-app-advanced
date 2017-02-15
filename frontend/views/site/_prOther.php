<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;
use backend\modules\article\models\Article;
use backend\modules\article\models\ArticleCategory;

//$article_category_id = 5;
$arts = Article::find()
        ->where(['article_category_id' => $article_category_id])
        //->orWhere(['( time(display_start) >= '. time() ." AND time(display_start) <=".time()])
        ->orderBy([
            'created_at' => SORT_DESC,
        ])
        ->limit(6)
        ->all();

$artCate = ArticleCategory::findOne($article_category_id);
$link = (isset($link)) ? $link : 'article';


if($arts):
?>


<div class="row">
    <div class="col-sm-12">
        <div class="box">       

            <?= Html::tag('h3', $artCate->title, ['class' => 'column-title text-left wow fadeInDown article-head']) ?>         
            <?php if (!empty($arts)) { ?>
                <div class="row">

                    <?php
                    $items = [];
                    foreach ($arts as $k => $model) {

                        $url = Url::to(['/' . $link . "/" . $model->id]);
                        $items[] = [
                            'label' => '<i class="fa fa-home"></i> ' . $model->title,
                            'encode' => false,
                            'url' => $url,
                        ];
                        ?> 
                        <div class="col-xs-12 col-sm-3">
                            <div class="media row" style="padding-bottom: 10px;">
                                <div class="pull-left col-xs-4" style="padding-top:5px;">
                                    <?php $src = (empty($model->images)) ? Yii::$app->img->getNoImg() : $model->images; ?>
                                    <div class="entry-thumbnail pull-left" style="background-image: url(<?= $src ?>);min-height: 60px;width:100%;background-size: cover;magin-top:15px;">
                                    </div>
                                </div>
                                <div class="media-body col-xs-8" style="padding:0px 5px 0px 10px;">
                                    <div class="media-heading" style="line-height: 17px;font-size: 13px;margin: 0px;height: 35px;max-height: 35px;"">
                                        <?= Html::a($model->title, $url) ?>
                                    </div>
                                    <small class="text-muted">

                                        <i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->asDateTime($model->created_at) ?> 
                                        <i class="fa fa-user"></i> <?= $model->createdBy->displayname ?></small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <?= Html::a(' เพิ่มเติม ', ['/' . $link], ['class' => 'pull-right wow fadeInDown animated btn btn-primary animated']) ?> 
                        <div class="divider"></div>
                    </div>
                </div>
            
            <?php } else { ?>   
                <div class="row">
                    <div class="col-sm-12">
                        ไม่มีข่าว
                         <div class="divider"></div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div> 
</div>


<?php endif; ?>

