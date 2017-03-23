<?php

namespace frontend\controllers;

use Yii;
use culturePnPsu\visitBooking\models\Visitor;
use culturePnPsu\visitBooking\models\VisitBooking;
use culturePnPsu\visitBooking\models\VisitBookingDetail;
use culturePnPsu\visitBooking\models\VisitBookingDetailSearch;
use culturePnPsu\visitBooking\models\VisitBookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

class VisitBookingController extends \yii\web\Controller {

    public function actions(){
        $this->layout = 'main_blank';
    }

    public function actionIndex()
    {
        $searchModel = new VisitBookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());
        $dataProvider->sort->defaultOrder = [
            'visit_date'=>SORT_ASC,
            ];
        $dataProvider->pagination = false;
            
        $dataProvider->setModels(yii\helpers\ArrayHelper::index(
            $dataProvider->getModels(),null
            ,[
                function($model){
                    return Yii::$app->formatter->asDate($model->visit_date,"php:Y-m-d");
                },
                function($model){
                    return Yii::$app->formatter->asDate($model->visit_date,"php:Y-m-d");
                }
            ]));

        // echo "<pre>";
        // print_r($dataProvider->getModels());
        // exit();
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    ################################
    
    public function actionJsoncalendar($start = NULL, $end = NULL, $_ = NULL) {
        $activity = VisitBooking::find()->all();
        $events = array();
        foreach ($activity as $act) {
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $act->id;
            
            //$status=$act->status==0?' ('.$act->statusLabel.')':'';
            $Event->title = $act->visitor->title; 
            
            //$Event->textColor = $act->status?'#fff':'#ff0000';
            //$Event->color = $act->calendar->color;
            // $Event->start = Yii::$app->formatter->asDate($act->visit_date, 'php:Y-m-d h:i:s');
            // $Event->end = Yii::$app->formatter->asDate($act->visit_date, 'php:Y-m-d h:i:s');
            $Event->start = $act->visit_date;
            //$Event->end = Yii::$app->formatter->asDate($act->visitBooking->visit_date, 'php:Y-m-d\TH:i:s\Z');
            $Event->editable = false;
            $Event->allDay = false;
            $Event->durationEditable = true;
            $Event->startEditable = true;
            $events[] = $Event;
        }
        //print_r($events);
        header('Content-type: application/json');
        echo Json::encode($events);
        Yii::$app->end();
    }

}
