<?php

namespace frontend\modules\southgallery\controllers;

use yii\web\Controller;

/**
 * Default controller for the `southgallery` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    public function actionQrcode($id = null) {
       $model = \backend\modules\artGallery\models\ArtJob::findOne($id);
       $url = \yii\helpers\Url::to(['/south-gallery/art/view','id'=>$id],true);
       $data = \dosamigos\qrcode\QrCode::png($url, \Yii::$app->img->getUploadPath('qrcode') . $model->art_code . '.png');
        return $data;
    }

    public function actionQrdown($art_code=null) {
        
        $file_name = 'qrcode.png';
        $mime = 'application/force-download';
        //header('Pragma: public'); // required
        //header('Expires: 0'); // no cache
        //header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header("Content-Type: image/png");
        echo $this->actionQrcode($art_code);
        //header('Content-Type: ' . $mime);
        //header('Content-Description: File Transfer');
       // header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
        //header('Content-Transfer-Encoding: binary');
        //header('Connection: close');
        //readfile($image); // push it out
        exit();
    } 
    
}
