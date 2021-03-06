<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\person\models\Position */

$this->title = Yii::t('person', 'Create Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('person', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
        <h3 class='box-title'><?= Html::encode($this->title) ?></h3>
    </div><!--box-header -->

    <div class='box-body pad'>
        <div class="position-create">

            <!--<h1><?= Html::encode($this->title) ?></h1>-->

            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>

        </div>
    </div><!--box-body pad-->
</div><!--box box-info-->
