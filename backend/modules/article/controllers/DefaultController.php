<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\modules\article\models\Article;
use backend\modules\article\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\BaseStringHelper;
use common\models\Model;
use backend\modules\article\models\ArticleTag;
use backend\modules\tag\models\Tag;
use yii\helpers\ArrayHelper;

/**
 * DefaultController implements the CRUD actions for Article model.
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Article();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->created_by = Yii::$app->user->id;
            if (empty($model->summary)) {
                $model->summary = strip_tags($model->content);
                $model->summary = BaseStringHelper::truncate($model->summary, 250);
            }
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
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modelArticleTags = $model->articleTags;
        $model->tags = $model->tagAll;
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            $model->updated_by = Yii::$app->user->id;
            if (empty($model->summary)) {
                $model->summary = strip_tags($model->content);
                $model->summary = BaseStringHelper::truncate($model->summary, 250);
            }

            $post = Yii::$app->request->post();
            //print_r($post);
            //exit();          
//               
            $transaction = \Yii::$app->db->beginTransaction();
            try {

                if ($flag = $model->save(false)) {
                    
                    $title = $post['Article']['tags'];
                    if ($title) {
                        ArticleTag::deleteAll(['article_id' => $model->id]);
                        foreach ($title as $key => $val) {
                            $articleTag = new ArticleTag();
                            $articleTag->article_id = $model->id;
                            $articleTag->tag_id = $this->chkTb(Tag::className(), ['id' => $val], 'id', 'title');

                            if (($flag = $articleTag->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            } else {
                               print_r($articleTag->getErrors());
                            }
                        }
                    }
                } else {
                    print_r($model->getError());
                    exit();
                }

                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        } else {
            //print_r($model->getErrors());
            //print_r($modelDetail->getErrors());
        }




        return $this->render('update', [
                    'model' => $model,
                    'modelArticleTags' => $modelArticleTags,
        ]);
    }

   
    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    ############################################################

    /**
     * ไว้กรณีเพิ่มข้อมูลใหม่
     * @param type $modelName
     * @param type $val
     * @param type $id
     * @param type $title
     * @return type
     */
    public function chkTb($modelName, $val, $id, $title) {
        if (isset($val[$id])) {
            $modelPost = new $modelName();
            $model = $modelName::findOne([$id => $val[$id]]);
//            print_r($model);
//            exit();
            if ($model === NULL) {
                //$this->pr($model);
                $model = new $modelName();
                $model->$title = $val[$id];
                //$val[$title]=$val[$id];
//                echo $modelName;
//                exit();
                switch ($modelName) {
                    case 'backend\modules\product\models\Product':
                        $model->price = $val['price'];
                        $model->status = 1;
                        $model->created_at = time();
                        $model->created_by = Yii::$app->user->id;
                        break;
                }
                if (!$model->save()) {
                    print_r($model->getErrors());
                }
                return $model->id;
            } else {
                return $model->id;
            }
        }
    }

}
