<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                        <article class="media clearfix">
                           
                            <div class="entry-thumbnail pull-left">                                
                                <?=Html::img($model->image,['class'=>'img-responsive','width'=>'100%','alt'=>$model->title])?>
                   
                            </div>
                            
                            
                            <div class="media-body">
                                <header class="entry-header">
                                    <h2 class="entry-title"><?=Html::a($model->title,$url)?></h2>
                                </header>

                                <div class="entry-content"> 
                                    <P><?=$model->summary?></P> 
                                </div>

                                <footer class="entry-meta">
                                    <small>
                                    <span class="entry-author">
                                    <i class="fa fa-clock-o"></i> <?=Yii::$app->formatter->asDateTime($model->created_at, 'php:d M Y, H:i')?>
                                    </span> 
                                    
                                    <?php if($model->createdBy):?>
                                    <span class="entry-author"><i class="fa fa-pencil"></i> <a href="#"><?=$model->createdBy->displayname?></a></span>
                                    <?php endif?> 
                                    <span class="entry-category"><i class="fa fa-folder-o"></i> <a href="#"><?=$model->articleCategory->title?></a></span>
                                    </small>
                             
                                </footer>
                           
                            </div>
                        </article>
                    </div>
