<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\slide\models\SlideCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    
    
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'width')->textInput() ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'height')->textInput() ?></div>
    </div>
   

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
