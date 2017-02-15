<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use backend\modules\album\models\Album;
use backend\modules\album\models\AlbumCategory;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\album\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-3">
         <?= $form->field($model, 'image_intro')->hiddenInput()->hint(false) ?>

                <div class="thumbnail">
                    <div class="img">             
                        <?= Html::img(Yii::$app->img->getUploadUrl() . Yii::$app->img->no_img, ['class' => 'images-show', 'width' => '100%']) ?>
                    </div>
                    <div class="caption">
                        <div style="height:30px;">
                            <span id="res_img"></span>
                            <p class="pull-right" >
                                <button class="btn btn-select-img btn-left" type="button"><i class="fa fa-angle-left"></i></button>
                                <button class="btn btn-select-img btn-right" type="button"><i class="fa fa-angle-right"></i></button>
                            </p>
                        </div>
                    </div>
                </div> 
    </div>
    <div class="col-sm-9">
        
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('album', 'Create') : Yii::t('album', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-sm-9">
                <?= $form->field($model, 'category_id')->dropDownList(AlbumCategory::getList(), ['prompt' => 'เลือก',]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'status')->dropDownList(Album::getItemStatus()) ?>
            </div>
        </div>
        <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
        
        <div class="row">  
            <div class="col-sm-6">
                <?=
                $form->field($model, 'start')->widget(DatePicker::classname(), [
                    'language' => \Yii::$app->language,
                    'value' => date('Y-m-d H:i:s'),
                    'removeButton' => false,
                    //'pickerButton' => ['icon' => 'date'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
                ?>
            </div> 
            <div class="col-sm-6">
                <?=
                $form->field($model, 'end')->widget(DatePicker::classname(), [
                    'language' => \Yii::$app->language,
                    'value' => date('Y-m-d H:i:s'),
                    'removeButton' => false,
                    //'pickerButton' => ['icon' => 'date'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
                ?>
            </div>
        </div>
        
        
        
        <?=
        $form->field($model, 'images_file[]')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true
            ],
            'pluginOptions' => [
                'initialPreview' => $model->initialPreview($model->images, 'docs', 'file'),
                'initialPreviewConfig' => $model->initialPreview($model->images, 'docs', 'config'),
                'uploadUrl' => Url::to(['uploadajax']),
                'overwriteInitial' => false,
                'initialPreviewShowDelete' => true,
                'showPreview' => true,
                'showRemove' => true,
                'showUpload' => true,
                //'initialPreview'=> $initialPreview,
                //'initialPreviewConfig'=> $initialPreviewConfig,        
                'uploadExtraData' => [
                    //'slide_id' => $model->id,
                    'id' => $model->id,
                    'upload_folder' => Album::UPLOAD_FOLDER . "/" . $model->id,
                //'width' => Album::width,
                ],
            //'maxFileSize' => 2000000,
            //'maxFileCount' => 1,
            ],
        ])->hint('เป็นไฟล์ JPG,PNG เท่านั้น');
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('album', 'Create') : Yii::t('album', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>



<?php
$this->registerJs("
    
var imgs=[];
var index=0;
var src;
var src_old = $('#album-image_intro').val();
var total;
var url_file = '" . Yii::$app->img->getUploadUrl(Album::UPLOAD_FOLDER . "/" . $model->id) . "';
var data = " . ($model->images ? $model->images : '[' . Yii::$app->img->no_img . ']') . ";
var load_img =function(){
    console.log(data);
    imgs=[];
   $.each( data,function(key, value){
        imgs.push(value);
        //console.log(value);
    });
    total=imgs.length;
    $('#res_img').text((index+1)+'/'+total);
    total=total?total-1:0;   

    
}

load_img();
setOld();
function setOld(){
$.each( imgs, function( key, value ) {
        //console.log( key + ':' + value );
        if(src_old==value){
        index=key;
        }
         $('#res_img').text((index+1)+'/'+(total?total+1:0));
    });    
    setVal();
}

$('.btn-select-img').click(function(){
    load_img();
    if($(this).is('.btn-left')){
        //alert('btn-left');
        index=index?index-1:0;
        //src=imgs[index];
    }
    if($(this).is('.btn-right')){
        //alert('btn-right');
         index=(index<total)?index+1:total;
        //src=imgs[index];
    }
    $('#res_img').text((index+1)+'/'+(total?total+1:0));
    //console.log('max:'+max+' index:'+index+' src:'+src+' indexOf:'+src.indexOf('/'));
    //console.log(' index:'+index+' src:'+src+' indexOf:'+src.indexOf('/'));
    setVal();
    
});

function setVal(){
    src=imgs[index];
    $('.images-show').attr('src',url_file+src);
    $('#album-image_intro').val(src);
}

$('input#album-images_file').on('fileuploaded', function(event, data, previewId, index) {
    //alert(55);
    var form = data.form, files = data.files, extra = data.extra,
    response = data.response.files, reader = data.reader;
    response = data.response.files  
    //console.log('File batch upload complete ');
    //console.log(response);
    data=data.response.temp;  
    //console.log(data);
    load_img();
});

//$('input#album-images_file').on('filedeleted', function(event, key) {
//    console.log('Key = ' + key);
//});
 
");
?>