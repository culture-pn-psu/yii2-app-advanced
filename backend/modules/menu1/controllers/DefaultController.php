<?php

namespace backend\modules\menu\controllers;

use Yii;
use backend\modules\menu\models\Menu;
use backend\modules\menu\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * DefaultController implements the CRUD actions for Menu model.
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = [
            'menu_category_id' => SORT_ASC,
            'sort' => SORT_ASC
        ];

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->created_by = Yii::$app->user->id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {
            print_r(Yii::$app->request->post());
        //exit();
            $post = Yii::$app->request->post('Menu');

//            if ($post['sort'] != $model->sort || $post['sort'] == null) {
//                switch ($post['sort']) {
//                    case 'first':
//                        $model->sort = 1;
//                        break;
//                    case 'last':
//                        $model->sort = ($model->sort == Menu::sortLast($post['menu_category_id'], $post['parent_id'])) ? $model->sort : (Menu::sortLast() + 1);
//                        //Menu::find()->where
//                        break;
//                    default :
//                        $model->sort = ++$post['sort'];
//                        break;
//                }
//            }


            $model->created_at = time();
            $model->created_by = Yii::$app->user->id;
//            $param = $post['params']?explode(',', $post['params']):null;
//            foreach ()
            $model->params = $post['params'] ? Json::decode($post['params']) : null;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            //$model->params = $model->params ? Json::encode($model->params) : null;
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
