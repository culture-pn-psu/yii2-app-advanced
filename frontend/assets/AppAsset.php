<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/animate.min.css',
        'css/owl.carousel.css',
        'css/owl.transitions.css',
        'css/prettyPhoto.css',
        'css/main.css',
        'css/main-device.css',
        'css/responsive.css',
        'css/site.css',
        //'css/tutorial.css',
    ];
    public $js = [
        //'js/jquery.js',
        //'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        //'js/owl.carousel2.thumbs.js',
        'js/mousescroll.js',
        'js/smoothscroll.js',
        'js/jquery.prettyPhoto.js',
        //'js/jquery.isotope.min.js',
        'js/jquery.inview.min.js',
        'js/wow.min.js',
        'js/main.js',
        //'js/tutorial.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
