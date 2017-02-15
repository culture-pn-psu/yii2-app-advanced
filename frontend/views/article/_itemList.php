<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
?>

<li class="list-group-item">     
<?=Html::a('<i class="fa fa-paper-plane"></i> '.BaseStringHelper::truncate($model->title,33),$url,['style'=>'font-size:18px;','title'=>$model->title])?>
</li>
