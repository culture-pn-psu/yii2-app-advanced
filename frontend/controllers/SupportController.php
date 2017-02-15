<?php

namespace frontend\controllers;

use backend\modules\article\models\Article;

class SupportController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSlug($slug) {
        $model = Article::find()->where(['slug' => $slug])->one();

        return $this->render('slug', [
                    'model' => $model
        ]);
    }

    public function actionQuality() {
        //return $this->renderPartial('org');
        return $this->render('quality');
    }

    public function actionStrategic() {
        //return $this->renderPartial('org');
        return $this->render('strategic');
    }

    public function actionKpis() {
        //return $this->renderPartial('org');
        return $this->render('kpis');
    }

}
