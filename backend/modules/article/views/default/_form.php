<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use backend\widgets\CKEditor;
use backend\modules\article\models\Article;
use backend\modules\article\models\ArticleCategory;
use kartik\widgets\DateTimePicker;
use kartik\select2\Select2;
//use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */
/* @var $form yii\widgets\ActiveForm */

//print_r(Yii::$app->session->get('KCFINDER'));
?>


<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <div class='col-sm-2'>

        <div class="thumbnail">
            <div class="img">
                <?= Html::img($model->image, ['class' => 'images-show', 'width' => '100%']) ?>
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
        <?= $form->field($model, 'images')->hiddenInput()->label(false); ?>
    </div>
    <div class='col-sm-10'>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'article_category_id')->dropDownList(ArticleCategory::getCategory(), ['prompt' => Yii::t('app', 'เลือก')]) ?>
            </div>
            <div class="col-sm-6">
                <?php
//                print_r($modelArticleTags);
//                exit();
                ?>
                <?= $form->field($model, 'tags')->widget(Select2::className(),[
                    //'value' => yii\helpers\ArrayHelper::map($model->articleTags,'tag_id','tag_id'), // initial value
                    'data' => \backend\modules\tag\models\Tag::getList(),
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'เลือกใบกำกับ', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                        'multiple' => true
                        //'maximumInputLength' => 10,
                    ],
                ]) ?>
            </div>
        </div>



        <?= $form->field($model, 'summary')->textarea(['rows' => 4]) ?>

        <?php $this->registerJs("
    var content = '';
    CKEDITOR.on('instanceCreated', function (e) {
        content = e.editor.getData();
        e.editor.on('change', function (ev) {
            //alert(ev.editor.getData());
            //console.log(content);
            content = ev.editor.getData();
            load_img();
        });
    });

        "); ?>

        <?php
        //CKEditor
        echo $form->field($model, 'content')->widget(
                \firdows\mkeditor\CKEditor::className(), [
            'uploadURL' => Yii::$app->img->getUploadUrl(),
            'uploadDir' => Yii::$app->img->getUploadPath(),
            'filemanager' => true, //true = enabled kcfinder, false = disabled kcfinder
            'preset' => 'full', //toolbar -> basic, standard, full
            'onChange' => true
                ]
        )->label(false);
        ?>


        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'status')->dropDownList(Article::getItemStatus()) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <?=
                $form->field($model, 'display_start')->widget(DateTimePicker::classname(), [
                    'language' => \Yii::$app->language,
                    'value' => date('Y-m-d H:i:s'),
                    'removeButton' => false,
                    'pickerButton' => ['icon' => 'time'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                    ]
                ]);
                ?>
            </div>
            <div class="col-sm-6">
                <?=
                $form->field($model, 'display_finish')->widget(DateTimePicker::classname(), [
                    'language' => \Yii::$app->language,
                    'value' => date('Y-m-d H:i:s'),
                    'removeButton' => false,
                    'pickerButton' => ['icon' => 'time'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd hh:ii:ss',
                    ]
                ]);
                ?>
            </div>
        </div>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>


<?php
$this->registerJs("

var imgs=[];
var index=0;
var src;
var src_old=content;
var total;
var load_img =function(){
    data = content;
    imgs=['" . Yii::$app->img->getNoImg() . "'];
    $(data).find('img').each(function(index){
        imgs.push($(this).attr('src'));
        console.log($(this).attr('src'));
    });
    total=imgs.length;
    $('#res_img').text((index+1)+'/'+total);
    total=total?total-1:0;


    $.each( imgs, function( key, value ) {
        console.log( key + ':' + value );
        if(src_old==value){
        index=key;
        }
         $('#res_img').text((index+1)+'/'+(total?total+1:0));
    });
}

load_img();





$('.btn-select-img').click(function(){
    load_img();
    if($(this).is('.btn-left')){
        //alert('btn-left');
        index=index?index-1:0;
        src=imgs[index];
    }
    if($(this).is('.btn-right')){
        //alert('btn-right');
         index=(index<total)?index+1:total;
        src=imgs[index];
    }
    $('#res_img').text((index+1)+'/'+(total?total+1:0));
    //console.log('max:'+max+' index:'+index+' src:'+src+' indexOf:'+src.indexOf('/'));
    $('.images-show').attr('src',src);
    $('#article-images').val(src);

});


        ");
?>
