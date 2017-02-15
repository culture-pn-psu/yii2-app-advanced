<?php

namespace frontend\modules\southgallery\controllers;

use Yii;
use backend\modules\artGallery\models\ArtJob;
use backend\modules\artGallery\models\ArtJobSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ArtController extends \yii\web\Controller {

    public function actionIndex($art_type_id=null) {

        $searchModel = new ArtJobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $artTechnique = ArrayHelper::map($this->getTechnique($art_type_id), 'id', 'name');

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'artTechnique' => $artTechnique
        ]);


//        $dataProvider = new ActiveDataProvider([
//            'query' => ArtJob::find()->orderBy('id DESC'),
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//        ]);
//
//        return $this->render('index', ['listDataProvider' => $dataProvider]);
    }

    public function actionView($id) {
        $model = ArtJob::findOne($id);

        return $this->render('view', ['model' => $model]);
    }

    public function actionGetTechnique() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $art_type_id = $parents[0];
                $out = $this->getTechnique($art_type_id);
                echo \yii\helpers\Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    protected function getTechnique($id) {
        $datas = \backend\modules\artGallery\models\ArtTechnique::find()->where(['art_type_id' => $id])->all();
        return $this->MapData($datas, 'id', 'title');
    }
    public static function Technique($id) {
        $datas = \backend\modules\artGallery\models\ArtTechnique::find()->where(['art_type_id' => $id])->all();
        return $this->MapData($datas, 'id', 'title');
    }

    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

}
