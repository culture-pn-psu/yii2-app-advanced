<?php

namespace backend\modules\material;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\material\controllers';

    
    
    public function init()
    {
        $this->layout = 'left-menu.php';
        parent::init();

        // custom initialization code goes here
    }
}
