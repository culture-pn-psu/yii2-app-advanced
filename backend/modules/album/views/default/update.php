<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\album\models\Album */

$this->title = Yii::t('album', 'Update {modelClass}: ', [
    'modelClass' => 'Album',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('album', 'Albums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('album', 'Update');
?>
<div class='box box-info'>
    <div class='box-header'>
        <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
    </div><!--box-header -->

    <div class='box-body pad'>
        <div class="album-update">

            <!--<h1><?= Html::encode($this->title) ?></h1>-->
            
            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>

        </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
