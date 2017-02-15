<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;

$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');
$url=Url::to(['/news','id'=>$model->id]);
$content =strip_tags($model->content);
?>
 <?php ?>


<div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
            <div class="img">
            <?=Html::img($model->image,['class'=>'img-responsive','width'=>'100%','alt'=>$model->title])?>
            </div>
  	</a>
  	<div class="media-body">
    		
                    <?=Html::tag('h3',Html::a($model->title,$url),["class"=>"media-heading"])?>
          <p><?=$model->summary?></p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> <?=Yii::$app->formatter->asDateTime($model->created_at, 'medium'); ?></span></li>

	</ul>
       </div>
    </div>
</div>

<?php
$this->registerCss(" 

.img{
    border:1px solid #aaa;
    width:150px;
    height:150px;
    position:relative;
    overflow:hidden;
}
.img img{
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 150px;
  max-width: none;
}
");