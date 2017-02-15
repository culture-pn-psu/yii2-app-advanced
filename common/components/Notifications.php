<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;
use Yii;
use yii\base\Component;
use yii\helpers\Url;
use yii\helpers\BaseFileHelper;
use common\models\Notification;
/**
 * Description of Notification
 *
 * @author madone
 */
class Notifications extends Component{
    //put your code here
    public $title;
    public function sent($title,$rout='',$receiver,$from=null,$detail=null){       
       if(isset($title)){
         $model = new Notification();
         $model->title = $title;
         $model->detail = $detail;
         $model->router = $rout;
         $model->status = '0';
         $model->sented_at = time();
         $model->sented_by = Yii::$app->user->id;
         $model->received_by = $receiver->id;
         if($model->save()){
//             echo Yii::$app->params['supportEmail'];
//             exit();
            echo Yii::$app->mailer->compose('notification', ['user' => $receiver,'model'=>$model,'from'=>$from])
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                    ->setTo($receiver->email)
                    ->setSubject('['.Yii::$app->name.'] '.  $model->title)
                    ->send();
            //exit();
         }
       }
    }
    
    
    public function view(){             
         $model = Notification::find()->where(['received_by'=>Yii::$app->user->id])->orderBy('sented_at desc')->limit(10)->all();
         return $model;     
    }
    
    public function count(){             
         $count = Notification::find()->where(['received_by'=>Yii::$app->user->id,'status'=>0])->count();
         return $count?$count:'';     
    }
    
    
    
}
