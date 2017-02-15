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


<!--<div class="well">
      <div class="media row">
	  	<div class="media-body col-sm-3">
      	<a class="pull-left" href="http://www.southrubbercenter.com/pr?art_id=415">
            <img class="media-object" src="http://www.southrubbercenter.com//images/no_img.jpg" width="100%">
  		</a>
		</div>
  		<div class="media-body col-sm-9">
    		<h4 class="media-heading"><a href="http://www.southrubbercenter.com/pr?art_id=415">ชาวสวนยางขอนายกฯลงพูดคุยแก้ปัญหา  </a></h4>
          <p>ทำเนียบฯ*ที่ศูนย์บริการประชาชนวันที่14ต.ค.นายสุนทรรักษ์รงค์ผู้ประสานงานแนวร่วมกู้ชีพชาวสวนยางและตัวแทนแนวร่วมกู้ชีพพร้อมนายกัมพลเพิงมากผู้ประสานงานแนวร่วมกู้ชีพชาวสวนยางภาคกลางและภาคตะวันออกเข้ายื่นหน...</p>
		  
		  <a class="btn btn-default" href="http://www.southrubbercenter.com/pr?art_id=415">อ่านเพิ่มเติม <i class="icon-angle-right"></i></a>
		  
          <ul class="list-inline list-unstyled">
  			<li><span><i class="icon-user"></i> <a href="#">เจ้าหน้าที่</a></span></li>
            <li>|</li>
			<li>
            <span><i class="icon-folder-close"></i> <a href="http://www.southrubbercenter.com/pr?art_type_id=1">ประชาสัมพันธ์</a></span></li>
			<li>|</li>
			<li>
            <span><i class="icon-calendar"></i> 15 ต.ค. 58 09:51</span></li>
            <li>|</li>
            
            <li>
            <span><i class="icon-eye-open"></i> <a href="blog-item.html#comments">116 Views</a></span>
            </li>
			</ul>
       </div>
    </div>
  </div>-->
