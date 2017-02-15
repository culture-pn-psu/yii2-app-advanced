<?php

namespace frontend\controllers;

class Cu_newController extends \yii\web\Controller
{
    public function actionIndex($con=null, $act=null)
    {
        //return $this->render('index');
        
        if($con&&$act){
        $con=$con?'/'.$con:'';
        $act=$act?'/'.$act:'';
        return $this->redirect(['/'.$con.$act]);
        }else{
            return $this->goHome();
        }
    }
    
    public function actionBackend($con=null, $act=null)
    {
        $con=$con?'/'.$con:'';
        $act=$act?'/'.$act:'';
        return $this->redirect(['/backend'.$con.$act]);
    }

}
