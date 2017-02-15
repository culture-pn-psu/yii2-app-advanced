<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
/**
 * @var $this \yii\base\View
 * @var $content string
 */
use frontend\assets\ThemeAsset;
$asset=ThemeAsset::register($this);
//use frontend\assets\AppAsset;
//$asset=AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
<!--    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Responsive Onepage HTML Template | Multi</title>-->
	<!-- core CSS -->
    <link href="<?=$asset->baseUrl?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/animate.min.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/owl.transitions.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/main.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/responsive.css" rel="stylesheet">
    <link href="<?=$asset->baseUrl?>/assets/css/site.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?=$asset->baseUrl?>/assets/js/html5shiv.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head><!--/head-->

<body id="home" class="homepage"  style="padding: 0px;">

    <div id="tf-home1" class="text-center" style="margin: 0px;">
    <div class="overlay">
        <section id="about"> 
        <div class="container">
            <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Welcome to 
                <p><img src="<?= $asset->baseUrl ?>/assets/images/logo.png" alt="logo" height="50"></p> </h2>
                <p class="text-center wow fadeInDown">มุ่งพัฒนาผลิตภัณฑ์สินเชื่อที่ถูกต้องตามหลักการศาสนาอิสลาม  เพื่อตอบสนองต่อความต้องการของลูกค้า<br>

มุ่งเพิ่มเครือข่ายบริการลูกค้าและตัวแทนบริษัทฯตามชุมชนต่างๆ ให้ครอบคลุมทุกพื้นที่

ให้บริการลูกค้าทุกระดับอย่างญาติมิตร<br>

มุ่งพัฒนาระบบเทคโนโลยีสารสนเทศที่ทันสมัย เพื่ออำนวยความสะดวกในการดำเนินงาน สามารถให้บริการลูกค้าได้อย่างถูกต้องและรวดเร็ว

ดำเนินธุรกิจตามวิถีอิสลาม</p>
                <h3 class="text-center wow fadeInDown" style="color: #F39321;">พบกันเร็วๆนี้</h3>
        </div>       
        </div>
        </section>
    </div>
</div>
    
    
    
    
    
    
    
    
    
    
    <script src="<?=$asset->baseUrl?>/assets/js/jquery.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/bootstrap.min.js"></script>
<!--    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
    <script src="<?=$asset->baseUrl?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/mousescroll.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/smoothscroll.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/jquery.isotope.min.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/jquery.inview.min.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/wow.min.js"></script>
    <script src="<?=$asset->baseUrl?>/assets/js/main.js"></script>
    <?php /* $this->endBody()*/ ?>
</body>
</html>
<?php $this->endPage() ?>
