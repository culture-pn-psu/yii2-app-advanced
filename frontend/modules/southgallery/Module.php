<?php

namespace frontend\modules\southgallery;


use Yii;
/**
 * southgallery module definition class
 */
class Module extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\southgallery\controllers';

    /**
     * @inheritdoc
     */
    public function init() {
        Yii::$app->view->theme->pathMap = ['@app/views' => '@webroot/themes/southgallery'];
        Yii::$app->view->theme->baseUrl = '@web/themes/southgallery';
        $this->layout = Yii::$app->view->theme->pathMap['@app/views'].'/layouts/main';
        Yii::$app->params['name'] = 'หอศิลป์ภาคใต้';
        
        
        parent::init();

        // custom initialization code goes here
    }

}
