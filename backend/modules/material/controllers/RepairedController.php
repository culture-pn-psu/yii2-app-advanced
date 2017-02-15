<?php

namespace backend\modules\material\controllers;

use Yii;
use backend\modules\material\models\Repair;
use backend\modules\material\models\RepairedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\material\models\RepairProcess;
use yii\helpers\Url;

/**
 * RepairedController implements the CRUD actions for Repair model.
 */
class RepairedController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Repair models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new RepairedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Repair model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->staffMaterial_id = Yii::$app->user->id;
            $model->staffMaterial_at = time();

            if ($model->status == 1) {
                $model->status = 2;
            }
            if ($model->save()) {
                if ($model->type == 2) {
                    Yii::$app->notification->sent('มีรายการแจ้งซ่อม : '.$model->material->title, Url::to(['/material/repair-com/view', 'id' => $model->id]), $model->staff, Yii::$app->user);
                }
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
            }
        }
        //print_r($model);
        return $this->render('view', [
                    'model' => $model,
                        //'modelProcess' => (empty($modelProcess)?new RepairProcess():$modelProcess)
        ]);
    }

    /**
     * Creates a new Repair model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Repair();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Repair model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Repair model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Repair model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Repair the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Repair::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionProcess($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->staff_status == 1) {
                $model->status = 6; //ซ่อมแล้ว
            } elseif ($model->staff_status == 2) {
                $model->status = 5; //ดำเนินการซ่อม
            }
            $model->staff_at = time();
            if ($model->save()) {
                if ($model->status == 5) {
                    Yii::$app->notification->sent('พิจารณาแจ้งซ่อม : '.$model->material->title, Url::to(['/material/repaired/process', 'id' => $model->id]), $model->staff, Yii::$app->user);
                } elseif ($model->status == 6) {
                    Yii::$app->notification->sent('ซ่อมเสร็จแล้ว: '.$model->material->title, Url::to(['/material/repaired/process', 'id' => $model->id]), $model->staffMaterial, Yii::$app->user);
                }
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
            }
        }
        return $this->render('process', [
                    'model' => $model,
        ]);
    }

}
