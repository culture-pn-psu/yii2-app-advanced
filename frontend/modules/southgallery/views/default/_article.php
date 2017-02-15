<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;
use backend\modules\article\models\Article;
use backend\modules\article\models\ArticleCategory;

$arts = Article::find()->joinWith('articleTags')->where(['article_category_id' => $article_category_id, 'article_tag.tag_id' => [3]])->all();
$artCate = ArticleCategory::findOne($article_category_id);
$link = (isset($link)) ? $link : '/article';
?>
<?php if (!empty($arts)) { ?>
    <div class="section-title">                   
        <?= $artCate->parent ? Html::tag('h4', $artCate->parent->title) : '' ?>
        <?= Html::tag('h2', $artCate->title) ?>
        <hr>
        <div class="clearfix"></div>
    </div>

    <div class="box">      
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <?php
                        foreach ($arts as $k => $model) {
                            $url = Url::to([$link, 'id' => $model->id]);
                            echo $this->render(
                                    '_itemHome', [
                                'model' => $model,
                                //'asset' => $asset,
                                'url' => $url,
                                    ]
                            );
                        }
                        ?>

                        <?= Html::a('อ่านทั้งหมด', ['/' . $link], ['style' => 'color:#fff !important;font-size:19px;', 'class' => 'pull-right']) ?>            
                    </div>
                </div>
            </div>
        </div>
    </div>






<?php } ?>