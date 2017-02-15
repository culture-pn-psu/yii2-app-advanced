<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use backend\modules\person\models\Position;
use yii\bootstrap\Modal;

$this->title = 'คณะกรรมการประจำสถาบันวัฒนธรรมศึกษากัลยาณิวัฒนา';
$this->params['breadcrumbs'][] = [
    'label' => 'รู้จักสถาบันฯ',
    'url' => ['/self']
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
        <h3 class="column-title fadeInDown"><?= $this->title ?>


        </h3>
    </div><!--box-header -->

    <div class='box-body pad'>

        <div class="row">
            <div class="col-sm-12">


                <?php /* = Position::getTree(24) */ ?>

                <ul class="u-per">

                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/choosuk.l.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>รองศาสตราจารย์ ดร. ชูศักดิ์ ลิ่มสกุล</b></p>

                                    <p>อธิการบดี<br>มหาวิทยาลัยสงขลานครินทร์<br><u>ประธานกรรมการ</u></p>
                                    <!--<hr/>-->
                                </div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/pachariya.c.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ผู้ช่วยศาสตราจารย์พัชรียา ไชยลังกา</b></p>

                                    <p>รองอธิการบดีฝ่ายวิชาการ วิทยาเขตปัตตานี<br>มหาวิทยาลัยสงขลานครินทร์<br><u>กรรมการโดยตำแหน่ง</u></p>
                                    <!--<hr/>-->
                                </div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/kamol.ko.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ผู้ช่วยศาสตราจารย์กมล คงทอง </b></p>

                                    <p>ผู้อำนวยการ สถาบันวัฒนธรรมศึกษากัลยาณิวัฒนา</p>		<p><u>กรรมการและเลขานุการ</u></p>
                                    <!--<hr/>-->
                                    <p>อีเมลล์:kamol.ko@psu.ac.th</p>		<p>ติดต่อ: 1707</p>		</div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/bundit.d.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ผู้ช่วยศาสตราจารย์บัณฑิต ดุลยรักษ์</b></p>

                                    <p>รองผู้อำนวยการฝ่ายวางแผนและพัฒนาระบบบริหาร สถาบันวัฒนธรรมศึกษากัลยาณิวัฒนา</p>		<p><u>ผู้ช่วยเลขานุการ</u></p>
                                    <!--<hr/>-->
                                    <p>ติดต่อ: 1471</p>		</div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/parilak.k.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ดร.ปริลักษณ์ กลิ่นช้าง</b></p>

                                    <p>รองผู้อำนวยการฝ่ายวิจัย พัฒนา และส่งเสริมวัฒนธรรม สถาบันวัฒนธรรมศึกษากัลยาณิวัฒนา</p>		<p><u>ผู้ช่วยเลขานุการ</u></p>
                                    <!--<hr/>-->
                                    <p>อีเมลล์:parilak.k@psu.ac.th</p>		<p>ติดต่อ: 1497</p>		</div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/khongchai.h.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ศาสตราจารย์ ดร.ครองชัย หัตถา</b></p>

                                    <p><u>กรรมการผู้ทรงคุณวุฒิภายใน</u></p>
                                    <!--<hr/>-->
                                </div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/nifarid.r.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ผู้ช่วยศาสตราจารย์นิฟาริด ระเด่นอาหมัด</b></p>

                                    <p><u>กรรมการผู้ทรงคุณวุฒิภายใน</u></p>
                                    <!--<hr/>-->
                                    <p>อีเมลล์:rnifarid@bunga.pn.psu.ac.th</p>				</div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/sompong.t.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>ผู้ช่วยศาสตราจารย์สมปอง ทองผ่อง</b></p>

                                    <p>รองอธิการบดีวิทยาเขตปัตตานี<br>มหาวิทยาลัยสงขลานครินทร์<br>
                                    <u>กรรมการผู้ทรงคุณวุฒิภายนอก</u></p>
                                    <!--<hr/>-->
                                </div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/jirawat.p.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>รองศาสตราจารย์ ดร.จิรวัฒน์ พิระสันต์</b></p>

                                    <p>อาจารย์ภาควิชาศิลปะและการออกแบบ<br>คณะสถาปัตยกรรมศาสตร์ มหาวิทยาลัยนเรศวร<br>
                                    <u>กรรมการผู้ทรงคุณวุฒิภายนอก</u></p>
                                    <!--<hr/>-->
                                    <p>อีเมลล์:jphirasant@hotmail.com</p>		<p>ติดต่อ: 081-6884548</p>		</div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>


                    <li id="l-item">		
                        <a href="#">
                            <div id="p-item">


                                <div id="p-pic">		
                                    <img src="http://culture.pn.psu.ac.th/cu/images/user/sataporn.s.JPG">
                                </div>

                                <div id="p-detail">		
                                    <p><b>นายสถาพร  ศรีสัจจัง</b></p>

                                    <p>ศิลปินแห่งชาติสาขาวรรณศิลป์<br><u>กรรมการผู้ทรงคุณวุฒิภายนอก</u></p>
                                    <!--<hr/>-->
                                    <p>อีเมลล์:Panom.nun@hotmail.co.th</p>		<p>ติดต่อ: 081-6080018</p>		</div>	

                            </div>		
                        </a>	
                        <div class="clear"></div>
                    </li>

                </ul>



            </div>
        </div>

        <?php

        use kartik\social\GooglePlugin;

echo GooglePlugin::widget(['type' => GooglePlugin::SHARE, 'settings' => ['annotation' => 'none']]);

        use kartik\social\TwitterPlugin;

echo TwitterPlugin::widget(['type' => TwitterPlugin::SHARE, 'settings' => ['size' => 'small']]);

        use kartik\social\FacebookPlugin;

echo FacebookPlugin::widget(['type' => FacebookPlugin::LIKE, 'settings' => ["share" => "true"]]);

//use kartik\social\Disqus;
//echo Disqus::widget();
        ?>
    </div>

</div>

<?php
Modal::begin([
    //'header' => yii\helpers\Html::tag('h4', 'Add Event'),
    'id' => 'modalForm',
        //'size' => 'modal-sm'
]);
echo yii\helpers\Html::tag('div', '', ['id' => 'modalContent']);

Modal::end();

$this->registerJs(' 
    $(".ul-per .person").each(function(){
        var id = $(this).attr("data"); 
        $(this).click(function(e) { 
            var data={                   
                    id:id,
                } 
            $.ajax({
                    url: "' . Yii::$app->urlManager->createUrl('/person/default/view') . '",
                    data: data,
                    type: "GET",
                    success: function(data) {                        
                        $("#modalForm").find("#modalContent").html(data);
                        $("#modalForm").modal("show");
                    }
                });  
            return false;
        });
    });
');

$css = "p{
	padding: 0px;
	margin: 0px;
}
div.per-other{
	margin: 20px auto;
	width: 90%;
}

ul#per{
	list-style-type: none;
	padding: 0px;
	margin: 0px;
}
li#per{
	margin: 0px 0 0 0;
	padding: 0 0 20px 0;
}

