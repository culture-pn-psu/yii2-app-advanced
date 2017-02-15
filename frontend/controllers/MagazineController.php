<?php

namespace frontend\controllers;

use Yii;
use backend\modules\magazine\models\Magazine;
use yii\data\ActiveDataProvider;



class MagazineController extends \yii\web\Controller {

    public function actionIndex($id=null) {
        if($id==null){
            $dataProvider = new ActiveDataProvider([
            'query' => Magazine::find()->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('list', ['listDataProvider' => $dataProvider]);
        }else{
        return $this->render('index');
        }
    }
    
    public function actionPreview($id) {
        $this->layout = 'preview.php';
        $model = Magazine::findOne($id);
        $files = \yii\helpers\Json::decode($model->image_id);
//$files = '';
        $initial = [];
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                $initial[] = Yii::$app->img->getUploadUrl(Magazine::UPLOAD_FOLDER . '/' . $model->id) . $value;
            }
        }
        
        //print_r($initial);
        return $this->renderAjax('preview', [
                    'model' => $model,
                    'noOfPagesInPDF' => count($initial),
                    'width' => 800,
                    'height' => 600,
                    'initial' => $initial
        ]);
    }

}
