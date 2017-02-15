<?php

namespace frontend\modules\digitalmuseum;
use Yii;



class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\digitalmuseum\controllers';

    public function init()
    {
        
        Yii::$app->view->theme->pathMap =  ['@app/views' => '@webroot/themes/spacelab'];
        Yii::$app->view->theme->baseUrl = '@web/themes/spacelab';
        $this->layout = '/molee/main';
        
        
        parent::init();

        // custom initialization code goes here
    }
}
