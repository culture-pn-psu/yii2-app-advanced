<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\album\models\AlbumCategory;

/* @var $this yii\web\View */
/* @var $model backend\modules\album\models\AlbumCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'parent_id')->dropDownList(AlbumCategory::getList(), ['prompt' => 'เลือก',]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('album', 'Create') : Yii::t('album', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
