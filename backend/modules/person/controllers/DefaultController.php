<?php

namespace backend\modules\person\controllers;

use Yii;
use backend\modules\person\models\Person;
use backend\modules\person\models\PersonSearch;
use backend\modules\person\models\PersonPosition;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Model;
use yii\helpers\ArrayHelper;

/**
 * DefaultController implements the CRUD actions for Person model.
 */
class DefaultController extends Controller {

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
     * Lists all Person models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Person model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                        'model' => $this->findModel($id),
                        'ajax' => Yii::$app->request->isAjax
            ]);
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Person();
        $modelPosition = new PersonPosition();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model->img_id = null;
            if ($model->save()) {
                PersonPosition::deleteByIDs($model->id);
                foreach ($post['PersonPosition']['position_id'] as $key => $position) {
                    $modelPosition = new PersonPosition();
                    $modelPosition->person_id = $model->id;
                    $modelPosition->position_id = $position;
                    $modelPosition->save();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'modelPosition' => $modelPosition,
            ]);
        }
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $img_id_old = $model->img_id;
        $modelPosition = $model->personPosition;
//         print_r($modelPosition);
//            exit();
        $position = [];
        foreach ($modelPosition as $val) {
            $position[] = $val->position_id;
        }
        if ($position) {
            $modelPosition = new PersonPosition();
            $modelPosition->position_id = $position;
        }


        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                                ActiveForm::validateMultiple($modelDetail), ActiveForm::validate($model)
                );
            }

            $valid = $model->validate();
            if ($valid) {
                //if($img_id_old||$model->img_id)
                //\backend\modules\image\models\Image::clearTemp(Person::UPLOAD_FOLDER,$model->img_id,$img_id_old);
                if ($model->save()) {
                    PersonPosition::deleteByIDs($model->id);
                    foreach ($post['PersonPosition']['position_id'] as $key => $position) {
                        $modelPosition = new PersonPosition();
                        $modelPosition->person_id = $model->id;
                        $modelPosition->position_id = $position;
                        $modelPosition->save();
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        return $this->render('update', [
                    'model' => $model,
                    'modelPosition' => (empty($modelPosition) ? new PersonPosition() : $modelPosition),
        ]);
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
