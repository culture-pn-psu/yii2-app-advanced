<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use backend\modules\slide\models\Slide;
use backend\modules\slide\models\SlideCategory;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use yii\bootstrap\Modal;
//use backend\widgets\CKEditor;
use dosamigos\ckeditor\CKEditor;
?>

<div class="slide-form">

    <?php
    $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

    <?= $form->field($model, 'img_id')->hiddenInput()->label(false); ?>

    <div class='row'>
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">


            <?= $form->field($model, 'slide_cate_id')->dropDownList(SlideCategory::getCategory(), ['prompt' => Yii::t('app', 'เลือก')]) ?>

        </div>
    </div>
    
    
    <div class='row'>
        <div class="col-sm-8">

            <?=
            $form->field($model, 'link', [
                'inputTemplate' => '<div class="input-group"><span class="input-group-addon">URL:</span>{input}</div>',
            ])->textInput(['maxlength' => true])
            ?>
</div>
        <div class="col-sm-2">
            <?= $form->field($model, 'status')->dropDownList(Slide::getItemStatus()) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-6">
            <?=
            $form->field($model, 'start')->widget(DatePicker::classname(), [
                'language' => \Yii::$app->language,
                'value' => date('Y-m-d'),
                'removeButton' => false,
                'pickerButton' => ['icon' => 'calendar'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ],
            ])
            ?>
        </div>
        <div class="col-sm-6">
            <?=
            $form->field($model, 'end')->widget(DatePicker::classname(), [
                'language' => \Yii::$app->language,
                'value' => date('Y-m-d'),
                'removeButton' => false,
                'pickerButton' => ['icon' => 'calendar'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ],
            ])
            ?>


        </div>
    </div>
    
    
 <?php if(!$model->isNewRecord):?>
    <div class="row">
    <div class="col-sm-12">
        <div class="owl-carousel">
        <div class="item img-thumbnail img_id" style="background-image: url(<?=$model->image?>);width: <?=$model->slide_cate_id?$model->slideCate->width:600?>px;height: <?=$model->slide_cate_id?$model->slideCate->height:100?>px;">
                <div class="slider-inner">
                    <div class="container" id="slide_detail">
                        <?=$model->detail?>
                    </div>
                </div>
            </div><!--/.item-->
        </div>
             
        
        <!--img-->
<?= Html::button('<i class="glyphicon glyphicon-camera"></i> โหลดรูป', ['value' => Url::to(['/image/upload']), 'title' => Yii::t('app', 'โหลดรูป'), 'class' => 'btn btn-default modal-img photo']);
            ?> 
    </div>
</div>
    
    <?php 
    /*
$this->registerJs('       
    CKEDITOR.on("instanceCreated", function (e) {
        document.getElementById("slide_detail").innerHTML = e.editor.getData();
        e.editor.on("change", function (ev) {
           // alert(ev.editor.getData());
            document.getElementById("slide_detail").innerHTML = ev.editor.getData();
        });
    });
        ');
?>
    
    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
                    'enableOnChange' => true,
                    'options' => ['rows' => 3],
                    'preset' => 'custom',
                    'clientOptions' => [
                        'toolbarGroups' => [
                            ['name' => 'document', 'groups' => ['mode']],
                            ['name' => 'basicstyles', 'groups' => ['basicstyles']],	            
                        ],
                        'allowedContent' => true,
                    ]
                ])  
        ?>
<?php */

endif?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
if(!$model->isNewRecord):
Modal::begin(['id' => 'modal-img']);
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>
<?=
$form->field(new \backend\modules\image\models\Image, 'name_file')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['/file/default/uploadajax']),
        //'overwriteInitial'=>false,
        'initialPreviewShowDelete'=>true,
        //'initialPreview'=> $initialPreview,
        //'initialPreviewConfig'=> $initialPreviewConfig,        
         'uploadExtraData' => [
             //'slide_id' => $model->id,
             'upload_folder' => Slide::UPLOAD_FOLDER,
             'width' => $model->slide_cate_id?$model->slideCate->width:1140,
             'hieth' => $model->slide_cate_id?$model->slideCate->height:346,
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
    $("#slide-img_id").val(id);
    $(".img_id").css("background","url("+path+id+")");
}


');

endif;

?>