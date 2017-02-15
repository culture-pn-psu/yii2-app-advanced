<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="col-sm-6 col-md-4">
    <div class="team-member wow fadeInUp animated list_item" data-wow-duration="400ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 0ms; animation-name: fadeInUp;" data="<?=$model->id?>">
        <div class="team-img">
            <img class="img-responsive" src="<?=$model->imgTemp?>" alt="">
        </div>
        <div class="team-info">
            <?=Html::tag('h4',$model->title)?>
            <small><?=$model->detail?></small>
        </div>
      
    </div>
</div>



