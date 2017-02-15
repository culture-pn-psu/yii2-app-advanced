<?php

namespace frontend\controllers;

use backend\modules\album\models\Album;
use backend\modules\album\models\AlbumCategory;

class AlbumController extends \yii\web\Controller {

    public function actionIndex($id = null, $print = null) {
        if (isset($print))
            $this->layout = '_blank';
        if (!empty($id)) {


            $model = Album::findOne($id);
            return $this->render('index', [
                        'model' => $model
            ]);
        } else {
            $modelAlbum = Album::find()->where(['status'=>1])->all();
            $modelCate = AlbumCategory::find()->all();
            return $this->render('list', [
                        'modelAlbum' => $modelAlbum,
                        'modelCate' => $modelCate
            ]);
        }
    }

}
