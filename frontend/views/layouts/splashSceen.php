<?php

use yii\helpers\Html;
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

    
    <?=$content?>
    
    
    
    
    
    
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
