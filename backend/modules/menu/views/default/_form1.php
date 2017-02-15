<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\menu\models\Menu;
use backend\modules\menu\models\MenuCategory;
use common\rbac\models\AuthItem;
/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\Menu */
/* @var $form yii\widgets\ActiveForm */
use yii\helpers\ArrayHelper;
$role =  ArrayHelper::map(AuthItem::getAll(),'name','name');

use backend\modules\menu\assets\AppAsset;
$asset = AppAsset::register($this);
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'router')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'menu_category_id')->dropDownList(MenuCategory::getList(),['prompt'=>Yii::t('app','เลือก')]) ?>
    
    <?= $form->field($model, 'parent_id')->dropDownList(Menu::getList(),['prompt'=>Yii::t('app','เลือก')]) ?>


    <?= $form->field($model, 'parameter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(Menu::getItemStatus(),['prompt'=>Yii::t('app','เลือก')]) ?>

    <?= $form->field($model, 'item_name')->dropDownList($role,['prompt'=>Yii::t('app','เลือก')]) ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'protocol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'sort')->dropDownList(Menu::getSortBy($model->menu_category_id,$model->parent_id),['prompt'=>Yii::t('app','เลือก')]) ?>


    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assoc')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'params')->textInput() ?> 

    
    
    
    
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('system', 'Create') : Yii::t('system', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

