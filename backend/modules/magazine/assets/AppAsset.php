<?php

/**
 * -----------------------------------------------------------------------------
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * -----------------------------------------------------------------------------
 */

namespace backend\modules\magazine\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 *
 * Customized by Nenad Živković
 */
class AppAsset extends AssetBundle {

    public $sourcePath = '@backend/modules/magazine/assets';
    public $css = [
            //'css/style.css',
            //'css/magazine.css',
    ];
    public $js = [
        //'js/extras/jquery.min.1.7.js',
        'js/extras/modernizr.2.5.3.min.js',
        'js/lib/hash.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

//    public function init() {
//        parent::init();
//        // resetting BootstrapAsset to not load own css files
//        Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
//            'css' => [],
//            'js' => []
//        ];
//    }

}
