<?php

namespace backend\modules\image\controllers;

use Yii;
use backend\modules\image\models\Image;
use backend\modules\image\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * DefaultController implements the CRUD actions for Image model.
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
     * Lists all Image models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Image model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Image model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
     * Deletes an existing Image model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    #########################################################
    #########################################################
    #########################################################

    public function actionUploadajax() {
        $this->Uploads(true);
    }

    public function actionUploadfileajax() {
        Yii::$app->controller->enableCsrfValidation = false;
        $this->uploadSingleFile();
    }

    private function uploadSingleFile() {
        $file = [];
        $json = '';
        $img = Yii::$app->img;
        //try {
        $upload_folder = Yii::$app->request->post('upload_folder');
        $UploadedFile = UploadedFile::getInstancesByName('Image[name_file]');
        print_r($_FILES);
        var_dump($UploadedFile);
        //var_dump(Yii::$app->request->post);
        exit();
        if ($UploadedFile !== null && $UploadedFile) {
//                 print_r($UploadedFile);
//                 exit();
            $img->CreateDir($upload_folder);
            $pathFile = $img->getUploadPath() . $upload_folder;

            $file = $UploadedFile[0];
            $oldFileName = $file->basename . '.' . $file->extension;
            $newFileName = md5($file->basename . time()) . '.' . $file->extension;

            $file->saveAs($pathFile . '/' . $newFileName);



            $TbImages = new Image();
            $TbImages->id = $newFileName;
            $TbImages->name_file = $oldFileName;
            $TbImages->type_file = $file->extension;
            $TbImages->path_file = $upload_folder;
            $TbImages->create_at = time();
            $TbImages->temp = '1';
            $TbImages->create_by = Yii::$app->user->id;


            if ($TbImages->save()) {
                $img_id = $TbImages->id;
                $path = $img->getUploadUrl($TbImages->path_file);
                echo json_encode(['success' => 'true', 'path' => $path, 'files' => $img_id]);
            } else {

                echo json_encode(['success' => 'false', 'eror' => $TbImages->getErrors()]);
            }
        } else {
            echo json_encode(['success' => 'false', 'error' => $UploadedFile]);
        }
//        } catch (Exception $e) {
//            echo json_encode(['success' => 'false','error'=>$UploadedFile]);
//        }
        //echo $json;
    }

    private function Uploads($isAjax = false) {

        if (Yii::$app->request->isPost) {
            $img = Yii::$app->img;

            $uploadedFile = UploadedFile::getInstancesByName('Image[name_file]');
            $upload_folder = Yii::$app->request->post('upload_folder');
            $width = Yii::$app->request->post('width');
            $height = Yii::$app->request->post('height');
            //exit();
            //$data=[];           upload_folder


            if ($uploadedFile !== null && $uploadedFile) {
                //print_r($uploadedFile);  
                $img->CreateDir($upload_folder);
                $img_id = '';

                ########## Delete file temp ############
                /* $oldImg = Images::find()->where(['img_temp' => '1', 'user_id' => Yii::$app->user->identity->id])->all();
                  foreach ($oldImg as $img_o) {
                  $this->deleteImg(false, $img_o->img_id);
                  } */
                #########################################


                foreach ($uploadedFile as $images) {

                    $oldFileName = $images->basename . '.' . $images->extension;
                    $newFileName = md5($images->basename . time()) . '.' . $images->extension;
                    $pathFile = $img->getUploadPath() . $upload_folder;
                    if ($images->saveAs($pathFile . '/' . $newFileName)) {

                        if ($width && $height) {
                            $image = Yii::$app->image->load($pathFile . '/' . $newFileName);
                            $image->crop($width, $height);
                            $image->resize(900);
                            //$image->resize(Yii::$app->params['slideWidth']);
                            $image->save($pathFile . '/' . $newFileName);
                        }


                        $image = Yii::$app->image->load($pathFile . '/' . $newFileName);
                        $image->resize(100);
                        $image->save($pathFile . '/thumbnail/' . $newFileName);

                        $TbImages = new Image();
                        $TbImages->id = $newFileName;
                        $TbImages->name_file = $oldFileName;
                        $TbImages->type_file = $images->extension;
                        $TbImages->path_file = $upload_folder;
                        $TbImages->create_at = time();
                        $TbImages->temp = '1';
                        $TbImages->create_by = Yii::$app->user->id;


                        if ($TbImages->save()) {
                            $img_id = $TbImages->id;
                            $path = $img->getUploadUrl($TbImages->path_file);
                        } else {
                            if ($isAjax === true) {
                                echo json_encode(['success' => 'false', 'eror' => $TbImages->getErrors()]);
                            }
                        }

                        if ($isAjax === true) {
                            echo json_encode(['success' => 'true', 'path' => $path, 'files' => $img_id]);
                        }
                    }
                }
            } else {
                if ($isAjax === true) {
                    echo json_encode(['success' => 'false']);
                }
            }
        }

//            if($isAjax!==true){
//                return $data;
//            }
    }

//upload

    private function getInitialPreview($img_id, $slide_id) {
        $datas = TbImages::find()->where(['img_id' => $img_id])->all();

        $initialPreview = [];
        $initialPreviewConfig = [];
        if ($datas) {
            foreach ($datas as $key => $file) {
                //$nameFicheiro = substr($file, strrpos($file, '\\') + 1);
                $relFile = Yii::$app->img->getUploadUrl() . self::UPLOAD_FOLDER . '/' . $file->img_id;
                //echo $relFile;
                array_push($initialPreview, $this->getTemplatePreview($relFile));
                array_push($initialPreviewConfig, [
                    'caption' => $file->img_name_file,
                    'width' => '120px',
                    'url' => Url::to(['/slide/deletefileajax']),
                    'key' => $file->img_id
                ]);
            }
        }
        return [$initialPreview, $initialPreviewConfig];
    }

    private function getTemplatePreview($img) {
        //$filePath = TbAlbum::getUploadUrl().$model->album_path.'/thumbnail/'.$model->real_filename;
        $filePath = $img;
        //echo $img;
        $isImage = Yii::$app->img->isImage($filePath);
        if ($isImage) {
            $file = Html::img($filePath, ['class' => 'file-preview-image', 'alt' => 'model->file_name', 'title' => 'model->file_name']);
        } else {
            $file = "<div class='file-preview-other'> " .
                    "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
                    "</div>";
        }
        return $file;
    }

    private function deleteImg($isAjax = false, $file) {
        //$file=NULL;
//        if($isAjax===true){
//            $file = Yii::$app->request->post('key');
//            list($slide_id,$file) = explode(':', $file);
//        }
        //echo json_encode(['success'=>true,'data'=>$file]);
        if ($file !== NULL) {
            if (@unlink(Yii::$app->img->getUploadPath() . self::UPLOAD_FOLDER . '/' . $file)) {
                $thumbnail = Yii::$app->img->getUploadPath() . self::UPLOAD_FOLDER . '/thumbnail/' . $file;
                if (@unlink($thumbnail)) {
                    TbImages::findOne($file)->delete();
                    $tbSlide = TbSlide::findOne(['img_id' => $file]);
                    if ($tbSlide) {
                        $tbSlide->img_id = null;
                        $tbSlide->save();
                    }
                    if ($isAjax === true) {
                        echo json_encode(['success' => true, 'data' => $file]);
                    }
                }
            }
        } else {
            if ($isAjax === true) {
                echo json_encode(['success' => false]);
            }
        }
    }

}
