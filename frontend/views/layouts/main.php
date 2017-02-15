<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
/**
 * @var $this \yii\base\View
 * @var $content string
 */
use frontend\assets\AppAsset;
$asset=AppAsset::register($this);
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
    <meta name="author" content="">-->
	<!-- core CSS -->

    <!--[if lt IE 9]>
    <script src="<?=$asset->baseUrl?>/js/html5shiv.js"></script>
    <script src="<?=$asset->baseUrl?>/js/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?=$asset->baseUrl?>/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$asset->baseUrl?>/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$asset->baseUrl?>/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$asset->baseUrl?>/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=$asset->baseUrl?>/images/ico/apple-touch-icon-57-precomposed.png">
    <?php $this->head() ?>

    <script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/9cb95e8005a55bea3aca05d2804f7882_0.js" async></script>
</head><!--/head-->

<body id="home" class="homepage">
<?php $this->beginBody() ?>
    <!--header-->
    <?= $this->render(
            'header.php',
            ['asset' => $asset]
        ) ?>
    <!--/header-->

     <?php
    //echo Url::current().'='.Url::home();
    //echo Yii::$app->controller->getRoute();
    // Check Home
    //$home=Url::home().'site/index';
    if( Url::current() == (Url::home().'site/index')){?>
    <!--#main-slider-->
    <?= $this->render(
            'home.php',
            [
                'asset' => $asset,
                'content'=>$content
            ]
        ) ?>
    <!--/#main-slider-->
    <?php }else{ ?>

    <?= $this->render(
            'content_half_layout.php',
            [
                'asset' => $asset,
                'content'=>$content
            ]
        ) ?>
    <?php } ?>


    <!--#footer-->
    <?php /*$this->render(
            'footer_link.php',
            [
                'asset' => $asset,
            ]
        ) */?>
    <?php /*= $this->render(
            'footer.php',
            [
                'asset' => $asset,
            ]
        ) */?>
    <!--/#footer-->
    <?php  $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
