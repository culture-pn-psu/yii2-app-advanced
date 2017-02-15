<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\artGallery\models\ArtJob;
use backend\modules\artGallery\models\Artist;
use backend\modules\artGallery\models\ArtType;
use backend\modules\artGallery\models\ArtTechnique;

/* @var $this yii\web\View */
/* @var $model backend\modules\artGallery\models\ArtJobSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]);
?>
<div class="row">

    <div class="col-sm-1">
        <h4><i class="fa fa-search"></i> ค้นหา</h4>
    </div>



    <div class="col-sm-2">
        <?= $form->field($model, 'title')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('title')]) ?>

    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'artist_id')->label(false)->dropDownList(Artist::getList(), ['prompt' => 'เลือกศิลปิน']) ?>

    </div>
    <div class="col-sm-2">    
        <?= $form->field($model, 'art_type_id')->label(false)->dropDownList(ArtType::getList(), ['prompt' => 'เลือกประเภท']) ?>
    </div>
    <div class="col-sm-2">    
        <?= $form->field($model, 'art_technique_id')->label(false)->dropDownList(ArtTechnique::getList(), ['prompt' => 'เลือกเทคนิค']) ?>

    </div>


    <!--    <div class="col-sm-2">
    <?= $form->field($model, 'art_code')->label(false)->textInput(['placeholder' => $model->getAttributeLabel('art_code')]) ?>
        </div>-->
    <div class="col-sm-2">
        <?= $form->field($model, 'size')->dropDownList(ArtJob::getSizeAll(), ['prompt' => $model->getAttributeLabel('size')])->label(false) ?>
    </div>
    <div class="col-sm-2">
        <?= $form->field($model, 'year')->dropDownList(ArtJob::getYearAll(), ['prompt' => 'เลือกปี'])->label(false)->hint(false) ?>
    </div>

    <div class="col-sm-2">
        <?php // echo $form->field($model, 'unit') ?>

        <?php // echo $form->field($model, 'art_type_id') ?>

        <?php // echo $form->field($model, 'art_technique_id') ?>

        <?php // echo $form->field($model, 'artist_id') ?>

        <?php // echo $form->field($model, 'concept')  ?>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>


</div>

<?php ActiveForm::end(); ?>