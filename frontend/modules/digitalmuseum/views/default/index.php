<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Digital Museum');
$this->params['breadcrumbs'][] = $this->title;

use frontend\modules\digitalmuseum\assets\AppAsset;
use yii\web\View;
$asset = AppAsset::register($this);
?>


<div class="container" id="tourpackages-carousel">
  <h2><?= Yii::t('app', 'Virtual Culture Tour') ?></h2>
  <div class="row">

    <div class="col-xs-18 col-sm-6 col-md-3">
      <div class="thumbnail">
        <?=Html::img($asset->baseUrl.'/images/molee.jpg')?>
          <div class="caption">
            <h4><?=Html::a('พิพิธภัณฑ์พระเทพญาณโมลี',['/digitalmuseum/molee'])?></h4>
<!--            <p>การนำชมในรูปแบบ Visual tour </p>-->
            <p>
                <?=Html::a('เข้าชม',['/digitalmuseum/molee'],['class'=>'btn btn-info btn-xs', 'role'=>'button'])?>
               </p>
        </div>
      </div>
    </div>


    <div class="col-xs-18 col-sm-6 col-md-3">
      <div class="thumbnail">
        <?=Html::img($asset->baseUrl.'/images/ammart.jpg')?>
          <div class="caption">
            <h4><?=Html::a('เรือนอำมาตย์โท','#',['class'=>'btn-link disabled'])?></h4>
<!--            <p>การนำชมในรูปแบบ Visual tour </p>-->
            <p>
                <?=Html::a('เข้าชม',['/digitalmuseum/molee'],['class'=>'btn btn-info btn-xs disabled', 'role'=>'button'])?>
               </p>
        </div>
      </div>
    </div>


  </div><!-- End row -->

</div><!-- End container -->

