<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\person\models\Position;
/* @var $this yii\web\View */
/* @var $model backend\modules\person\models\Position */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Position::getListAll()) ?>
    
    <?= $form->field($model, 'under')->dropDownList(Position::getListAll()) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('person', 'Create') : Yii::t('person', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
