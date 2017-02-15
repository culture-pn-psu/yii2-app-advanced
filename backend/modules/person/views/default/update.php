<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\person\models\Person */

$this->title = Yii::t('person', 'Update {modelClass}: ', [
            'modelClass' => 'Person',
        ]) . ' ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('person', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('person', 'Update');
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->

    <div class='box-body pad'>

        <?=
        $this->render('_form', [
            'model' => $model,
            'modelPosition' => $modelPosition
        ])
        ?>


    </div><!--box-body pad-->
</div><!--box box-info-->
