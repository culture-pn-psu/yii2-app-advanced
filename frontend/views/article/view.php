<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => $model->articleCategory->title,
    'url' => ['/self']
];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">  

    <div class="wow">
        <h3 class="column-title fadeInDown"><?= $model->title ?><br/>
            <small><?= $model->articleCategory->title ?> - <?= Yii::$app->formatter->asDateTime($model->created_at); ?></small>


        </h3>

        <div class="article-detail">
            <p class="text-center wow fadeInDown"><?= $model->content ?></p>            
        </div>


        <div class="article-detail">
            <?php

            use kartik\social\GooglePlugin;

echo GooglePlugin::widget(['type' => GooglePlugin::SHARE, 'settings' => ['annotation' => 'none']]);

            use kartik\social\TwitterPlugin;

echo TwitterPlugin::widget(['type' => TwitterPlugin::SHARE, 'settings' => ['size' => 'small']]);
            ?>
            <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive" style="overflow: hidden;">
                <table><tr><td>
            <?php

            use kartik\social\FacebookPlugin;

echo FacebookPlugin::widget(['type' => FacebookPlugin::LIKE, 'settings' => ["share" => "true"]]);
            ?>
</td></tr></table>
                </div>
                </div>
                </div>
            <?php

            use kartik\social\Disqus;

echo Disqus::widget();
            ?>
        </div>

    </div>
</div>

<?php
$this->registerJs(" 
    var urlPdf =  $('a.media,a#media').attr('href');
    $('a.media,a#media').before('<p><iframe frameborder=\"0\" height=\"700\" scrolling=\"no\" src=\"'+urlPdf+'\" width=\"100%\"></iframe></p>');
    
");
?>

