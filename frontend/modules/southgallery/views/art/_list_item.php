<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class='col-sm-4 col-xs-12 col-md-3 col-lg-3' >
    <a class="thumbnail fancybox" rel="ligthbox" href="<?= Url::to(['/south-gallery/art/'.$model->id]) ?>">
        <div  style="float: left;overflow: hidden;height: 200px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #eee;">
            <?= Html::img($model->imgTemp, [ 'width' => '100%', 'class' => 'center-block img-responsive']) ?>
        </div>
        <div class='text-right' style="margin:5px 5px 15px 5px;">
            <?=Html::tag('h4',$model->title,['style'=>'margin-bottom:0px;']) ?>
            <small class='text-muted'>
                <?=$model->artTypeTitle. ' '.$model->artTechniqueTitle?>
            </small>
            <hr style="margin: 5px;"/>
            <div style="height: 40px;">
                <div style="float: right; overflow: hidden;height: 50px;display: inline;margin:0 0 10px 10px;">
                    <?= Html::img($model->artist->imgTemp, [ 'style'=>'height:100%;max-height:60px;', 'class' => '']) ?>
                </div>
                <small class='text-muted'>
                    <?= $model->artist->fullnameArtist ?>
                </small>
            </div>
        </div> <!-- text-right / end -->
    </a>
</div> <!-- col-6 / end -->



