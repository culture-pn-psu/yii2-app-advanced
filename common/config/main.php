<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'th-TH',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'img' => [
            'class' => 'common\components\Img',
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'GD', //GD or Imagick
        ],
         'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    //'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                    //'forceTranslation' => true,
                ],
            'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    //'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable' => '{{%language_translate}}',
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                    //'forceTranslation' => true,
                ],
            ],
        ],
    ],    
    'aliases' => [
        '@themes' => dirname(dirname(__DIR__)) . '/themes',
        '@uploads' => dirname(dirname(__DIR__)) . '/uploads',
    ],
];
