<?php

namespace frontend\controllers;

use backend\modules\article\models\Article;

class SelfController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSlug($slug) {
        $model = Article::find()->where(['slug' => $slug])->one();

        return $this->render('slug', [
                    'model' => $model
        ]);
    }
    
    public function actionOrganization() {
        //return $this->renderPartial('org');
        return $this->render('organization');
    }
    
    public function actionPersonalBoard() {
        //return $this->renderPartial('org');
        return $this->render('personal_board');
    }
    public function actionPerson() {
        //return $this->renderPartial('org');
        return $this->render('person');
    }


}
