<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\modules\person\models\Prefix;
use backend\modules\person\models\Position;
use backend\modules\person\models\Person;
use yii\bootstrap\Modal;
use kartik\widgets\FileInput;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model backend\modules\person\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>

 <?= $form->field($model, 'img_id')->hiddenInput()->label(false) ?>
<div class="row">    
    <div class="col-sm-3">  
        <?= Html::img($model->imgTemp, ['class' => 'img_show thumbnail', 'width' => '100%']) ?> 
        


        <?= Html::button('<i class="glyphicon glyphicon-camera"></i> โหลดรูป', ['value' => Url::to(['/image/upload']), 'title' => Yii::t('app', 'โหลดรูป'), 'class' => 'btn btn-default modal-img photo']);
        ?> 
    </div>
    <div class="col-sm-8"> 

        <div class="row"> 
            <div class="col-sm-2">
                <?= $form->field($model, 'prefix_id')->dropDownList(Prefix::getList(), ['prompt' => Yii::t('app', 'เลือก')]) ?>
            </div>
            <div class="col-sm-5">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-5">
                <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <div class="row"> 
            <div class="col-sm-4">
                <?= $form->field($model, 'id_card')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'sex')->radioList(Person::getItemSex(), ['prompt' => '']) ?> 
            </div>  
        </div>  
        <div class="row">         
            <div class="col-sm-5">
                <?=
                $form->field($model, 'tel')->widget(MaskedInput::className(), [
                    'mask' => [
                        '9{4,8}'
            ]])
                ?>

            </div>
            <div class="col-sm-5">
                <?=
                $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => [
                        '999-9999999',
                    //'999-9999999, 999-9999999',
            ]])
                ?>
            </div>
        </div>        

        <?= $form->field($modelPosition, 'position_id')->listBox(Position::getList(), ['prompt' => Yii::t('app', 'เลือก'), 'multiple' => true, 'size' => 10]) ?>   

        <?php
        if (Yii::$app->user->can('admin')) {
            echo $form->field($model, 'data')->textarea(['rows' => 6]);
        }
        ?>

        <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('person', 'Create') : Yii::t('person', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    </div>


    <?php
    if (!$model->isNewRecord):
        Modal::begin(['id' => 'modal-img']);
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        ?>
        <?=
        $form->field(new \backend\modules\image\models\Image, 'name_file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'uploadUrl' => Url::to(['/file/default/uploadajax']),
                //'overwriteInitial'=>false,
                'initialPreviewShowDelete' => true,
                //'initialPreview'=> $initialPreview,
                //'initialPreviewConfig'=> $initialPreviewConfig,        
                'uploadExtraData' => [
                    //'slide_id' => $model->id,
                    'upload_folder' => Person::UPLOAD_FOLDER,
                    'width' => Person::width,
                    'hieth' => Person::height,
                ],
                'maxFileCount' => 1,
            ],
            'options' => ['accept' => 'image/*', 'id' => 'name_file']
        ]);
        ?>


        <?php
        ActiveForm::end();
        Modal::end();

        $this->registerJs(' 
    $(".photo").click(function(e) {            
        $("#modal-img").modal("show");        
    });   
    
    $("input[name=\'Image[name_file]\']").on("fileuploaded", function(event, data, previewId, index) {
    //alert(55);
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response.files, reader = data.reader;
    
        response = data.response.files
        console.log("1"+form+"2"+files+"3"+extra+"4"+response+"5"+reader);
        console.log("File batch upload complete"+files);
        loadImg(data.response.path,data.response.files);
        $("#modal-img").modal("hide");
    });

var loadImg = function(path,id){
    $("#person-img_id").val(id);
    $(".img_show").attr("src",path+id);
}


');

    endif;
    ?>