ul.u-per{
	list-style-type: none;
	padding: 0px;
	margin: 0px;
}
ul.u-per li#l-item{
	list-style-type: none;
	margin: 10px 50px;
	display: inline-block;
}

#l-item h3{
	border-bottom: 3px solid #aaa;
	padding: 5px 0 5px 10px;
	box-shadow:0 2px 0px #efefef inset,0 1px 0px #999;
}

#l-item #a-per{
	text-decoration:none;	
	display:block;	
}
#l-item #p-item{
	    float: left;
    border-left: 1px solid #fff;
    border-right: 1px solid #666;
    border-bottom: 1px solid #666;
    border-radius: 5px;
    background: #e0e0e0;
    background: -moz-linear-gradient(top, #e0e0e0 0%, #b5b5b5 100%);
    background: -webkit-linear-gradient(top, #e0e0e0 0%,#b5b5b5 100%);
    background: linear-gradient(to bottom, #e0e0e0 0%,#b5b5b5 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0e0e0', endColorstr='#b5b5b5',GradientType=0 );
    box-shadow: 0 2px 0px #eee inset,0 2px 5px #aaa;
    -webkit-box-shadow: 0 2px 0px #eee inset,0 2px 5px #aaa;
    -moz-box-shadow: 0 2px 0px #eee inset,0 2px 5px #aaa;
	
}
#l-item a#a-per:hover #per-item{
	background:#ededed;
	border-top:1px solid #fff;	
	border-left:1px solid #fff;
	border-right:1px solid #aaa;	
	border-bottom:1px solid #aaa;	
}
#l-item #p-pic{
	display:inline;
	width:80px;
	height:120px;
	float:left;
	margin:5px 0px 5px 5px;
	border-right:1px solid #888;
	padding-right:6px;
	overflow: hidden;
}
#l-item #p-pic img{
	border: 0px;
	border-top: 2px solid #666;
	box-shadow:0 2px 2px #666 inset,0 2px 0px #ddd;border-radius:5px;
	width:73px;
}
#l-item #p-detail{
	font-size:13px;
	color:#444;
	text-shadow:0 1px 0 #efefef;
	text-align: left;
	display: inline-block;
	/*float:left;*/
	min-width: 175px;
	width: 300px;
	margin:3px 3px 0px 0px;
	padding:5px 10px;
	border:0px solid #555;
	height:112px;
	border-left:1px solid #fff;
	overflow: hidden;
	top: 0;
	word-wrap: break-word;
	/*text-wrap:none;*/
}
#l-item #p-detail p{
	word-break: break-all;
	line-height: 20px;
}
#l-item #p-detail hr{
	border-top: 1px solid #999;
	border-bottom: 1px solid #efefef;
	width: auto;
	margin: 3px 0;
}
.clear{clear:both;}





";
$this->registerCss($css);
