<?php

namespace backend\modules\album\controllers;

use Yii;
use backend\modules\album\models\Album;
use backend\modules\album\models\AlbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * DefaultController implements the CRUD actions for Album model.
 */
class DefaultController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Album models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Album model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null) {
        if ($id === NULL) {
            $model = new Album();
            if ($model->save(false)) {
                return $this->redirect(['create', 'id' => $model->id]);
            }
        } elseif ($id) {
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    print_r($model->getErrors());
                    //exit();
                }
            }
        }


        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Album model.
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
     * Deletes an existing Album model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    #############################

    public function actionDraft() {
        
    }

    ##############################################

    public function actionUploadajax() {
        $this->uploadMultipleFile();
    }

    private function uploadMultipleFile() {
        $files = [];
        $json = '';
        if (Yii::$app->request->isPost) {
            $img = Yii::$app->img;
            $UploadedFiles = \yii\web\UploadedFile::getInstancesByName('Album[images_file]');
            $upload_folder = Yii::$app->request->post('upload_folder');
            $id = Yii::$app->request->post('id');
            $model = $this->findModel($id);
            $tempFile = Json::decode($model->images);

            $pathFile = $img->getUploadPath() . $upload_folder;
//            print_r($tempFile);
//            exit();
            if ($UploadedFiles !== null) {
                $img->CreateDir($upload_folder);
                foreach ($UploadedFiles as $key => $file) {
                    try {
                        $oldFileName = $file->basename . '.' . $file->extension;
                        $newFileName = $file->basename . '.' . $file->extension;
                        $newFileNameLarge = $file->basename . '.' . $file->extension;

                        $file->saveAs($pathFile . '/' . $newFileName);
                        $files[$newFileName] = $newFileName;
                        $image = Yii::$app->image->load($pathFile . '/' . $newFileName);
                        $image->resize(1000);
                        $image->save($pathFile . '/' . $newFileName);

                        $image = Yii::$app->image->load($pathFile . '/' . $newFileName);
                        $image->resize(200);
                        $image->save($pathFile . '/thumbnail/' . $newFileNameLarge);
                    } catch (Exception $e) {
                        
                    }
                }

                //print_r($json);
                $model = $this->findModel($id);
                $model->images = Album::findFiles($pathFile);
                if ($model->save(false)) {
                    echo json_encode(['success' => 'true', 'file' => $files, 'temp' => $tempFile, 'json' => $json]);
                } else {
                    echo json_encode(['success' => 'false', 'error' => $model->getErrors()]);
                }
            } else {
                echo json_encode(['success' => 'false',]);
            }
        }
    }

    public function initialPreview($data, $field, $type = 'file') {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        'width' => '120px',
                        'url' => Url::to(['/freelance/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key' => $key
                    ];
                } else {
                    $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }

    public function actionDeletefileAjax($id, $folder = null, $fileName = null) {
        $file = Yii::$app->img->getUploadPath($folder . '/' . $id) . $fileName;
        $pathFile = Yii::$app->img->getUploadPath($folder . '/' . $id);
        $model = Album::findOne($id);
//        $data = Json::decode($model->images);
//        unset($data[$fileName]);

        if (@unlink($file)) {
            $model->images = Album::findFiles($pathFile);
            if ($model->save(false)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false, 'error' => $model->getErrors()]);
        }
    }

}
