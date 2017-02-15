<?php

namespace frontend\modules\molee;

use Yii;
/**
 * molee module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\molee\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        Yii::$app->view->theme->pathMap = ['@app/views' => '@webroot/themes/molee'];
        Yii::$app->view->theme->baseUrl = '@web/themes/molee';
        $this->layout = Yii::$app->view->theme->pathMap['@app/views'].'/layouts/main';
        Yii::$app->params['name'] = 'พิพิธภัณพระเทพญาณโมลี';
        parent::init();

        // custom initialization code goes here
    }
}
